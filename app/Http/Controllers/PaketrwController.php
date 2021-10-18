<?php

namespace App\Http\Controllers;

use App\Models\Paketrw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaketrwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paketrw = Paketrw::with(['paket', 'penerima'])->get();
        return view('pages.paketrw.index', [
            'paketrw' => $paketrw,
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paketrw  $paketrw
     * @return \Illuminate\Http\Response
     */
    public function show(Paketrw $paketrw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paketrw  $paketrw
     * @return \Illuminate\Http\Response
     */
    public function edit(Paketrw $paketrw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paketrw  $paketrw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paketrw $paketrw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paketrw  $paketrw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paketrw $paketrw)
    {
        //
    }

    public function dashboard() {
        $paketrw = Paketrw::where('id_rw', Auth::user()->id)->get();
        return view('pages.RW.paket.index', [
            'paketrw' => $paketrw,
        ]);
    }
}
