@extends('layouts.master')
@section('title', 'Detail Penyaluran Bansos')

@push('style')
    <link href="assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/vendor/select2/css/select2.min.css">
@endpush

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail Penyaluran Bansos</h4>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="vertical-align: top;">Nama Penerima</th>
                                <th style="vertical-align: top;">{{$penyaluran->penerima->nama}}</th>
                            </tr>
                            <tr>
                                <th style="vertical-align: top;">Alamat Penerima</th>
                                <th style="vertical-align: top;">{{$penyaluran->penerima->alamat}}</th>
                            </tr>
                            <tr>
                                <th style="vertical-align: top;">No. Telp Penerima</th>
                                <th style="vertical-align: top;">{{$penyaluran->penerima->telp}}</th>
                            </tr>
                            <tr>
                                <th style="vertical-align: top;">Isi Paket</th>
                                <th>
                                    <table id="example" class="table table-bordered">
                                        @foreach ($detail as $row)
                                        <tr>
                                            <td>{{ $row->nama }}</td>
                                            <td>{{ $row->qty }}</td>
                                        </tr>
                                        @endforeach
                                    </table>

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
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
@endpush
