<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{

    public function index()
    {
        $units = Unit::all();
        return view('manage_unit.index', compact('units'));
    }
    public function create()
    {
        return view('manage_unit.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama_unit' => 'required|string|max:255']);
        Unit::create(['nama_unit' => $request->nama_unit]);
        return redirect()->route('unit.index')->with('success', 'Unit berhasil ditambahkan!');
    }
}
