<?php

namespace App\Http\Controllers;

use App\Models\Request as RequestModel;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    // Menampilkan semua permintaan ATK
    public function index()
    {
        $requests = RequestModel::with('unit')->orderBy('created_at', 'desc')->get();
        return view('requests.index', compact('requests'));
    }

    // Menampilkan form permintaan ATK
    public function create()
    {
        // $atkItems = AtkItem::all();
        $units = Unit::all();
        return view('requests.create', compact('units'));
    }

    // Menyimpan permintaan baru
    public function store(Request $request)
    {
        $request->validate([
            'atk_item_id' => 'nullable|exists:atk_items,id',
            'nama_barang_baru' => 'nullable|string|max:255',
            'tanggal' => 'required|date',
            'penerima' => 'required|string|max:255',
            'unit_id' => 'required|integer|exists:units,id',
            // 'unit' => 'required|string|max:255',
            'qty' => 'required|integer|min:1',
            'satuan' => 'required|string|max:50',
            'pic' => 'required|string|max:255',
        ]);

        // Pastikan user mengisi salah satu: atk_item_id atau nama_barang_baru
        if (!$request->atk_item_id && !$request->nama_barang_baru) {
            return back()->withErrors(['atk_item_id' => 'Pilih barang atau isi nama barang baru'])->withInput();
        }

        RequestModel::create([
            // 'atk_item_id' => $request->atk_item_id,
            'nama_barang' => $request->nama_barang_baru ?? 'null', // disimpan jika barang baru
            'tanggal' => $request->tanggal,
            'penerima' => $request->penerima,
            'unit_id' => $request->unit_id,
            'qty' => $request->qty,
            'satuan' => $request->satuan,
            'pic' =>  Auth::user()->name,
            'status' => 'pending',
        ]);

        return redirect()->route('requests.index')->with('success', 'Permintaan ATK berhasil dikirim!');
    }

    // (Opsional) Update status oleh admin
    public function updateStatus($id)
{
    $request = RequestModel::findOrFail($id);
    $request->status = 'done';
    $request->save();

    return redirect()->back()->with('success', 'Status berhasil diperbarui.');
}

}
