@extends('components.admin-layout')

@section('content')

<div class="dashboard-topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle"><i class="bi bi-list"></i></button>
        <div class="topbar-title">
            <h5>Categories</h5>
            <p>Manage event categories</p>
        </div>
    </div>
    <div class="topbar-right">
        <button class="btn btn-sm btn-primary-custom" data-bs-toggle="modal" data-bs-target="#addCatModal"><i
                class="bi bi-plus me-1"></i> Add Category</button>
    </div>
</div>

<div class="dashboard-content">
    <div class="row g-4 justify-content-center">
        <!-- ADD CATEGORY FORM -->
        <div class="col-lg-8">
            <div class="form-card">
                <h5 class="mb-3"><i class="bi bi-plus-circle me-2" style="color:var(--accent);"></i>Quick Add</h5>
                <x-forms.form method="POST" action="/admin/category/{{ $category->id }}/update">
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" value="{{ $category->name }}" name="name" class="form-control" placeholder="e.g. Sports">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" value="{{ $category->slug }}" name="slug" class="form-control" placeholder="sports">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Icon (Bootstrap Icon class)</label>
                        <input type="text" value="{{ $category->icon_class }}" name="icon_class" class="form-control" placeholder="e.g. bi-trophy">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" value="{{ $category->description }}" class="form-control" rows="3" placeholder="Brief description..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option {{ $category->status ? "selected" : "" }} value="1">Active</option>
                            <option {{ !$category->status ? "selected" : "" }} value="0">Inactive</option>
                        </select>
                    </div>
                    <button class="btn btn-primary-custom w-100"><i class="bi bi-plus me-2"></i>Update Category</button>
                </x-forms.form>
            </div>
        </div>
    </div>
</div>

@endsection
