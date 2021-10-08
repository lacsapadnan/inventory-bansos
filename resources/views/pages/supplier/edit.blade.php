@extends('layouts.master')
@section('title','Edit supplier')

@section('content')
    <div class="col-sm-6">
        <div class="card d-flex justify-content-center">
            <div class="card-header">
                <h2>Edit Supplier {{ $supplier->name }}</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('supplier.update', $supplier->id) }}">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input name="name" type="text" class="form-control" id="name" value="{{ $supplier->name }}" placeholder="Masukan nama supplier">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input name="email" type="text" class="form-control" id="email" value="{{ $supplier->email }}" placeholder="Masukan email supplier">
                    </div>
                    <div class="form-group">
                        <label for="name">phone</label>
                        <input name="phone" type="tel" class="form-control" id="phone" value="{{ $supplier->phone }}" placeholder="Masukan email supplier">
                    </div>
                    <div class="form-group mt-4">
                        <label for="name">Alamat</label>
                        <textarea name="address" class="form-control" rows="4" id="alamat" placeholder="Masukan alamat suplier">
                            {!! $supplier->address !!}
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save change</button>
                </form>
            </div>
        </div>
    </div>


@endsection
