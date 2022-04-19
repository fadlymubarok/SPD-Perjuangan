<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\ProfileDesa;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Posisi';
        $data = Position::all();

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

        return view('admin.position.index', compact('title', 'data', 'name', 'logo'))
            ->with('i', (Request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah posisi';

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
            $logo = ProfileDesa::first();
            $logo = $logo->picture;
        } else {
            $logo = '';
        }

        return view('admin.position.create', compact('title', 'name', 'logo'));
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
            'name' => 'required|unique:positions',
            'for' => 'required|min:1'
        ]);

        Position::create($validate);
        return redirect('/admin/position')->with('success', 'Posisi berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        $title = 'edit posisi';
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

        return view('admin.position.edit', compact('title', 'name', 'logo', 'position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        $rule = [
            'for' => 'required|min:1'
        ];

        if ($request->name != $position->name) {
            $rule['name'] = 'required|unique:positions';
        }

        $validate = $request->validate($rule);

        $position->update($validate);
        return redirect('/admin/position')->with('update', 'Posisi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        $position->delete();
        return redirect('/admin/position')->with('delete', 'Posisi berhasil dihapus');
    }
}
