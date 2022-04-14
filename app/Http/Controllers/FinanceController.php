<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Keuangan Desa';
        $page = 1;
        $search = Finance::latest();
        if (Request('search')) {
            $search->where('name', 'like', '%' . Request('search') . '%');
        }
        $data = $search->paginate($page);
        return view('petugas.keuangan.index', compact('title', 'data'))
            ->with('i', (Request()->input('page', 1) - 1) * $page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Keuangan';
        return view('petugas.keuangan.create', compact('title'));
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
            'name' => 'required'
        ]);

        Finance::create($validate);
        return redirect('/petugas/keuangan')->with('success', 'Finance saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function show(Finance $finance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function edit(Finance $finance)
    {
        $data = $finance;
        $title = 'edit keuangan';
        return view('petugas.keuangan.edit', compact('title', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finance $finance)
    {
        $rule = [
            'name' => 'required'
        ];

        $validate = $request->validate($rule);
        $finance->update($validate);
        return redirect('/petugas/keuangan')->with('update', 'Finance updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finance $finance)
    {
        $finance->delete();
        return redirect('/petugas/keuangan')->with('delete', 'Finance deleted successfully');
    }
}
