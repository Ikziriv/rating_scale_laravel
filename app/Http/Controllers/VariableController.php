<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Variable;

class VariableController extends Controller
{
    public function index()
    {
        $variables = Variable::all();
        return view('backend.pages.variable.index', compact('variables'));
    }

    public function create()
    {
        return view('backend.pages.variable.create');
    }

    public function store(Request $request)
    {
        $variable = Variable::create($request->all());

        return redirect()->route('variable.index')->with('success','Variable berhasil ditambahkan');
    }

    public function edit(Variable $variable)
    {
        return view('backend.pages.variable.edit', compact('variable'));
    }

    public function update(Request $request, Variable $variable)
    {
        $variable->update($request->all());

        return redirect()->route('variable.index')->with('success','Variable berhasil diubah');
    }

    public function show(Variable $variable)
    {
        return view('backend.pages.variable.show', compact('variable'));
    }

    public function destroy($id)
    {
        $variable = Variable::findOrFail($id);
        $variable->delete();
        return redirect()->back()->with('success','Variable berhasil dihapus');
    }
}
