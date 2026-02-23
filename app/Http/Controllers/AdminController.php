<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index(){
        return view('admin.index');
    }

    public function category(){

        $categories = Category::latest()->get();

        return view('admin.categories', compact('categories'));
    }

    public function editCategory(Category $category){
        return view('admin.edit-category', compact('category'));
    }

}
