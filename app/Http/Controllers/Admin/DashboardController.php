<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $post = Post::all();
        $category = Category::all();
        $tag = Tag::all();
      return view('admin.dashboard',compact('post','category','tag'));
    }
}
