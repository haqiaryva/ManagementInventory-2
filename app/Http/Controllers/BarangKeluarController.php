<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\AtkItem;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangKeluarController extends Controller
{
    // Menampilkan semua data barang keluar
    public function index(Request $request)
    {
        $query = BarangKeluar::with('atkItem');

        // Filter tanggal
        if ($request->filled('start_date')) {
            $query->whereDate('tanggal', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('tanggal', '<=', $request->end_date);
        }

        $barangKeluar = $query
            ->orderBy('tanggal', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(15)
            ->withQueryString();

        return view('barang_keluar.index', compact('barangKeluar'));
    }

    public function create(Request $request)
    {
        $atkItem = AtkItem::findOrFail($request->atk_item_id);
        $units = Unit::all();
        return view('barang_keluar.create', compact('atkItem', 'units'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'atk_item_id' => 'required|exists:atk_items,id',
            'tanggal' => 'required|date',
            'qty' => 'required|integer|min:1',
            'satuan' => 'required|string|max:50', // pastikan satuan diisi
            'penerima' => 'required|string|max:255',
            'unit_id' => 'required|integer|exists:units,id',
            // 'unit' => 'required|string|max:255',
            'pic' => 'required|string|max:255',
        ]);

        $atkItem = AtkItem::findOrFail($request->atk_item_id);
        $units = Unit::findOrFail($request->unit_id);

        if ($request->qty > $atkItem->qty) {
            return back()->withErrors(['qty' => 'Jumlah melebihi stok tersedia.']);
        }

        $data = $request->all();
        $data['pic'] = Auth::user()->name; // pastikan PIC diisi otomatis
        $data['satuan'] = $atkItem->satuan; // ambil satuan dari item ATK
        $data['unit'] = $units->nama_unit;

        BarangKeluar::create($data);

        // Kurangi stok
        $atkItem->qty -= $request->qty;
        $atkItem->save();

        return redirect()->route('barangKeluar.index')->with('success', 'Barang berhasil diambil.');
    }
}
