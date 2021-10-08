@extends('layouts.master')
@section('title', 'Produk')

@push('style')
    <link href="assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/vendor/select2/css/select2.min.css">
@endpush

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Produk</h4>
                <button data-toggle="modal" data-target="#basicModal" type="button" class="btn btn-primary">Tambah Produk</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display min-w850">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Stok</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $index => $produk)
                                <tr>
                                    <td>{{ $index +1 }}</td>
                                    <td>{{ $produk->nama }}</td>
                                    <td>{{ $produk->deskripsi }}</td>
                                    <td>{{ $produk->stok }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <form method="POST" action="{{ route('produk.destroy', $produk->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                 </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Stok</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal fade" id="basicModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah kategori</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input name="nama" type="text" class="form-control" id="name" placeholder="Masukan nama produk">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Deskripsi</label>
                                        <input name="deskripsi" type="text" class="form-control" id="description" placeholder="Masukan deskripsi produk">
                                    </div>
                                    <div class="form-group">
                                        <input name="stok" type="number" class="form-control" id="stock" placeholder="Masukan jumlah stok" value="0" hidden>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/plugins-init/datatables.init.js"></script>
    <script src="assets/vendor/select2/js/select2.full.min.js"></script>
    <script src="assets/js/plugins-init/select2-init.js"></script>
@endpush
