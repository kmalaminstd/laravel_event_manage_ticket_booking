<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    
    public function store(Request $request){

        $attributes = $request->validate([
            "name" => ['required', 'min:3'],
            "slug" => ['required'],
            "icon_class" => ['required'],
            "description" => ['nullable'],
            "status" => ['required', Rule::in(["1","0"])]
        ]);

        Category::create($attributes);

        return back();

    }

    public function update(Category $category, Request $request){

        $attributes = $request->validate([
            "name" => ['required', 'min:3'],
            "slug" => ['required'],
            "icon_class" => ['required'],
            "description" => ['nullable'],
            "status" => ['required', Rule::in(["1","0"])]
        ]);

        $category->update($attributes);

        return redirect("/admin/categories");

    }

    public function destroy(Category $category){
        $category->delete();
        return back();
    }

}
