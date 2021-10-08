<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Restok;
use App\Models\Supplier;
use Illuminate\Http\Request;

class RestokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restok = Restok::with(['produk', 'supplier'])->get();
        $produk = Produk::all();
        $supplier = Supplier::all();
        return view('pages.restok.index', [
            'restok' => $restok,
            'produk' => $produk,
            'supplier' => $supplier,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Restok::create($data);

        $produk = Produk::findOrFail($request->produk_id);
        $produk->stok += $request->qty;
        $produk->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Restok::destroy($id);
        return redirect()->back();
    }
}
