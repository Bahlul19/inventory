<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;;
use App\Post;

class PostsController extends Controller
{
    //Post insert method
    public function addPost(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:25|min:4',
            'details' => 'required|unique:posts|max:25|min:4',
            'image' => 'required | mimes:jpeg,jpg,png,JPEG,JPG,PNG | max:1000',
        ]);

        $post = new Post();
       // $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->details = $request->details;
        $image = $request->file('image');

        if($image)
        {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/assets/img/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $post->image = $image_url;
            $storeData = $post->save();
            if($storeData)
            {
                $notification = array(
                    'message' => 'Category Added Successfully',
                    'alert-type' => 'success',
                );
                return Redirect()->route('all.category')->with($notification);
            }
            else
            {
                return back()->with('error', 'Posts are not inserted successfully');
            }

        }
        else
        {
            $posts = $post->save();
            if($posts)
            {
                $notification = array(
                    'message' => 'Category Added Successfully',
                    'alert-type' => 'success',
                );
                return Redirect()->route('all.category')->with($notification);
            }
            else
            {
                return back()->with('error', 'Posts are not inserted successfully');
            }
        }
    }

    //fetched all the post form database
    public function allPost()
    {
        $post = Post::all();
        return view('all_post')->with('post', $post);
    }

    //Post edit method
    public function editPost($id)
    {
        $post = Post::findorfail($id);
        return view('edit_post', compact('post'));
    }

    //Post edit method
    public function updatePost(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:25|min:4',
            'image' => 'mimes:jpeg,jpg,png,JPEG,JPG,PNG | max:100000',
        ]);

        $post = Post::findorfail($id);
        $post->title = $request->title;
        $post->details = $request->details;
        $image = $request->file('image');

        if($image)
        {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/assets/img/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $post->image = $image_url;
            unlink($request->old_photo);
            $savePost = $post->save();
            if($savePost)
            {
                return Redirect()->route('all.posts')->with('success','Posts are inserted successfully');
            }
            else
            {
                return back()->with('error', 'Posts are not inserted successfully');
            }

        }
        else
        {
            $post->image = $request->old_photo;
            $postImageSave = $post->save();
            if($postImageSave)
            {
                return Redirect()->route('all.posts')->with('success','Posts are inserted successfully');
            }
            else
            {
                return back()->with('error', 'Posts are not inserted successfully');
            }
        }
    }

    //Post delete method
    public function deletePost($id)
    {
        $post = Post::find($id);
        $image = $post->image;
        $postDelete = $post->delete();

        if($postDelete)
        {
            unlink($image);
            return Redirect()->route('all.posts')->with('success','Posts are deleted successfully');
        }
        else
        {
            return back()->with('error', 'Posts is not deleted successfully');
        }
    }
}
