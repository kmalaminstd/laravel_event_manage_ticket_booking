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
    <div class="row g-4">
        <!-- CATEGORIES LIST -->
        <div class="col-lg-8">
            <div class="dashboard-card">
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Icon</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Events</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <i class="{{ $category->icon_class }}" style="font-size:1.2rem;color:var(--primary);"></i>
                                    </td>
                                    <td><strong>{{ $category->name }}</strong></td>
                                    <td>{{ $category->slug }}</td>
                                    <td>1,240</td>
                                    <td><span class="status-badge active">{{ $category->status ? 'Active' : 'Inactive' }}</span></td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="/admin/category/{{ $category->id }}/edit" class="action-btn">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <x-forms.form method="POST" action="/admin/category/{{ $category->id }}/delete">
                                                @method("DELETE")
                                                <button type="submit" class="action-btn danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </x-forms.form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ADD CATEGORY FORM -->
        <div class="col-lg-4">
            <div class="form-card">
                <h5 class="mb-3"><i class="bi bi-plus-circle me-2" style="color:var(--accent);"></i>Quick Add</h5>
                <x-forms.form method="POST" action="/admin/category">
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. Sports">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="sports">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Icon (Bootstrap Icon class)</label>
                        <input type="text" name="icon_class" class="form-control" placeholder="e.g. bi-trophy">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Brief description..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button class="btn btn-primary-custom w-100"><i class="bi bi-plus me-2"></i>Add Category</button>
                </x-forms.form>
            </div>
        </div>
    </div>
</div>

@endsection
