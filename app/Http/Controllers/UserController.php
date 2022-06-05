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
        // $news = News::where('category', 'berita')->paginate(3);
        $get = News::orderBy('id', 'desc')->take(3);
        if(Request('search')) {
            $get->where('title', 'like', '%' . request('search'). '%')
            ->orwhere('excerpt', 'like', '%' . request('search'). '%')
            ->orwhere('body', 'like', '%' . request('search'). '%');
        };

        $news = $get->get();
        return view('user.home', compact('title', 'profile', 'news'));
    }
    public function prestasi()
    {
        $title = 'Prestasi';
        $profile = ProfileDesa::first();
        $prestasi = Achievement::all();
        
        return view('user.prestasi.index', compact('title', 'profile', 'prestasi'));
    }
    public function kontak()
    {
        $title = 'Kontak';
        $profile = ProfileDesa::first();
        $kontak = Achievement::all();
        
        return view('user.kontak.index', compact('title', 'profile', 'kontak'));
    }

    public function kontak_post(request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:255',
            'body' => 'required'
        ]);
        $validate['address'] = 'Kp. ' .  $request->kp . ' RT. ' . $request->rt . ' RW. ' . $request->rw;
        $validate['status'] = 0;
        $validate['updated_at'] = null;
        Question::create($validate);

        return redirect('/kontak')->with('success', 'Pertanyaan berhasil dikirim');
    }

    public function keuangan()
    {
        $title = 'Keuangan';
        $profile = ProfileDesa::first();
        $get = News::where('category', 'keuangan');
        if(Request('search')) {
            $get->where('title', 'like', '%' . request('search'). '%')
            ->orwhere('excerpt', 'like', '%' . request('search'). '%')
            ->orwhere('body', 'like', '%' . request('search'). '%');
        };
        $keuangan = $get->paginate(4);

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
        $get = News::where('category', 'event');
        if(Request('search')) {
            $get->where('title', 'like', '%' . request('search'). '%')
            ->orwhere('excerpt', 'like', '%' . request('search'). '%')
            ->orwhere('body', 'like', '%' . request('search'). '%');
        };
        $event = $get->paginate(4);
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
        $anggota_1 = ProfileBpd::where('position', 'anggota 1')->first();
        $anggota_2 = ProfileBpd::where('position', 'anggota 2')->first();
        $anggota_3 = ProfileBpd::where('position', 'anggota 3')->first();
        $anggota_4 = ProfileBpd::where('position', 'anggota 4')->first();
        $sekretaris = ProfileBpd::where('position', 'Sekretaris')->first();
        $wakil_kepala = ProfileBpd::where('position', 'wakil ketua')->first();
        $kepala = ProfileBpd::where('position', 'Ketua')->first();
        $profile = ProfileDesa::first();

        return view('user.bpd.index', compact('title', 'profile', 'anggota_1', 'anggota_2', 'anggota_3', 'anggota_4', 'wakil_kepala', 'kepala', 'sekretaris'));
    }

    public function about()
    {
        $title = 'About';
        $profile = ProfileDesa::first();
        $name = $profile->name;
        $about= $profile->about_web;
        $news = News::latest()->paginate(3);
        return view('user.about', compact('title', 'profile', 'name', 'about', 'news'));
    }

    public function news()
    {
        $title = 'Berita';
        $profile = ProfileDesa::first();
        $name = $profile->name;
        $news = News::latest()->paginate(7);
        return view('user.news.index', compact('title', 'profile', 'name', 'news'));
    }

    public function news_slug(News $news)
    {
        $title = 'Berita';
        $profile = ProfileDesa::first();
        // $name = $profile->name;
        $author = User::first();
        return view('user.news.show', compact('title', 'profile', 'news', 'author'));
    }

    public function pertanyaan()
    {
        $title = 'Pertanyaan';
        $profile = ProfileDesa::first();
        $get = Question::where('status', 1);
        if (Request('search')) {
            $get->where('name', 'like', '%' . Request('search') . '%');
        }

        $pertanyaan = $get->paginate(9);
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
        $galeri = News::whereIn('category', ['event', 'berita'])->paginate(12);
        return view('user.galeri.index', compact('title', 'profile', 'galeri'));

    }
}
