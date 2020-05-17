<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Add Category Method
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        if ($category->save()) {
            $notification = array(
                'message' => 'Category Added Successfully',
                'alert-type' => 'success',
            );

            return Redirect()->route('all.category')->with($notification);
        } else {
            return Redirect()->back();
        }
    }

    //Fetching data fro the database
    public function allCategory()
    {
        echo 'For fecting all category from the database';
    }
}
