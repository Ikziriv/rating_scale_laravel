<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Indikator;

class IndikatorController extends Controller
{
    public function index()
    {
        $indikators = Indikator::all();
        return view('backend.pages.indikator.index', compact('indikators'));
    }

    public function create()
    {
        $variable = DB::table('variables')->select('id', 'name')->get();
        return view('backend.pages.indikator.create', compact('variable'));
    }

    public function store(Request $request)
    {
        $indikator = Indikator::create($request->all());

        return redirect()->route('indikator.index')->with('success','Indikator berhasil ditambahkan');
    }

    public function edit(Indikator $indikator)
    {
        return view('backend.pages.indikator.edit', compact('indikator'));
    }

    public function update(Request $request, Indikator $indikator)
    {
        $indikator->update($request->all());

        return redirect()->route('indikator.index')->with('success','Indikator berhasil diubah');
    }

    public function show(Indikator $indikator)
    {
        return view('backend.pages.indikator.show', compact('indikator'));
    }

    public function destroy(Indikator $indikator)
    {
        $indikator->delete();
        return redirect()->back()->with('success','Indikator berhasil dihapus');
    }
}
