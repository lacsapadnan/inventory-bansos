<?php

namespace App\Http\Controllers;

use App\Models\Bansos;
use App\Models\PaketBansos;
use App\Models\Penerima;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
        $penerima =User::where('roles','rw')
                    ->get();
        return view('pages.bansos.index', [
            'bansos' => $bansos,
            'paket' => $paket,
            'penerima' => $penerima,
        ]);
    }

    public function create()
    {

    }

 public function store(Request $request)
    {
        $data = $request->all();
        Bansos::create($data);
        $paket_id = $request->paket_id;
        $penerima_id = $request->penerima_id;
        $qty = $request->qty;

        $cek =  DB::table('paket_rw')
                ->where('id_paket_bansos', $paket_id)
                ->where('id_rw', $penerima_id)
                ->count();


        if ($cek > 0) {
            DB::update("UPDATE paket_rw SET stok = stok + $qty where id_paket_bansos='$paket_id' and id_rw='$penerima_id'");
        } else {
            DB::insert("insert into paket_rw (id_paket_bansos,id_rw,stok) values ('$paket_id','$penerima_id','$qty')");
        }
        return redirect()->route('bansos.index');

    }


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


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $data = Bansos::findOrFail($id);
        $paket_id = $data->paket_id;
        $qty = $data->qty;
        $penerima_id = $data->penerima_id;
        DB::update("UPDATE paket_rw SET stok = stok - $qty where id_paket_bansos='$paket_id' and id_rw='$penerima_id'");
        Bansos::findOrFail($id)->delete();
        return redirect()->route('bansos.index');
    }
}
