@extends('layouts.master')
@section('title','Tambah Paket')

@section('content')
    <div class="col-lg-12">
        <div class="card d-flex justify-content-center">
            <div class="card-header">
                <h2>Tambah Paket Bansos</h2>
                <a class="btn btn-sm btn-success mt-2" href="#" >Tambah Produk</a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('paket-bansos.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="form-group col-lg-6">
                        <label for="name">Nama Paket</label>
                        <input name="nama_paket" type="text" class="form-control" id="name"  placeholder="Masukan nama paket bansos">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Kuantitas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-control" name="produk_id[]" id="single-select">
                                            @foreach ($produk as $produk)
                                                <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="text" name="qty[]" class="form-control"></td>
                                    <td>
                                        <button id="add_btn" type="button" class="btn btn-primary" >Tambah</button>
                                        <button type="button" class="btn btn-danger">Hapus</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Simpan Paket</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- <script type="text/javascript">
        $(document).ready(function(){
            $('add_btn').on('click', function() {
                var.html='';
                html+='<tr>'
                html+='<td> <select class="form-control" name="produk_id[]" id="single-select"> @foreach ($produk as $produk) <option value="{{ $produk->id }}">{{ $produk->nama }}</option> @endforeach </select></td>'
                html+='<td><input type="text" name="qty[]" class="form-control"></td>'
                html+='<button id="add_btn" type="button" class="btn btn-primary" >Tambah</button><button type="button" class="btn btn-danger">Hapus</button>'
                html+='</tr>'
                $('tbody').append(html);
            })
        })
    </script> --}}
@endpush
