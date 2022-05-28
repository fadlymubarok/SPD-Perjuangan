<?php

namespace App\Http\Controllers;

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
