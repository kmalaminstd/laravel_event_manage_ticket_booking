<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class EventController extends Controller
{
    
    use AuthorizesRequests;

    public function store(Request $request){

        // dd($request);

        $attributes = $request->validate([
            "name" => ['required', "min:3"],
            "description" => ['required', "min:20"],
            "category_id" => ['required', "exists:categories,id"],
            "start_date" => ['required'],
            "end_date" => ['required'],
            "event_type" => ['required', Rule::in(["online", "physical"])],
            "venue" => ['required'],
            "address" => ['required_if:event_type,physical', 'nullable'],
            "media" => ['required', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
        ]);

        if($request->act_btn === "publish"){
            $attributes['published'] = true;
        }

        if($request->act_btn === "draft"){
            $attributes['published'] = false;
        }

        $user = Auth::user();

        if($attributes['media']){
            $path = $request->file('media')->store('/media', 'public');
            $media = Media::create([
                "name" => $attributes["name"],
                "src" => $path
            ]);
            $attributes["media_id"] = $media->id;
        }

        $event = $user->event()->create(Arr::except($attributes, 'media'));

        

        $ticketAttributes = $request->validate([
            "ticket.*.name" => ['required'],
            "ticket.*.price" => ['required'],
            "ticket.*.quantity" => ['required'],
            "ticket.*.description" => ['required']
        ]);

        foreach($request->ticket as $ticket){
            $event->ticket()->create([
                "name" => $ticket['name'],
                "price" => $ticket['price'],
                "quantity" => $ticket['quantity'],
                "description" => $ticket['description']
            ]);
        }

        
        if($request->faq){
            $faqAttributes = $request->validate([
                'faq.*.question' => ['nullable', 'string'],
                'faq.*.answer' => ['nullable', 'string']
            ]);

            foreach($request->faq as $faq){
                $event->faq()->create([
                    "question" => $faq["question"],
                    "answer" => $faq["answer"]
                ]);
            }
        }

        if($request->schedule){

            $scheduleAttributes = $request->validate([
                "schedule.*.title" => ['nullable'],
                "schedule.*.time" => ['nullable'],
                "schedule.*.description" => ['nullable']
            ]);
    
            foreach($request->schedule as $schedule){
                $event->schedule()->create([
                    "title" => $schedule['title'],
                    "time" => $schedule['time'],
                    "description" => $schedule['description']
                ]);
        }

        }

        return redirect('/organizer/my-events');

    }

    public function update(Event $event, Request $request){
        $this->authorize('update', $event);

        // valid basic info
        $basicAttributes = $request->validate([
            "name" => ['required', "min:3"],
            "description" => ['required', "min:20"],
            "category_id" => ['required', "exists:categories,id"],
            "start_date" => ['required'],
            "end_date" => ['required'],
            "event_type" => ['required', Rule::in(["online", "physical"])],
            "venue" => ['required'],
            "address" => ['required_if:event_type,physical', 'nullable']
        ]);

        if($request->act_btn === 'publish'){
            $basicAttributes['published'] = true;
        }else{
            $basicAttributes['published'] = false;
        }

        $event->update($basicAttributes);

        // update new image
        if($request->media){
            if(Storage::disk('public')->exists($event->media->src)){
                Storage::disk('public')->delete($event->media->src);
                $event->media->delete();
            }
            $newPath = $request->file('media')->store('/media', 'public');
            $media = Media::create([
                "name" => $event->name,
                "src" => $newPath
            ]);
            $event->update(["media_id" => $media->id]);
        }

        // create new schedule and updete existing schedule
        $existingScheduleIds = $event->schedule()->pluck('id')->toArray();
        $submitScheduleIds = [];
        if($request->schedule){
            foreach($request->schedule as $scheduleData){
                if(isset($scheduleData['id'])){
                    $existSchedule = $event->schedule()->find($scheduleData['id']);
                    $existSchedule->update($scheduleData);
                    $submitScheduleIds[] = $existSchedule->id;
                }else{
                    $newSchedule = $event->schedule()->create($scheduleData);
                    $submitScheduleIds[] = $newSchedule->id;
                }
            }

            $scheduleToDelete = array_diff($existingScheduleIds, $submitScheduleIds);
            $event->schedule()->whereIn('id', $scheduleToDelete)->delete();
        }

        // create new ticket and updete existing ticket
        $existingTicketIds = $event->ticket()->pluck('id')->toArray();
        $submittedTicketIds = [];
        if($request->ticket){
            foreach($request->ticket as $ticketData){
                if(isset($ticketData['id'])){
                    $existingTicket = $event->ticket()->find('id', $ticketData['id']);
                    $existingTicket->update($ticketData);
                    $submittedTicketIds[] = $existingTicket->id;
                }else{
                    $newTicket = $event->ticket()->create($ticketData);
                    $submittedTicketIds[] = $newTicket->id;
                }
            }
            $ticketToDelete = array_diff($existingTicketIds, $submittedTicketIds);
            $event->ticket()->whereIn('id', $ticketToDelete)->delete();
        }

        // create new faq and updete existing faq
        $existingFAQIds = $event->ticket()->pluck('id')->toArray();
        $submittedFAQIds = [];
        if($request->faq){
            foreach($request->faq as $faqData){
                if(isset($faqData['id'])){
                    $existingFAQ = $event->faq()->find('id', $faqData['id']);
                    $existingFAQ->update($faqData);
                    $submittedFAQIds[] = $existingFAQ->id;
                }else{
                    $newFAQ = $event->faq()->create($faqData);
                    $submittedFAQIds[] = $newFAQ->id;
                }
            }
            $FAQToDelete = array_diff($existingFAQIds, $submittedFAQIds);
            $event->faq()->whereIn('id', $FAQToDelete)->delete();
        }

        return back();

    }

    public function destroy(Event $event){
        $this->authorize('delete', $event);
        $event->delete();
        return redirect('/organizer/my-events');
    }

}
