<?php

namespace App\Http\Controllers\Author;

use App\Category;
use App\Http\Controllers\Admin\CategoryController;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
  public function index()
  {
      $category = Category::all();
      $tag = Tag::all();
    return view('author.dashboard',compact('tag','category'));
  }
}
