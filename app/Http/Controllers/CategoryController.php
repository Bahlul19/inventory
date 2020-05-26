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
        $category = Category::all();

        return  view('all_category')->with('category', $category);
    }

    //Delete Category Method
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $delete = $category->delete();

        if ($delete) {
            $notification = array(
                'message' => 'Category Deleted Successfully',
                'alert-type' => 'danger',
            );

            return Redirect()->route('all.category')->with($notification);
        } else {
            return Redirect()->back();
        }
    }

    public function editCategory($id)
    {
        $category = Category::findorfail($id);

        return view('edit_category', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::findorfail($id);
        $category->name = $request->name;
        $update = $category->save();
        if ($update) {
            $notification = array(
                'message' => 'Category Added Successfully',
                'alert-type' => 'success',
            );

            return Redirect()->route('all.category')->with($notification);
        } else {
            return Redirect()->back();
        }
    }
}
