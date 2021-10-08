@extends('layouts.master')
@section('title','Edit Produk')

@section('content')
    <div class="col-sm-6">
        <div class="card d-flex justify-content-center">
            <div class="card-header">
                <h2>Edit Produk {{ $produk->name }}</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('produk.update', $produk->id) }}">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="name">Nama Produk</label>
                        <input name="nama" type="text" class="form-control" id="name" value="{{ $produk->nama }}" placeholder="Masukan nama produk">
                    </div>
                    <div class="form-group">
                        <label for="name">Deskripsi</label>
                        <input name="deskripsi" type="text" class="form-control" id="name" value="{{ $produk->deskripsi }}" placeholder="Masukan deskripsi produk">
                    </div>

                    <button type="submit" class="btn btn-primary">Save change</button>
                </form>
            </div>
        </div>
    </div>


@endsection
