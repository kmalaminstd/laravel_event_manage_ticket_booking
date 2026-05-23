@extends('components.home-layout')

@section('content')

    <div class="container" style="min-height: 80dvh; padding-top: 50px;">
        <div class="row g-4">
            @forelse ($events as $event)      
                <div class="col-md-6 col-xl-4">

                    <x-cards.user-event-card :event="$event" />
                
                </div>
            @empty
                <h2>Nothing Found</h2>
            @endforelse
        </div>
    </div>

@endsection