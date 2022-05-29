<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\ProfileDesa;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        $title = 'Home';
        $profile = ProfileDesa::first();
        $name = $profile->name;
        $news = News::latest()->paginate(3);
        return view('user.home', compact('title', 'profile', 'name', 'news'));
    }

    public function about()
    {
        $title = 'About';
        $profile = ProfileDesa::first();
        $name = $profile->name;
        $news = News::latest()->paginate(3);
        return view('user.about', compact('title', 'profile', 'name', 'news'));
    }

    public function news()
    {
        $title = 'Berita';
        $profile = ProfileDesa::first();
        $name = $profile->name;
        $news = News::latest()->paginate(7);
        return view('user.news', compact('title', 'profile', 'name', 'news'));
    }

    public function theNews(News $news)
    {
        $title = 'Berita';
        $profile = ProfileDesa::first();
        $name = $profile->name;
        return view('user.theNews', compact('title', 'profile', 'name', 'news'));
    }
}
