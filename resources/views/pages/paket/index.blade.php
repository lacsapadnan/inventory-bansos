@extends('layouts.master')
@section('title', 'Paket Bansos')

@push('style')
    <link href="assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/vendor/select2/css/select2.min.css">
@endpush

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Paket Bansos</h4>
                <a href="{{ route('paket-bansos.create') }}"><button  type="button" class="btn btn-primary">Tambah Paket</button></a>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display min-w850">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Paket</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paket as $index => $paket)
                                <tr>
                                    <td>{{ $index +1 }}</td>
                                    <td>{{ $paket->nama_paket }}</td>
                                    <td>{{ $paket->deskripsi }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('paket-bansos.show', $paket->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('paket-bansos.edit', $paket->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <form method="POST" action="{{ route('paket-bansos.destroy', $paket->id) }}">
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
                                <th>Nama Paket</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
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
@endpush
