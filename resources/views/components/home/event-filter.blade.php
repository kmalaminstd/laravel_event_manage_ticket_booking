<div class="filter-sidebar">
    <h5>Filters <button class="btn btn-sm btn-link text-decoration-none" style="font-size:0.8rem;">Clear All</button>
    </h5>

    <div class="filter-group">
        <label>Category</label>
        <select class="form-select">
            <option>All Categories</option>
            <option>Concerts</option>
            <option>Workshops</option>
            <option>Seminars</option>
            <option>Conferences</option>
            <option>Festivals</option>
            <option>Free Events</option>
        </select>
    </div>

    <div class="filter-group">
        <label>Price Range</label>
        <input type="range" class="form-range" id="priceRange" min="0" max="500" value="250">
        <div class="price-range-display" id="priceValue">$0 - $250</div>
    </div>

    <div class="filter-group">
        <label>Date</label>
        <input type="date" class="form-control">
    </div>

    <div class="filter-group">
        <label>Location</label>
        <div class="input-group">
            <span class="input-group-text bg-transparent border-end-0"><i class="bi bi-geo-alt"></i></span>
            <input type="text" class="form-control border-start-0" placeholder="Enter city or zip">
        </div>
    </div>

    <div class="filter-group">
        <label>Type</label>
        <div class="toggle-group">
            <button class="toggle-btn active">All</button>
            <button class="toggle-btn">Free</button>
            <button class="toggle-btn">Paid</button>
        </div>
    </div>

    <button class="btn btn-primary-custom w-100 mt-2">Apply Filters</button>
</div>
