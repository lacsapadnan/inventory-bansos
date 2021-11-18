@extends('layouts.master')
@section('title','User')

@push('style')
    <link href="assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data User</h4>
                <button data-toggle="modal" data-target="#basicModal" type="button" class="btn btn-primary">Tambah User</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display min-w850">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $index => $user)
                                <tr>
                                    <td>{{ $index +1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->roles }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <form method="POST" action="{{ route('user.destroy', $user->id) }}">
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
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal fade" id="basicModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah User</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="form-row mt-4">
                                        <div class="form-group col-sm-6">
                                            <label for="name">Nama</label>
                                            <input name="name" type="text" class="form-control" id="name" placeholder="Masukan nama user">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="name">Email</label>
                                            <input name="email" type="text" class="form-control" id="email" placeholder="Masukan email user">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Password</label>
                                        <input name="password" type="text" class="form-control" id="password" placeholder="Masukan password user">
                                    </div>
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <label class="col-form-label col-sm-3 pt-0">Roles</label>
                                            <div class="col-sm-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="roles" value="kelurahan" checked="">
                                                    <label class="form-check-label">
                                                        Staff Kelurahan
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="roles" value="RW">
                                                    <label class="form-check-label">
                                                        RW
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
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
