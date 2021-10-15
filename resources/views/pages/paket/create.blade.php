@extends('layouts.master')
@section('title','Tambah Paket')

@section('content')
    <div class="col-lg-12">
        <div class="card d-flex justify-content-center">
            <div class="card-header">
                <h2>Tambah Paket Bansos</h2>
                <!-- <a class="btn btn-sm btn-success mt-2" href="" >Tambah Produk</a> -->
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('paket-bansos.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method("POST")
                    <div class="form-group col-lg-6">
                        <label for="name">Nama Paket</label>
                        <input name="nama_paket" type="text" class="form-control" id="name"  placeholder="Masukan nama paket bansos">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="name">Deskripsi Paket</label>
                        <textarea name="deskripsi" class="form-control" id="name"  placeholder="Deskripsi Paket" ></textarea>
                    </div>
                    <div class="table-responsive">
                         <table class="table table-bordered" id="dynamic_field">
                                    <tr>
                                       <td>
                                        <select class="form-control" name="produk_id[]" required>
                                            <option value="" >-- Pilih --</option>
                                            @foreach ($produk as $produk)
                                                <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="text" name="qty[]" class="form-control" placeholder="Masukan Qty" required></td>
                                        <td><button type="button" name="add_berkas" id="add_berkas" class="btn btn-success">Add</button></td>
                                    </tr>
                        </table>

                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Simpan Paket</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    var i = 1;
    $('#add_berkas').click(function() {
        i++;
        $('#dynamic_field').append('<tr id="row' + i +
            '"><td><select class="form-control" name="produk_id[]" required><option value="">-- Pilih --</option>@foreach($produk2 as $produk)<option value="{{$produk->id }}">{{ $produk->nama }}</option>@endforeach</select></td><td><input type="text" name="qty[]" class="form-control" placeholder="Masukan Qty" required></td><td><button type="button" name="remove" id="' +
            i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });

});
</script>
@endpush
