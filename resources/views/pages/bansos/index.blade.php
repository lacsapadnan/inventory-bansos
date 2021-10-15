@extends('layouts.master')
@section('title', 'bansos')

@push('style')
    <link href="assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" >
@endpush

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Penyaluran Bansos</h4>
                <button data-toggle="modal" data-target="#basicModal" type="button" class="btn btn-primary">Tambah data bansos</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display min-w850">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Nama Penerima</th>
                                <th>Kuantitas</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bansos as $index => $bansos)
                                <tr>
                                    <td>{{ $index +1 }}</td>
                                    <td>{{ $bansos->paket->nama_paket }}</td>
                                    <td>{{ $bansos->penerima->nama }}</td>
                                    <td>{{ $bansos->qty }}</td>
                                    <td>{{ $bansos->tanggal }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <form method="POST" action="{{ route('bansos.destroy', $bansos->id) }}">
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
                                <th>Nama Produk</th>
                                <th>Nama Penerima</th>
                                <th>Kuantitas</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal fade" id="basicModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">bansos Produk</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('bansos.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group">
                                        <label for="name">Nama Paket</label>
                                        <select class="form-control" name="paket_id" required="">
                                            <option value="">-- Pilih --</option>
                                            @foreach ($paket as $paket)
                                                <option value="{{ $paket->id }}">{{ $paket->nama_paket }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nama Penerima</label>
                                        <select class="form-control" name="penerima_id" required="">
                                            <option value="">-- Pilih --</option>
                                            @foreach ($penerima as $penerima)
                                                <option value="{{ $penerima->id }}">{{ $penerima->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Kuantitas</label>
                                        <input name="qty" type="number" class="form-control" id="qty" placeholder="Masukan jumlah stok">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Date</label>
                                        <input name="tanggal" type="text" class="form-control" placeholder="Masukan tanggal bansos" id="mdate">
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
    <script src="assets/vendor/moment/moment.min.js"></script>
    <script src="assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/plugins-init/datatables.init.js"></script>
    <script src="assets/vendor/select2/js/select2.full.min.js"></script>
    <script src="assets/js/plugins-init/select2-init.js"></script>
    <script src="assets/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="assets/js/plugins-init/material-date-picker-init.js"></script>
@endpush
