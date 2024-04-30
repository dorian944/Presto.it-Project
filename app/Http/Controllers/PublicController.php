<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage()
    {
        $announcements = Announcement::where('is_accepted', true)->take(5)->get()->sortByDesc('created_at');
        return view('homepage',compact('announcements'));
    }

    public function categoryShow(Category $category)
    {
         return view('categoryShow', compact('category'));
    }
}
