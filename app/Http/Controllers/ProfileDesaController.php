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
        $title = 'Profile';
        $data = ProfileDesa::all();

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

        return view('admin.profile.index', compact('title', 'data', 'name', 'logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create profile';

        $data = ProfileDesa::all();
        if ($data->count() == 0) {
            $logo = '';
            $name = 'Spd Perjuangan';
        }

        return view('admin.profile.create', compact('title', 'name', 'logo'));
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
            'name' => 'required|unique:profile_desa|min:5|max:255',
            'picture' => 'required|file|image|max:2048'
        ]);

        $picture_name = $request->file('picture')->getClientOriginalName();
        $path = $request->file('picture')->storeAs('public/logo', $picture_name);

        $validate['picture'] = $picture_name;
        ProfileDesa::create($validate);
        return redirect('/admin/profile')->with('success', 'Profile created successfully');
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
        $title = 'Profile';
        $data = ProfileDesa::findOrFail($profile_id);

        // profile
        $name = ProfileDesa::get('name');
        if (is_null($name)) {
            $name = 'Spd Perjuangan';
        } else {
            $name = $name[0]['name'];
        }

        $logo = ProfileDesa::get('picture');
        if (is_null($logo)) {
            $logo = '';
        } else {
            $logo = `<link rel="icon" href="{{ url('storage/logo/$logo[0]['picture']') }}">`;
        }

        return view('admin.profile.edit', compact('title', 'name', 'logo', 'data'));
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
        $validate = $request->validate([
            'name' => 'required|min:5|max:255',
            'picture' => 'required|file|image|max:2048'
        ]);

        $picture_name = $request->file('picture')->getClientOriginalName();
        $path = $request->file('picture')->storeAs('public/logo', $picture_name);

        $validate['picture'] = $picture_name;
        ProfileDesa::where('id', $profile_id)->update($validate);
        return redirect('/admin/profile')->with('update', 'Profile updated successfully');
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
        return redirect('/admin/profile')->with('delete', 'Profile deleted successfully');
    }
}
