<div class="filter-sidebar">
    
    <form>
        <h5>Filters <button type="reset" class="btn btn-sm btn-link text-decoration-none" style="font-size:0.8rem;">Clear All</button>
        </h5>

        <div class="filter-group">
            <label>Category</label>
            <select name="category" class="form-select">
                <option value="">All Categories</option>
                @foreach ($categories as $cat)                
                    <option value="{{ $cat->slug }}" {{ request('category') === $cat->slug ? "selected" : "" }}>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="filter-group">
            <label>Price Range</label>
            <input name="range" type="range" class="form-range" id="priceRange" min="0" max="500" value="{{ request('range') ? request('range') : 250 }}">
            <div class="price-range-display" id="priceValue">$0 - ${{ request('range') ? request('range') : 250 }}</div>
        </div>
    
        <div class="filter-group">
            <label>Date</label>
            <input name="date" type="date" value="{{ request('date') ? request('date') : '' }}" class="form-control">
        </div>
    
        <div class="filter-group">
            <label>Location</label>
            <div class="input-group">
                <span class="input-group-text bg-transparent border-end-0"><i class="bi bi-geo-alt"></i></span>
                <input type="text" name="city" class="form-control border-start-0" placeholder="Enter city or zip" value="{{ request('city') ? request('city') : '' }}">
            </div>
        </div>
    
        <div class="filter-group">
            <label>Type</label>
            <div class="toggle-group rounded-1 p-4 flex-column">

                <label>
                    <input type="radio" name="type" value="" {{ (request('type') === 'all' || request('type') === '') ? 'checked' : ''}}>
                    All
                </label>
                <label>
                    <input type="radio" name="type" value="free" {{ request('type') === 'free' ? 'checked' : ''}}>
                    Free
                </label>

                <label>
                    <input type="radio" name="type" value="paid" {{ request('type') === 'paid' ? 'checked' : ''}}>
                    Paid
                </label>

            </div>
        </div>
    
        <button class="btn btn-primary-custom w-100 mt-2">Apply Filters</button>

    </form>
</div>
