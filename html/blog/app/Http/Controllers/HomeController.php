<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(){
        $posts= Post::orderBy('created_at', 'desc')->get();
        return view('home', compact('posts'));
    }

    public function post(Post $post){
        $posts = Post::all();
        return view('post', compact('post'));
    }
}
