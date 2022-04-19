<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\ProfileDesa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Prestasi desa';
        $page = 10;
        $search = Achievement::latest();
        if (Request('search')) {
            $search->where('name', 'like', '%' . Request('search') . '%');
        }
        $data = $search->paginate($page);

        // profile
        $cek_nama = ProfileDesa::count();
        if ($cek_nama > 0) {
            $name = ProfileDesa::first();
            $name = $name->name;
        } else {
            $name = 'Spd Perjuangan';
        }

        $cek_logo = ProfileDesa::count();
        if ($cek_logo > 0) {
            $logo = ProfileDesa::first();
            $logo = $logo->picture;
        } else {
            $logo = '';
        }

        return view('admin.achievement.index', compact('title', 'data', 'name', 'logo'))
            ->with('i', (Request()->input('page', 1) - 1) * $page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah prestasi';

        // profile
        $cek_nama = ProfileDesa::count();
        if ($cek_nama > 0) {
            $name = ProfileDesa::first();
            $name = $name->name;
        } else {
            $name = 'Spd Perjuangan';
        }

        $cek_logo = ProfileDesa::count();
        if ($cek_logo > 0) {
            $logo = ProfileDesa::first();
            $logo = $logo->picture;
        } else {
            $logo = '';
        }

        return view('admin.achievement.create', compact('title', 'name', 'logo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:news|max:255',
            'achievement_date' => 'required',
            'picture' => 'required|file|max:5024',
            'body' => 'required'
        ]);
        $picture_name = $request->file('picture')->getClientOriginalName();

        $request->file('picture')->storeAs('public/gambar_prestasi', $picture_name);

        $validate['excerpt'] = Str::limit(strip_tags($request->body, 200));

        $validate['picture'] = $picture_name;
        Achievement::create($validate);
        return redirect('/admin/achievement')->with('success', 'Prestasi berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function show(Achievement $achievement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function edit(Achievement $achievement)
    {
        $title = 'edit prestasi';
        // profile
        $cek_nama = ProfileDesa::count();
        if ($cek_nama > 0) {
            $name = ProfileDesa::first();
            $name = $name->name;
        } else {
            $name = 'Spd Perjuangan';
        }

        $cek_logo = ProfileDesa::count();
        if ($cek_logo > 0) {
            $logo = ProfileDesa::first();
            $logo = $logo->picture;
        } else {
            $logo = '';
        }

        return view('admin.achievement.edit', compact('title', 'name', 'logo', 'achievement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Achievement $achievement)
    {
        $rule = [
            'title' => 'required|max:40',
            'achievement_date' => 'required',
            'body' => 'required'
        ];

        if ($request->slug != $achievement->slug) {
            $rule['slug'] = 'required|unique:achievements|max:255';
        }

        if ($request->file('picture') != $achievement->picture && $request->file('picture') != '') {
            $rule['picture'] = 'required|file|max:5024';
        }

        $validate = $request->validate($rule);

        if ($request->file('picture') != $achievement->picture && $request->file('picture') != '') {
            $picture_name = $request->file('picture')->getClientOriginalName();

            $request->file('picture')->storeAs('public/gambar_prestasi', $picture_name);
        }

        if ($request->body != $achievement->body) {
            $validate['excerpt'] = Str::limit(strip_tags($request->body, 200));
        }

        $achievement->update($validate);

        return redirect('/admin/achievement')->with('update', 'Prestasi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Achievement $achievement)
    {
        File::delete('storage/gambar_prestasi/' . $achievement->picture);
        $achievement->delete();
        return redirect('/admin/achievement')->with('delete', 'Prestasi berhasil dihapus');
    }
}
