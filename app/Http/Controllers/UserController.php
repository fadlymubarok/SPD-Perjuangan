<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\ProfileDesa;
use App\Models\Achievement;

use App\Models\User;
use App\Models\ProfileAparatur;
use App\Models\ProfileBpd;

use App\Models\Question;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        $title = 'Home';
        $profile = ProfileDesa::first();
        return view('user.home', compact('title', 'profile'));
    }
    public function prestasi()
    {
        $title = 'Home';
        $profile = ProfileDesa::first();
        $prestasi = Achievement::all();
        
        
        return view('user.prestasi.index', compact('title', 'profile', 'prestasi'));
    }
    public function kontak()
    {
        $title = 'Home';
        $profile = ProfileDesa::first();
        $kontak = Achievement::all();
        
        return view('user.kontak.index', compact('title', 'profile', 'kontak'));


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

    public function bpd()
    {
        $title = 'BPD';
        $data = ProfileBpd::all();
        $profile = ProfileDesa::first();
        return view('user.bpd.index', compact('title', 'profile', 'data'));



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
