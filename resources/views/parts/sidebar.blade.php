<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            @if (Auth::check() && Auth::user()->roles == "kelurahan")
                <li>
                    <a href="{{ route('dashboard') }}" aria-expanded="false">
                        <i class="flaticon-381-networking"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-box"></i>
                        <span class="nav-text">Bansos RW</span>
                    </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('bansos.index') }}">Transaksi Bansos RW</a></li>
                    <li><a href="{{ route('paketrw.index') }}">Stok Bansos RW</a></li>
                </ul>
            </li>

                <li>
                    <a href="{{ route('verifikasi') }}" aria-expanded="false">
                        <i class="flaticon-381-user-3"></i>
                        <span class="nav-text">Verifikasi Penerima</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-box"></i>
                        <span class="nav-text">Data Produk</span>
                    </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('produk.index') }}">Daftar Produk</a></li>
                    <li><a href="{{ route('restok.index') }}">Stok Masuk</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('supplier.index') }}" aria-expanded="false">
                    <i class="flaticon-381-user-2"></i>
                    <span class="nav-text">Data Supplier</span>
                </a>
            </li>
            <li>
                <a href="{{ route('paket-bansos.index') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-box-2"></i>
                    <span class="nav-text">Paket Bansos</span>
                </a>
            </li>
            @elseif (Auth::check())
            <li>
                <a href="{{ route('dashboard') }}" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('PaketBansosRw') }}" aria-expanded="false">
                    <i class="flaticon-381-box"></i>
                    <span class="nav-text">Ketersediaan Paket</span>
                </a>
            </li>
            <li>
                <a href="{{ route('penerima.index') }}" aria-expanded="false">
                    <i class="flaticon-381-user-9"></i>
                    <span class="nav-text">Data Penerima</span>
                </a>
            </li>
            <li>
                <a href="{{ route('penyaluran.index') }}" aria-expanded="false">
                    <i class="flaticon-381-share"></i>
                    <span class="nav-text">Penyaluran Bansos</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>
