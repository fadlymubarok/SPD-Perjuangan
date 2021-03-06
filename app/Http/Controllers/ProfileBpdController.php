<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\ProfileBpd;
use App\Models\ProfileDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileBpdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Profil BPD';
        $data = ProfileBpd::all();

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

        return view('admin.profile-bpd.index', compact('title', 'data', 'name', 'logo'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Profil BPD';

        $positions = Position::where('for', 'bpd')->get();
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

        return view('admin.profile-bpd.create', compact('title', 'name', 'logo', 'positions'));
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
            'position'      => 'required|min:1|max:255',
            'picture'       => 'required|file|image|max:2048'
        ]);

        $picture_name = $request->file('picture')->getClientOriginalName();
        $path = $request->file('picture')->storeAs('public/gambar_bpd', $picture_name);

        $validate['picture'] = $picture_name;
        ProfileBpd::create($validate);
        return redirect('/admin/profile-bpd')->with('success', 'Profile BPD created successfully');
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
        $title = 'Edit Profil BPD';
        $data = ProfileBpd::findOrFail($id);
        $positions = Position::where('for', 'bpd')->get();


        // profile
        $name = ProfileBpd::get('name');
        if (is_null($name)) {
            $name = 'Spd Perjuangan';
        } else {
            $name = $name[0]['name'];
        }

        $logo = ProfileBpd::get('picture');
        if (is_null($logo)) {
            $logo = '';
        } else {
            $logo = `<link rel="icon" href="{{ url('storage/logo/$logo[0]['picture']') }}">`;
        }

        return view('admin.profile-bpd.edit', compact('title', 'name', 'logo', 'data', 'positions'));
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
        $rules = [
            'name'          => 'required|max:255',
            'position'      => 'required|min:1|max:255'
        ];

        $profile = ProfileBpd::find($id);
        if ($request->picture != $profile->picture && $request->file('picture') != '') {
            $rules['picture'] = 'required|file|image|max:2048';
        }

        $validate = $request->validate($rules);

        if ($request->picture != $profile->picture && $request->file('picture') != '') {
            $picture_name = $request->file('picture')->getClientOriginalName();
            $path = $request->file('picture')->storeAs('public/gambar_bpd', $picture_name);

            $validate['picture'] = $picture_name;
        }

        ProfileBpd::where('id', $id)->update($validate);
        return redirect('/admin/profile-bpd')->with('update', 'Profile BPD updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $logo = ProfileBpd::where('id', $id)->first();
        File::delete('storage/gambar_bpd/' . $logo->picture);
        $logo = $logo->delete();
        return redirect('/admin/profile-bpd')->with('delete', 'Profile BPD deleted successfully');
    }
}
