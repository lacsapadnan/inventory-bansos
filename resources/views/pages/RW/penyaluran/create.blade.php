@extends('layouts.master')
@section('title','Tambah Paket')

@section('content')
    <div class="col-lg-6">
        <div class="card d-flex justify-content-center">
            <div class="card-header">
                <h2>Tambah Paket Bansos</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('penyaluran.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="name">Nama Penerima</label>
                        <select class="form-control" name="id_penerima" id="single-select">
                            <option value="" >-- Pilih --</option>
                            @foreach ($penerima as $penerima)
                                <option value="{{ $penerima->id }}">{{ $penerima->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Paket Bansos</label>
                            <select class="form-control" name="id_paket_rw" required>
                            <option value="" >-- Pilih --</option>
                            @foreach ($paketrw as $paketrw)
                                <option value="{{ $paketrw->id }}">{{ $paketrw->paket->nama_paket }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
