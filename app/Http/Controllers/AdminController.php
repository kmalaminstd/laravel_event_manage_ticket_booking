<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.index");
    }

    public function category()
    {
        $categories = Category::latest()->get();

        return view("admin.categories", compact("categories"));
    }

    public function editCategory(Category $category)
    {
        return view("admin.edit-category", compact("category"));
    }

    public function manageEvents()
    {
        $events = Event::latest()->paginate(30);
        return view("admin.manage-events", compact('events'));
    }
}
