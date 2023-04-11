<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $query = Post::with(['category']);

        if (request('category_id')) {
            $query->where('category_id', '=', request('category_id'));
        }
        $posts = $query->get();

        $categories = Category::all();
        
        return view('home', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function login()
    {
        return view('auth.login');
    }
}
