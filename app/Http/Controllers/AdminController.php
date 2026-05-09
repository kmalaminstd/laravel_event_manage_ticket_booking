<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $totalRevenue = Order::sum('amount');
        $totalUser = User::whereNot('role', 'admin')->count();
        $totalEvent = Event::count();
        $totalActiveOrganizer = User::where('role', 'organizer')->count();
        $recentUsers = User::latest()->limit(3)->get();
        $pendingEvents = Event::where('admin_approved', false)->with(['user'])->latest()->limit(3)->get();

        // dd($recentUser);

        return view("admin.index", compact(['totalRevenue', 'totalUser', 'totalEvent', 'totalActiveOrganizer', 'recentUsers', 'pendingEvents']));
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
