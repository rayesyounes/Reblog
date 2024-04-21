<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Post;


class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('home', [
            'featuredPosts' => Post::Published()->Featured()->with('categories')->latest('published_at')->take(3)->get(),
            'latestPosts' => Post::Published()->with('categories')->latest('published_at')->take(9)->latest()->get(),
        ]);
    }
}
