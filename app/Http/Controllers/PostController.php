<?php

namespace App\Http\Controllers;

use App\DataTables\PostsDataTable;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function addPost()
    {
        return view('user.add-post');
    }

    public function store(Request $request)
    {
        $valildator = Validator::make($request->all(), [
            'title' => 'required',
            'author_name' => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'author_name' => $request->author_name,
            'content' => $request->content
        ]);
        return redirect(route('user.all-posts'))->with('status', 'Your Post Has Been Uploaded.');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function editPost($id)
    {
        $post = Post::findOrFail($id);
        return view('user.post-edit', compact('post') );
    }
    
    public function updatePost($id, Request $request)
    {
        Post::findOrFail($id)->update($request->all());
        return redirect(route('user.all-posts'))->with('update', 'Your Post Has Been Updated.');

    }
    
    public function deletePost($id)
    {
        Post::findOrFail($id)->delete();
        return redirect(route('user.all-posts'))->with('delete', 'Your Post Has Been Deleted.');
    }
}
