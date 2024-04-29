<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage() 
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->take(5)->get();
        return view('homepage',compact('announcements'));
    }

    public function categoryShow(Category $category) 
    {
         return view('categoryShow', compact('category'));
    }
}
