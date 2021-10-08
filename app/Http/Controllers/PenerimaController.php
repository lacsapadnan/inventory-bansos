<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerima = Penerima::where('user_id', Auth::user()->id)->get();
        return view('pages.penerima.index', compact('penerima'));
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
        // $penerima = $request->all();
        // Penerima::create($penerima);

        $penerima = new Penerima;
        $penerima->user_id = Auth::user()->id;
        $penerima->nama = $request->nama;
        $penerima->alamat = $request->alamat;
        $penerima->email = $request->email;
        $penerima->telp = $request->telp;
        $penerima->save();

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
    public function edit(Penerima $penerima)
    {
        return view('pages.penerima.edit', compact('penerima'));
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
        $data = $request->all();
        $penerima = Penerima::findOrFail($id);

        $penerima->update($data);

        return redirect()->route('penerima.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penerima::destroy($id);
        return redirect()->back();
    }

    public function verifikasi()
    {
        $penerima = Penerima::where('status', 'verifikasi')->get();
        return view('pages.penerima.verifikasi', compact('penerima'));
    }

    public function disetujui($id){
        $penerima = Penerima::where('id', $id)->update([
            'status' => 'disetujui'
        ]);
        return redirect()->back();
    }
    public function ditolak($id){
        $penerima = Penerima::where('id', $id)->update([
            'status' => 'ditolak'
        ]);
        return redirect()->back();
    }
}
