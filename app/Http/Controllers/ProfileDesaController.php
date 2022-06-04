<?php

namespace App\Http\Controllers;

use App\Models\ProfileDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Profil Desa';
        $data = ProfileDesa::first();

        // profile
        $cek = ProfileDesa::count();
        if ($cek > 0) {
            $name = ProfileDesa::first();
            $name = $name->name;
        } else {
            $name = 'Spd Perjuangan';
        }

        $cek = ProfileDesa::count();
        if ($cek > 0) {
            $logo = ProfileDesa::first();
            $logo = $logo->picture;
        } else {
            $logo = '';
        }

        return view('admin.profile-desa.index', compact('title', 'data', 'name', 'logo', 'cek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Profil Desa';

        $data = ProfileDesa::all();

        // profile
        $cek = ProfileDesa::count();
        if ($cek > 0) {
            $name = ProfileDesa::first();
            $name = $name->name;
        } else {
            $name = 'Spd Perjuangan';
        }

        $cek = ProfileDesa::count();
        if ($cek > 0) {
            $profile = ProfileDesa::first();
            $logo = $profile->picture;
            $background = $profile->backgorund;
        } else {
            $logo = '';
            $background = '';
        }

        return view('admin.profile-desa.create', compact('title', 'name', 'logo', 'background'));
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
            'name' => 'required|unique:profile_desa|max:255',
            'address' => 'required|max:255',
            'picture' => 'required|file|image|max:2048',
            'background' => 'required|file|image|max:2048',
            'about_web' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'prestasi' => 'required',
        ]);

        $picture_name = $request->file('picture')->getClientOriginalName();
        $path_logo = $request->file('picture')->storeAs('public/logo', $picture_name);
        $validate['picture'] = $picture_name;

        $background_name = $request->file('background')->getClientOriginalName();
        $path_bg = $request->file('background')->storeAs('public/bg', $background_name);
        $validate['background'] = $background_name;

        ProfileDesa::create($validate);

        return redirect('/admin/profile-desa')->with('success', 'Profile berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfileDesa  $profileDesa
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileDesa $profileDesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfileDesa  $profileDesa
     * @return \Illuminate\Http\Response
     */
    public function edit($profile_id)
    {
        $title = 'Edit Profil';
        $data = ProfileDesa::findOrFail($profile_id);

        // profile
        $cek = ProfileDesa::count();
        if ($cek > 0) {
            $name = ProfileDesa::first();
            $name = $name->name;
        } else {
            $name = 'Spd Perjuangan';
        }

        $cek = ProfileDesa::count();
        if ($cek > 0) {
            $profile = ProfileDesa::first();
            $logo = $profile->picture;
            $background = $profile->backgorund;
        } else {
            $logo = '';
            $background = '';
        }

        return view('admin.profile-desa.edit', compact('title', 'name', 'logo', 'background', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfileDesa  $profileDesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $profile_id)
    {
        $rule = [
            'name' => 'required|min:5|max:255',
            'address' => 'required|max:255',
            'about_web' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'prestasi' => 'required',
        ];

        $profile = ProfileDesa::find($profile_id);
        if ($request->name != $profile->name) {
            $rule['name'] = 'required|unique:profile_desa|min:5|max:255';
        }

        if ($request->picture != $profile->picture && $request->file('picture') != '') {
            $rule['picture'] = 'file|image|max:2048';
        }

        $validate = $request->validate($rule);

        if ($request->picture != $profile->picture && $request->file('picture') != '') {
            $picture_name = $request->file('picture')->getClientOriginalName();
            $path_logo = $request->file('picture')->storeAs('public/logo', $picture_name);

            $validate['picture'] = $picture_name;
        }

        if ($request->background != $profile->background && $request->file('background') != '') {
            $background_name = $request->file('background')->getClientOriginalName();
            $path_bg = $request->file('background')->storeAs('public/bg', $background_name);

            $validate['background'] = $background_name;
        }

        ProfileDesa::where('id', $profile_id)->update($validate);
        return redirect('/admin/profile-desa')->with('update', 'Profile berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfileDesa  $profileDesa
     * @return \Illuminate\Http\Response
     */
    public function destroy($profile_id)
    {
        $logo = ProfileDesa::where('id', $profile_id)->first();
        File::delete('storage/logo/' . $logo->picture);
        $logo = $logo->delete();
        return redirect('/admin/profile-desa')->with('delete', 'Profile berhasil dihapus');
    }
}
