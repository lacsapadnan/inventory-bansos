@extends('layouts.master')
@section('title','Edit penerima')

@section('content')
    <div class="col-sm-6">
        <div class="card d-flex justify-content-center">
            <div class="card-header">
                <h2>Edit penerima {{ $penerima->name }}</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('penerima.update', $penerima->id) }}">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input name="name" type="text" class="form-control" id="name" value="{{ $penerima->name }}" placeholder="Masukan nama penerima">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input name="email" type="text" class="form-control" id="email" value="{{ $penerima->email }}" placeholder="Masukan email penerima">
                    </div>
                    <div class="form-group">
                        <label for="name">phone</label>
                        <input name="phone" type="tel" class="form-control" id="phone" value="{{ $penerima->phone }}" placeholder="Masukan email penerima">
                    </div>
                    <div class="form-group mt-4">
                        <label for="name">Alamat</label>
                        <textarea name="address" class="form-control" rows="4" id="alamat" placeholder="Masukan alamat suplier">
                            {!! $penerima->address !!}
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save change</button>
                </form>
            </div>
        </div>
    </div>


@endsection
