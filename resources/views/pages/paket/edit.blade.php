@extends('layouts.master')
@section('title','Tambah Paket')

@section('content')
    <div class="col-lg-12">
        <div class="card d-flex justify-content-center">
            <div class="card-header">
                <h2>Edit Paket Bansos</h2>
                <!-- <a class="btn btn-sm btn-success mt-2" href="#" >Tambah Produk</a> -->
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('paket-bansos.update', $data->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="form-group col-lg-6">
                        <label for="name">Nama Paket</label>
                         <input name="kode_a" type="hidden" class="form-control" id="kode_a" value="{{ $data->id }}"  placeholder="Masukan nama paket bansos">
                        <input name="nama_paket" type="text" class="form-control" id="name" value="{{ $data->nama_paket }}"  placeholder="Masukan nama paket bansos">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="name">Deskripsi Paket</label>
                        <textarea name="deskripsi" class="form-control" id="name"  placeholder="Deskripsi Paket" >{{ $data->deskripsi }}</textarea>
                    </div>

                    <div class="table-responsive">
                        <label for="name">Detail Paket</label>
                        <table class="table table-bordered table-sm" id="mydata">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>QTY</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="show_data">
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                         <table class="table table-bordered" id="dynamic_field">
                                    <tr>
                                        <input type="hidden" name="id_paket[]" class="form-control" value="{{$data->id}}">
                                       <td>
                                        <select class="form-control" name="produk_id[]">
                                            <option value="" >-- Pilih --</option>
                                            @foreach ($produk as $produk)
                                                <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="text" name="qty[]" class="form-control" placeholder="Masukan Qty"></td>
                                        <td><button type="button" name="add_berkas" id="add_berkas" class="btn btn-success">Add</button></td>
                                    </tr>
                        </table>

                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Simpan Paket</button>
                </form>
            </div>
        </div>
    </div>

            <!--MODAL HAPUS-->
            <div class="modal fade" id="ModalHapus">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Hapus Data Detail</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-hidden="true"></button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="kode" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus data ini?</p></div>

                  </div>
                  <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                    <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                  </div>
                </div>
              </div>
            </div>

        <!--END MODAL HAPUS-->


@endsection

@push('scripts')
<script>
$(document).ready(function() {

    tampil_data();
        function tampil_data(){
            var kode=$('#kode_a').val();
            $.ajax({
                type  : 'GET',
                url   : '{{ route('showDetail') }}',
                async : true,
                dataType : 'json',
                data : {kode: kode},
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].nama+'</td>'+
                                '<td>'+data[i].qty+'</td>'+
                                '<td>'+
                                    '<a href="javascript:;" class="btn btn-danger btn-xs data_hapus" data="'+data[i].id_detail_paket+'"><i class="fa fa-trash"></i></a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }

            });
        }

        //GET HAPUS
        $('#show_data').on('click','.data_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });

        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
            type : "GET",
            url  : "{{ route('DeleteDetail') }}",
            dataType : "JSON",
            data : {kode: kode},
                    success: function(data){
                            $('#ModalHapus > div > div > div.modal-header > button').click();
                            tampil_data();
                    }
                });
                return false;
            });



});

$(document).ready(function() {
    var i = 1;
    $('#add_berkas').click(function() {
        i++;
        $('#dynamic_field').append('<tr id="row' + i +
            '"><input type="hidden" name="id_paket[]" class="form-control" value="{{$data->id}}"><td><select class="form-control" name="produk_id[]" required><option value="">-- Pilih --</option>@foreach($produk2 as $produk)<option value="{{$produk->id }}">{{ $produk->nama }}</option>@endforeach</select></td><td><input type="text" name="qty[]" class="form-control" placeholder="Masukan Qty" required></td><td><button type="button" name="remove" id="' +
            i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });

});


</script>

@endpush
