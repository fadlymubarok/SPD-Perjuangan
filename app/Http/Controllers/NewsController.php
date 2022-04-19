<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\ProfileDesa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Berita desa';
        $page = 10;
        $search = News::latest();
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

        return view('admin.news.index', compact('title', 'data', 'name', 'logo'))
            ->with('i', (Request()->input('page', 1) - 1) * $page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'tambah berita';

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

        return view('admin.news.create', compact('title', 'name', 'logo'));
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
            'category' => 'required|min:1',
            'picture' => 'required|file|max:5024',
            'body' => 'required'
        ]);
        $picture_name = $request->file('picture')->getClientOriginalName();

        $request->file('picture')->storeAs('public/gambar_berita', $picture_name);

        $validate['excerpt'] = Str::limit(strip_tags($request->body, 200));

        $validate['picture'] = $picture_name;
        News::create($validate);
        return redirect('/admin/news')->with('success', 'Berita berhasil ditambah');
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
        $title = 'edit berita';
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

        return view('admin.news.edit', compact('title', 'name', 'logo', 'news'));
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
            'title' => 'required|max:255',
            'category' => 'required|min:1',
            'body' => 'required'
        ];

        if ($request->slug != $news->slug) {
            $rule['slug'] = 'required|unique:news|max:255';
        }

        if ($request->file('picture') != $news->picture && $request->file('picture') != '') {
            $rule['picture'] = 'required|file|max:5024';
        }

        $validate = $request->validate($rule);

        if ($request->file('picture') != $news->picture && $request->file('picture') != '') {
            $picture_name = $request->file('picture')->getClientOriginalName();

            $request->file('picture')->storeAs('public/gambar_berita', $picture_name);
        }

        if ($request->body != $news->body) {
            $validate['excerpt'] = Str::limit(strip_tags($request->body, 200));
        }

        $news->update($validate);

        return redirect('/admin/news')->with('update', 'Berita berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        File::delete('storage/gambar_berita/' . $news->picture);
        $news->delete();
        return redirect('/admin/news')->with('delete', 'Berita berhasil dihapus');
    }

    public function getSlug(Request $request)
    {
        $slug = SlugService::createSlug(News::class, 'slug', $request->title);
        return response()->json(['data' => $slug]);
    }
}
