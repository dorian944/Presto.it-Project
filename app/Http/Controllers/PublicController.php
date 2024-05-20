<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function homepage()
    {
        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at','desc')->take(5)->get();
        return view('homepage',compact('announcements'));
    }

    public function categoryShow(Category $category)
    {
        $announcements = $category->announcements()->where('is_accepted', true)->orderBy('created_at','desc')->get();
         return view('categoryShow', compact('category', 'announcements'));
    }

    public function setLanguage($lang) 
     {
        
        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function personalArea(){
        $announcements = Auth::user()->announcements()->where('is_accepted', true)->orderBy('created_at','desc')->get();
        return view('area-personale',compact('announcements'));
       
    }

    public function searchAnnouncements(Request $request){
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(10);

        return view('announcements.index', compact('announcements'));
    }
}
