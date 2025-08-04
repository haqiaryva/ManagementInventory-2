<?php

namespace App\Http\Controllers;

use App\Models\AtkItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    // Menampilkan halaman laporan stok
    public function index()
    {
        $items = AtkItem::orderBy('nama_barang')->get();
        return view('laporan.index', compact('items'));
    }
}
