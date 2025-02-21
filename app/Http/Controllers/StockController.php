<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Ambil semua data tabel stock dari database, kemudian di tampilkan pada view stocks.index
        $stocks = Stock::all();
        return view('stocks.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Menampilkan view halaman ataau form stocks baru
        return view('stocks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validasi data dengan mengisi inputan name, quantity, price harus di isi semua dan kemudian data akan disimpan, jika berhasil akan diarahkan ke route menuju halaman index 
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric'
        ]);

        Stock::create($request->all());
        return redirect()->route('stocks.index')->with('success', 'Stock berhasil di tambah.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //
        return view('stocks.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        //Menampilkan view halaman ataau form edit stocks
        return view('stocks.edit', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        //update data stock dengan input validasi pengguna atau harus di isi semua dengan pesan sukses, 
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric'
        ]);

        $stock->update($request->all());
        return redirect()->route('stocks.index')->with('success', 'Stock Berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        //menghapus data dengan mengambil variable stock kemudian diarahkan ke route menuju halaman view index jika berhasil terhapus dengan pesan sukses
        $stock->delete();
        return redirect()->route('stocks.index')->with('success', 'Stock berhasil di hapus.');
    }
}
