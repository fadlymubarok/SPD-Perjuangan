<?php

namespace App\Http\Controllers;

use App\Models\ProfileDesa;
use App\Models\News;
use App\Models\User;
use App\Models\ProfileAparatur;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        $title = 'Home';
        $profile = ProfileDesa::first();
        return view('user.home', compact('title', 'profile'));
    }

    public function keuangan()
    {
        $title = 'Keuangan';
        $profile = ProfileDesa::first();
        $keuangan = News::where('category', 'keuangan')->paginate(4);
        return view('user.keuangan.index',  compact('title', 'profile', 'keuangan'));
    }
    
    public function keuangan_slug($slug) {
        $keuangan = News::where('slug', $slug)->first();
        $author = User::first();
        $profile = ProfileDesa::first();
        $title = 'Keuangan';
        return view('user.keuangan.show', compact('title', 'keuangan', 'profile', 'author'));

    }
    public function event()
    {
        $title = 'Event';
        $profile = ProfileDesa::first();
        $event = News::where('category', 'event')->paginate(4);
        return view('user.event.index',  compact('title', 'profile', 'event'));
    }

    public function event_slug($slug) {
        $event = News::where('slug', $slug)->first();
        $author = User::first();
        $profile = ProfileDesa::first();
        $title = 'Event';
        return view('user.event.show', compact('title', 'event', 'profile', 'author'));
    }

    public function pemerintahan()
    {
        $title = 'Pemerintahan';
        $pemerintahan = ProfileAparatur::first();
        $data = ProfileAparatur::all();
        $profile = ProfileDesa::first();
        return view('user.pemerintahan.index', compact('title', 'profile', 'pemerintahan', 'data'));
    }
}
