<style>
    .navbar {
        box-shadow: 0px 2px 12px -4px rgba(0,0,0,0.75);
        -webkit-box-shadow: 0px 2px 12px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 2px 12px -4px rgba(0,0,0,0.75);
    }
    .dm-account {
        margin-left: -35%;
    }
    @media only screen and (max-width: 991px) {
        .dm-account {
            margin-left: 0px;
        }
    }

</style>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/PWL_UAS_TESTING" style="margin-left: var(--bs-navbar-brand-margin-end)">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-alt" viewBox="0 0 16 16">
                <path d="M1 13.5a.5.5 0 0 0 .5.5h3.797a.5.5 0 0 0 .439-.26L11 3h3.5a.5.5 0 0 0 0-1h-3.797a.5.5 0 0 0-.439.26L5 13H1.5a.5.5 0 0 0-.5.5zm10 0a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5z"/>
            </svg>
            <p style="font-size: 12px; margin: 0px; padding: 0px;">Always</p>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Transaksi
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/PWL_UAS_TESTING/penjualan">Penjualan</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/PWL_UAS_TESTING/pembelian">Pembelian</a></li>
                    </ul>
                    </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Master
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/PWL_UAS_TESTING/karyawan">Karyawan</a></li>
                    <li><a class="dropdown-item" href="/PWL_UAS_TESTING/inventory">Inventory</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="/PWL_UAS_TESTING/supplier">Supplier</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Gudang
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/PWL_UAS_TESTING/gudang">View Gudang</a></li>
                    {{-- <li><a class="dropdown-item" href="/PWL_UAS_TESTING/gudang/add">Add Gudang</a></li> --}}
                </ul>
                </li>
            </ul>
            <form class="d-flex my-auto" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-dark">Search</button>
            </form>
            @if(Auth::check())
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>
                            @if (Auth::user()->img)
                            <img src="{{  asset(Auth::user()->img)  }}" style="height: 35px; width:35px; object-fit:cover; margin-right: 10px; border-radius: 100px;">
                            @else
                            <img src="{{ asset('res/img/account.png') }}" style="height: 35px; width:35px; object-fit:cover; margin-right: 10px; border-radius: 100px;">
                            @endif
                            {!! Auth::user()->name !!}
                        </span>
                    </a>
                    <ul class="dropdown-menu dm-account">
                        <li><a class="dropdown-item" href="/PWL_UAS_TESTING/account">Settings</a></li>
                        <li><a class="dropdown-item" href="/PWL_UAS_TESTING/logout"><span style="width: 100%; display: flex; justify-content: space-between; align-items: center;">Logout<img src="{{ asset('res/img/logout.png') }}" style="height: 25px;" alt=""></span></a></li>
                    </ul>
                </li>
            </ul>
            @else
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span><img src="{{ asset('res/img/account.png') }}" style="height: 35px; margin-right: 10px;">Guest</span>
                    </a>
                    <ul class="dropdown-menu dm-account">
                        <li><a class="dropdown-item" href="/PWL_UAS_TESTING/login">Login</a></li>
                    </ul>
                </li>
            </ul>
            @endif
        </div>
    </div>
</nav>
