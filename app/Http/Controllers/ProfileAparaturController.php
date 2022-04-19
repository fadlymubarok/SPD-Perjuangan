<?php

namespace App\Http\Controllers;

use App\Models\ProfileAparatur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileAparaturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Profile Aparatur';
        $data = ProfileAparatur::all();

        // profile
        $cek_nama = ProfileAparatur::count();
        if ($cek_nama > 0) {
            $name = ProfileAparatur::first();
            $name = $name->name;
        } else {
            $name = 'Spd Perjuangan';
        }

        $cek_logo = ProfileAparatur::count();
        if ($cek_logo > 0) {
            $logo = ProfileAparatur::first();
            $logo = $logo->picture;
        } else {
            $logo = '';
        }

        return view('admin.profile-aparatur.index', compact('title', 'data', 'name', 'logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Profile Aparatur';

        $data = ProfileAparatur::all();
        if ($data->count() == 0) {
            $logo = '';
            $name = 'Spd Perjuangan';
        }

        return view('admin.profile-aparatur.create', compact('title', 'name', 'logo'));
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
            'name'          => 'required|unique:profile_desa|min:5|max:255',
            'position'      => 'required|min:5|max:255',
            'kedudukan'     => 'required|min:5|max:255',
            'tugas'         => 'required|min:5|max:255',
            'fungsi'        => 'required|min:5|max:255',
            'keterangan'    => 'required|min:5|max:255',
            'picture'       => 'required|file|image|max:2048'
        ]);

        $picture_name = $request->file('picture')->getClientOriginalName();
        $path = $request->file('picture')->storeAs('public/logo', $picture_name);

        $validate['picture'] = $picture_name;
        ProfileAparatur::create($validate);
        return redirect('/admin/profile-aparatur')->with('success', 'Profile Aparatur created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Profile Aparatur';
        $data = ProfileAparatur::findOrFail($id);

        // profile
        $name = ProfileAparatur::get('name');
        if (is_null($name)) {
            $name = 'Spd Perjuangan';
        } else {
            $name = $name[0]['name'];
        }

        $logo = ProfileAparatur::get('picture');
        if (is_null($logo)) {
            $logo = '';
        } else {
            $logo = `<link rel="icon" href="{{ url('storage/logo/$logo[0]['picture']') }}">`;
        }

        return view('admin.profile-aparatur.edit', compact('title', 'name', 'logo', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name'          => 'required|min:5|max:255',
            'position'      => 'required|min:5|max:255',
            'kedudukan'     => 'required|min:5|max:255',
            'tugas'         => 'required|min:5|max:255',
            'fungsi'        => 'required|min:5|max:255',
            'keterangan'    => 'required|min:5|max:255',
            'picture'       => 'required|file|image|max:2048'
        ]);

        $picture_name = $request->file('picture')->getClientOriginalName();
        $path = $request->file('picture')->storeAs('public/logo', $picture_name);

        $validate['picture'] = $picture_name;
        ProfileAparatur::where('id', $id)->update($validate);
        return redirect('/admin/profile-aparatur')->with('update', 'Profile Aparatur updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $logo = ProfileAparatur::where('id', $id)->first();
        File::delete('storage/logo/' . $logo->picture);
        $logo = $logo->delete();
        return redirect('/admin/profile-aparatur')->with('delete', 'Profile Aparatur deleted successfully');
    }
}
