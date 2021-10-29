<?php

namespace App\Http\Controllers;

use DB;
use App\Role;
use App\User;
use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.pages.user.index', compact('users'));
    }

    public function create()
    {
        $roles = DB::table('roles')->select('id', 'name')->get();
        return view('backend.pages.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $user = User::create([
            'role_id' => $request->role_id,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $pegawai = Pegawai::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'alamat' => $request->alamat,
            'jenkel' => $request->jenkel,
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'jnskartu' => $request->jnskartu,
            'noiden' => $request->noiden,
            'agama' => $request->agama,
            'tlp' => $request->tlp,
            'status' => $request->status,
            'nmibu' => $request->nmibu,
        ]);

        return redirect()->route('user.index')->with('success','User berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        $roles = DB::table('roles')->select('id', 'name')->get();
        $pegawai = DB::table('pegawais')->where('user_id', $user->id)->first();
        return view('backend.pages.user.edit', compact('user', 'pegawai', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('user.index')->with('success','User berhasil diubah');
    }

    public function show(User $user)
    {
        return view('backend.pages.user.show', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success','User berhasil dihapus');
    }
}
