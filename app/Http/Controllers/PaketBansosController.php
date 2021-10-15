<?php

namespace App\Http\Controllers;

use App\Models\PaketBansos;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaketBansosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paket = PaketBansos::all();
        return view('pages.paket.index', [
            'paket' => $paket
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all();
        return view('pages.paket.create',[
            'produk' => $produk,
            'produk2' => $produk
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
        $data['nama_paket'] = $request->nama_paket;
        $data['deskripsi'] = $request->deskripsi;
        $simpan = PaketBansos::create($data);
        $insertedId = $simpan->id;

        $produk_id = $_POST['produk_id'];
        $qty = $_POST['qty'];
        $jumlah_data = count($produk_id);

        for($i = 0; $i < $jumlah_data;$i++)
        {
            $a = $produk_id[$i];
            $b = $qty[$i];

            DB::table('detail_paket')->insert([
                'id_paket_bansos' =>$insertedId,
                'id_produk' => $a,
                'qty' => $b
            ]);
        }
       return redirect()->route('paket-bansos.index');
    }

    public function show($id)
    {
        $data = PaketBansos::findOrFail($id);
        $detail =DB::table('detail_paket')
                ->join('produks', 'detail_paket.id_produk', '=', 'produks.id')

                ->where('id_paket_bansos', $id)->get();

        return view('pages.paket.show',[
            'data' => $data,
            'detail' => $detail
        ]);
    }

    public function showDetail()
    {
        $id =$_GET['kode'];
        $detail =DB::table('detail_paket')
                ->join('produks', 'detail_paket.id_produk', '=', 'produks.id')
                ->select('detail_paket.id as id_detail_paket','detail_paket.qty','produks.*')
                ->where('id_paket_bansos', $id)->get();
        echo json_encode($detail);
    }

    public function DeleteDetail()
    {
        $id =$_GET['kode'];
        $detail = DB::table('detail_paket')->where('id', $id)->delete();
        echo json_encode($detail);
    }


    public function edit($id)
    {
        $produk = Produk::all();
        $data = PaketBansos::findOrFail($id);
        $detail =DB::table('detail_paket')
                ->join('produks', 'detail_paket.id_produk', '=', 'produks.id')
                ->where('id_paket_bansos', $id)->get();

        return view('pages.paket.edit',[
            'data' => $data,
            'detail' => $detail,
            'produk' => $produk,
            'produk2' => $produk
        ]);
    }




    public function destroy($id)
    {
        DB::table('detail_paket')->where('id_paket_bansos', $id)->delete();
        PaketBansos::findOrFail($id)->delete();

        return redirect()->route('paket-bansos.index');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = PaketBansos::findOrFail($id);
        $item->update($data);

        $produk_id = $_POST['produk_id'];
        $qty = $_POST['qty'];
        $id_paket_bansos = $_POST['id_paket'];
        $jumlah_data = count($produk_id);

        for($i = 0; $i < $jumlah_data;$i++)
        {
            $a = $produk_id[$i];
            $b = $qty[$i];
            $c = $id_paket_bansos[$i];

            DB::table('detail_paket')->insert([
                'id_paket_bansos' =>$c,
                'id_produk' => $a,
                'qty' => $b
            ]);
        }
       return redirect()->route('paket-bansos.index');

    }
}
