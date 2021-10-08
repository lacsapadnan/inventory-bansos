@extends('layouts.master')
@section('title','Dashboard')

@section('content')
    <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-primary">
                <div class="card-body p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="flaticon-381-user-7"></i>
                        </span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">RW</p>
                            <h3 class="text-white">{{ number_format($rw) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-primary">
                <div class="card-body p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="flaticon-381-user-7"></i>
                        </span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Staff Kelurahan</p>
                            <h3 class="text-white">{{ number_format($kelurahan) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-success">
                <div class="card-body p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="flaticon-381-box"></i>
                        </span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Produk</p>
                            <h3 class="text-white">{{ number_format($produk) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-warning">
                <div class="card-body p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="flaticon-381-user-7"></i>
                        </span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Penerima verifikasi</p>
                            <h3 class="text-white">{{ number_format($verifikasi) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-success">
                <div class="card-body p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="flaticon-381-user-7"></i>
                        </span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Penerima disetujui</p>
                            <h3 class="text-white">{{ number_format($disetujui) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-danger">
                <div class="card-body p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="flaticon-381-user-7"></i>
                        </span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Penerima ditolak</p>
                            <h3 class="text-white">{{ number_format($ditolak) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
