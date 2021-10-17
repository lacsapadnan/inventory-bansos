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
                <h4 class="card-title">Stok Bansos RW</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display min-w850">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Paket</th>
                                <th>Nama RW</th>
                                <th>Kuantitas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paketrw as $index => $bansos)
                                <tr>
                                    <td>{{ $index +1 }}</td>
                                    <td>{{ $bansos->paket->nama_paket }}</td>
                                    <td>{{ $bansos->penerima->name }}</td>
                                    <td>{{ $bansos->stok }}</td>
                                 </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <th>No</th>
                            <th>Nama Paket</th>
                            <th>Nama RW</th>
                            <th>Kuantitas</th>
                        </tfoot>
                    </table>
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
