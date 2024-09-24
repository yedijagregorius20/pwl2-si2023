<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $transactions = DB::table('transaksis as trs')
    ->select('trs.tanggal_transaksi', 'trs.nama_kasir', 'prd.title', 'prd.product_category_id', 'prd.price', 'trs.jumlah_pembelian')
    ->join('products as prd', 'trs.id_products', '=', 'prd.id')
    ->latest()
    ->paginate(10);
    
    
    
    // $transactions = \App\Models\Transaksi::all();
    return view('transaksipenjualan.index', compact('transactions'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
