<?php

namespace App\Http\Controllers;

use App\Models\Paketrw;
use App\Models\Penerima;
use App\Models\PenyaluranBansos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenyaluranBansosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penyaluran = PenyaluranBansos::with(['penerima', 'paket_rw'])->get();
        $penerima = Penerima::all();
        $paketrw = Paketrw::with('paket')->first();

        return view('pages.RW.penyaluran.index', [
            'penyaluran' => $penyaluran,
            'penerima' => $penerima,
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
        $penerima = Penerima::where(['status' => 'disetujui', 'user_id' => Auth::user()->id])->get();
        $paketrw = Paketrw::where('id_rw', Auth::user()->id)->get();
        return view('pages.RW.penyaluran.create', [
            'penerima' => $penerima,
            'paketrw' => $paketrw,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_paket_rw' => 'required',
            'id_penerima' => 'required',
        ]);

        PenyaluranBansos::create($request->all());
        $paketrw = Paketrw::findOrFail($request->id_paket_rw);
        $paketrw->stok -= 1;
        $paketrw->save();

        return redirect()->route('penyaluran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penyaluran = PenyaluranBansos::findOrFail($id);
        $penerima = Penerima::all();
        // $paketrw = Paketrw::with('paket')->first();
        $detail =DB::table('detail_paket')
                ->join('produks', 'detail_paket.id_produk', '=', 'produks.id')

                ->where('id_paket_bansos', $id)->get();
        return view('pages.RW.penyaluran.show', [
            'penyaluran' => $penyaluran,
            'penerima' => $penerima,
            'detail' => $detail,
        ]);
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
        //
    }
}
