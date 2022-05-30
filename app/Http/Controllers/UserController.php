<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\ProfileDesa;
use App\Models\Question;
use App\Models\Achievement;
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

        return view('user.home', compact('title', 'profile'));
    }

    public function pertanyaan()
    {
        $title = 'Pertanyaan';
        $profile = ProfileDesa::first();
        $pertanyaan = Question::where('status', 1)->paginate(9);
        return view('user.pertanyaan.index', compact('title', 'profile', 'pertanyaan'));
    }

    public function get_question($id)
    {
        $question = Question::findOrFail($id);
        return response()->json($question);
    }

    public function galeri()
    {
        $title = 'Galeri';
        $profile = ProfileDesa::first();
        $galeri = Achievement::paginate(8);
        return view('user.galeri.index', compact('title', 'profile', 'galeri'));

    }
}
