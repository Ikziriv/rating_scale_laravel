<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('backend.pages.role.index', compact('roles'));
    }

    public function create()
    {
        return view('backend.pages.role.create');
    }

    public function store(Request $request)
    {
        $role = Role::create($request->all());

        return redirect()->route('role.index')->with('success','Role berhasil ditambahkan');
    }

    public function edit(Role $role)
    {
        return view('backend.pages.role.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->all());

        return redirect()->route('role.index')->with('success','Role berhasil diubah');
    }

    public function show(Role $role)
    {
        return view('backend.pages.role.show', compact('role'));
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->with('success','Role berhasil dihapus');
    }
}
