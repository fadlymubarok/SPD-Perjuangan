<?php

namespace App\Http\Controllers;

use App\Models\ProfileDesa;
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
    }
}
