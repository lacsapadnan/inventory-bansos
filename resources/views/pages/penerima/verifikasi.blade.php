@extends('layouts.master')
@section('title', 'Penerima')

@push('style')
    <link href="assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data penerima</h4>
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
                                {{-- <th>Status</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penerima as $index => $penerima)
                                <tr>
                                    <td>{{ $index +1 }}</td>
                                    <td>{{ $penerima->nama }}</td>
                                    <td>{{ $penerima->alamat }}</td>
                                    <td>{{ $penerima->email }}</td>
                                    <td>{{ $penerima->telp }}</td>
                                    {{-- @if ($penerima['status'] == 'verifikasi')
                                        <td><span class="badge badge-warning">Verifikasi</span></td>
                                    @elseif ($penerima['status'] == 'disetujui')
                                        <td><span class="badge badge-success">Disetujui</span></td>
                                    @else
                                        <td><span class="badge badge-danger">Ditolak</span></td>
                                    @endif --}}
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('disetujui', $penerima->id) }}" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-check"></i></a>
                                            <a href="{{ route('ditolak', $penerima->id) }}" class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-ban"></i></a>
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
                                {{-- <th>Status</th> --}}
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
    <script src="assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/plugins-init/datatables.init.js"></script>
@endpush
