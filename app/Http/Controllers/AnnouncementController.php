<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('indexAnnouncement', 'showAnnouncement');
    }

    public function createAnnouncement(){
        return view('announcements.create');
    }

    public function showAnnouncement(Announcement $announcement){
        return view('announcements.show', compact('announcement'));
    }

    public function indexAnnouncement(){
        $announcements = Announcement::where('is_accepted', true)->paginate(8)->sortByDesc('created_at');
        return view('announcements.index', compact('announcements'));
    }
}
