<?php

namespace App\Http\Controllers;

use App\Models\AtkItem;
use App\Models\BarangMasuk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index(Request $request)
    {
        $query = BarangMasuk::with('atkItem');

        // Filter berdasarkan tanggal
        if ($request->filled('start_date')) {
            $query->whereDate('tanggal', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('tanggal', '<=', $request->end_date);
        }

        $barangMasuk = $query
            ->orderBy('tanggal', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(15)
            ->withQueryString(); // untuk mempertahankan parameter filter

        return view('barang_masuk.index', compact('barangMasuk'));
    }

    public function create()
    {
        $atkItems = AtkItem::all();
        return view('barang_masuk.create', compact('atkItems'));
    }

    public function store(Request $request)
    {
        // Validasi umum
        $request->validate([
            'tanggal' => 'required|date',
            'qty' => 'required|integer|min:1',
            // 'pic' => 'required|string|max:255',
        ]);

        $atk_item_id = null;

        // Cek apakah input barang baru
        if ($request->filled('nama_barang_baru')) {
            // Validasi untuk barang baru
            $request->validate([
                'nama_barang_baru' => 'required|string|max:255',
                'kode_barang_baru' => 'required|string|unique:atk_items,kode_barang',
                'lokasi_simpan_baru' => 'required|string|max:255',
                'satuan' => 'required|string|max:50',
            ]);

            // Simpan barang baru ke atk_items
            $newItem = AtkItem::create([
                'nama_barang' => $request->nama_barang_baru,
                'kode_barang' => $request->kode_barang_baru,
                'qty' => 0, // qty akan ditambah di bawah
                'satuan' => $request->satuan,
                'lokasi_simpan' => $request->lokasi_simpan_baru,
            ]);

            $atk_item_id = $newItem->id;
        } else {
            // Gunakan barang yang sudah ada
            $request->validate([
                'atk_item_id' => 'required|exists:atk_items,id',
            ]);

            $atk_item_id = $request->atk_item_id;
        }

        // Catat barang masuk
        BarangMasuk::create([
            'atk_item_id' => $atk_item_id,
            'tanggal' => $request->tanggal,
            'qty' => $request->qty,
            'satuan' => $request->satuan,
            'pic' => Auth::user()->name, // PIC diisi otomatis dari user yang login
        ]);

        // Update stok ATK
        $item = AtkItem::findOrFail($atk_item_id);
        $item->qty += $request->qty;
        $item->save();

        return redirect()->route('barangMasuk.index')->with('success', 'Barang masuk berhasil dicatat!');
    }
}
