@extends('components.home-layout')

@section('content')

  <!-- MAIN CONTENT -->
  <section class="section-padding">
    <div class="container">
      <div class="row g-4">
        <!-- FILTER SIDEBAR -->
        <div class="col-lg-3">

          <x-home.event-filter :categories="$categories" />
          
        </div>

        <!-- EVENT GRID -->
        <div class="col-lg-9">
          <div class="sort-bar">
            <span class="results-count"><strong>248</strong> events found</span>
            <div class="d-flex align-items-center gap-2">
              <label class="text-muted" style="font-size:0.85rem;white-space:nowrap;">Sort by:</label>
              <select class="form-select form-select-sm" style="width:auto;border-radius:var(--radius-full);">
                <option>Newest</option>
                <option>Price: Low to High</option>
                <option>Price: High to Low</option>
                <option>Most Popular</option>
              </select>
              <div class="d-none d-md-flex gap-1">
                <button class="btn btn-sm btn-outline-secondary rounded" title="Grid View"><i class="bi bi-grid-3x3-gap-fill"></i></button>
                <button class="btn btn-sm btn-outline-secondary rounded" title="List View"><i class="bi bi-list-ul"></i></button>
              </div>
            </div>
          </div>

          <div class="row g-4">
            @foreach ($events as $event)
              <div class="col-md-6 col-xl-4">

                <x-cards.user-event-card :event="$event" />
                
              </div>
            @endforeach

            
            <!-- Pagination -->
            {{ $events->links('vendor.pagination.numbered-pagination-customized') }}
          
        </div>
      </div>
    </div>
  </section>

@endsection