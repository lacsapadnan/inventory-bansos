<?php

namespace App\Http\Controllers;

use App\Models\Bansos;
use App\Models\PaketBansos;
use App\Models\Penerima;
use Illuminate\Http\Request;

class BansosController extends Controller
{
    function __construct()
        {
            $this->Bansos = new Bansos;
        }


    public function index()
    {
        $bansos = Bansos::with(['paket', 'penerima'])->get();
        $paket = PaketBansos::all();
        $penerima = Penerima::all();
        return view('pages.bansos.index', [
            'bansos' => $bansos,
            'paket' => $paket,
            'penerima' => $penerima,
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
        Bansos::create($data);
        $this->Bansos->tambah_data($update_stock_out);
        return redirect('bansos')->with('success', 'Produk berhasil dibuat');
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
        //
    }
}
