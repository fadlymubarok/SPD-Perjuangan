<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::where('is_admin', 0)->get();
        $title = 'Account Data';
        return view('admin.account.index', compact('data', 'title'));
    }

    public function edit(User $user)
    {
        $title = 'ubah data';
        $data = $user;
        $position = Position::all();
        return view('admin.account.edit', compact('title', 'data', 'position'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'position_id' => 'nullable'
        ]);
        $request->position_id = (int)$request->position_id;

        $user->update($request->all());
        return redirect('/account')->with('success', 'Account updated successfully');
    }
}
