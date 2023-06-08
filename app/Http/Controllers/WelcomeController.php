<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        return view('welcome', compact('posts'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $posts = Post::where('title', 'LIKE', '%' . $search . '%')
            ->orWhere('content', 'LIKE', '%' . $search . '%')
            ->orWhere('author_name', 'LIKE', '%' . $search . '%')
            ->get();

        return response()->json($posts);
    }
}
