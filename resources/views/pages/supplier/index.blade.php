@extends('layouts.master')
@section('title','Supplier')

@push('style')
    <link href="assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Suppliers</h4>
                <button data-toggle="modal" data-target="#basicModal" type="button" class="btn btn-primary">Tambah Supplier</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display min-w850">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>No. Tlp</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($supplier as $index => $supplier)
                                <tr>
                                    <td>{{ $index +1 }}</td>
                                    <td>{{ $supplier->nama }}</td>
                                    <td>{{ $supplier->alamat }}</td>
                                    <td>{{ $supplier->email }}</td>
                                    <td>{{ $supplier->telp }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <form method="POST" action="{{ route('supplier.destroy', $supplier->id) }}">
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
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>No. Tlp</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal fade" id="basicModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Supplier</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('supplier.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input name="nama" type="text" class="form-control" id="nama" placeholder="Masukan nama supplier">
                                    </div>
                                    <div class="form-row mt-4">
                                        <div class="form-group col-sm-6">
                                            <label for="name">Email</label>
                                            <input name="email" type="text" class="form-control" id="email" placeholder="Masukan email supplier">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="name">No. Tlp</label>
                                            <input name="telp" type="number" class="form-control" id="telp" placeholder="Masukan no. telp supplier">
                                        </div>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="name">Alamat</label>
                                        <textarea name="alamat" class="form-control" rows="4" id="alamat" placeholder="Masukan alamat suplier"></textarea>
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
@endpush
