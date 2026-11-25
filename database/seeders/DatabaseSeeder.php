<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\FAQ;
use App\Models\Media;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Event;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $users = [
            [
                "name" => "Admin AL-AMIN",
                "email" => "alaminkhanstd@gmail.com",
                "role" => "admin",
                "password" => Hash::make("password")
            ],
            [
                "name" => "Organizer AL-AMIN",
                "email" => "alaminkhanstd123@gmail.com",
                "role" => "organizer",
                "password" => Hash::make("password")
            ],
            [
                "name" => "User shohag",
                "email" => "shohagkhanstd112@gmail.com",
                "role" => "user",
                "password" => Hash::make("password")
            ],
        ];

        foreach($users as $user){
            User::create($user);
        }

        // upload media

        $mediaImage = ["./seedmediafiles/conc_1", "./seedmediafiles/conc_1"];

        foreach($mediaImage as $image){
            $path = Storage::disk("public")->put("eventImg", $image);
            Media::create([
                "name" => "seed Img",
                "src" => $path
            ]);
        }

        // categroy
        $categories = [
            [
                "name" => "Concert",
                "slug" => Str::slug('concert'),
                "icon_class" => "fa-solid fa-music",
                "description" => "Lorem ipsum dolor sit.",
                "status" => 1
            ]
        ];

        foreach($categories as $cat){
            Category::create($cat);
        }

        // events
        $events = [
            [
                "name" => "Summer concert",
                "description" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa praesentium iste deleniti officia eligendi pariatur debitis vel ipsam nihil magni?",
                "user_id" => 2,
                "category_id" => 1,
                "start_date" => "2026-12-31",
                "end_date" => "2027-01-03",
                "ticket_close" => "2027-01-02",
                "event_type" => "physical",
                "address" => "New York",
                "slug" => Str::slug("Summer Concert"),
                "media_id" => 1,
                "admin_approved" => 1,
                "suspended" => 0,
                "featured" => 1,
                "venue" => "central park",
                "published" => 1
            ]
        ];

        foreach($events as $event){
            Event::create($event);
        }

        // faqs
        $faqs = [
            [
                "event_id" => 1,
                "question" => "Can I get refund?",
                "answer" => "Yes, refunds are available up to 48 hours before the event. A 10% processing fee may apply."
            ],
            [
                "event_id" => 1,
                "question" => "Is there an age restriction?",
                "answer" => "This event is open to all ages. Children under 12 must be accompanied by an adult."
            ],
            [
                "event_id" => 1,
                "question" => "What should I bring?",
                "answer" => "Bring your e-ticket (QR code), valid ID, and comfortable clothes. Outside food and drinks are not permitted."
            ]
        ];

        foreach ($faqs as $faq) {
            FAQ::create($faq);
        }

        // tickets
        $tickets = [
            [
                "event_id" => 1,
                "name" => "Student",
                "price" => 20,
                "quantity" => 49,
                "description" => "Access to all stages, standing area"
            ],
            [
                "event_id" => 1,
                "name" => "Premium",
                "price" => 70,
                "quantity" => 99,
                "description" => "Access to all stages, standing area"
            ],
            [
                "event_id" => 1,
                "name" => "VIP",
                "price" => 200,
                "quantity" => 929,
                "description" => "Access to all stages, standing area"
            ]
        ];

        foreach ($tickets as $ticket) {
            Ticket::create($ticket);
        }
    }

}
