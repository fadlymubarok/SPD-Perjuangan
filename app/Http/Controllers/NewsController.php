<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Berita Desa';
        $page = 1;
        $search = News::latest();
        if (Request('search')) {
            $search->where('name', 'like', '%' . Request('search') . '%');
        }
        $data = $search->paginate($page);
        return view('petugas.berita.index', compact('title', 'data'))
            ->with('i', (Request()->input('page', 1) - 1) * $page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Berita';
        return view('petugas.berita.create', compact('title'));
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

        News::create($validate);
        return redirect('/petugas/berita')->with('success', 'News saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $data = $news;
        $title = 'edit berita';
        return view('petugas.berita.edit', compact('title', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $rule = [
            'name' => 'required'
        ];

        $validate = $request->validate($rule);
        $news->update($validate);
        return redirect('/petugas/berita')->with('update', 'News updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect('/petugas/berita')->with('delete', 'News deleted successfully');
    }
}
