@extends('template')
@section('Title')
    Halaman Pegawai
@endsection
@section('Content')
<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="padding-right: 0px;background: #171717;">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15" style="margin-right: -11px;"><img src="{{url('asset/img/Logo.png')}}" style="width: 40px;height: 40px;transform: rotate(15deg);"></div>
                    <div class="sidebar-brand-text mx-3"><span style="font-size: 14px;">Elektronik Home</span></div>
                </a>
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="/pegawai/karyawan"><i class="far fa-money-bill-alt"></i><span>Transaksi</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="/cart"><i class="fa fa-shopping-cart"></i><span>Keranjang</span></a></li>
                    <li class="nav-item"></li>
                </ul>
                <hr class="sidebar-divider my-0">
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">{{Session::get('active')}}</span><img class="border rounded-circle img-profile" src="{{url('asset/img/avatars/avatar1.jpeg')}}"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col d-inline-flex"><input type="search" aria-controls="dataTable" placeholder="Search" class="form-control form-control-sm" style="margin-right: 20px;"><button class="btn btn-primary" type="button">Cari</button></div>
                    </div>
                    <div class="row row-cols-sm-2 row-cols-md-3 row-cols-xxl-4 justify-content-start align-items-start m-auto row-cols-1" style="padding-top: 10px;padding-bottom: 10px;">
                        @if ($isi==1)
                            @foreach ($produkdata as $item)
                            @if ($item->status==1)
                                <div class="col" style="padding-bottom: 10px;padding-top: 10px;">
                                    <div class="card"><img class="img-fluid card-img-top w-100 d-block" src={{url("$item->foto_produk")}} style="height: 200px;">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$item->nama_produk}}</h5>
                                            <div class="input-group"><input class="form-control" type="text"><button class="btn btn-primary" type="button">Tambah</button></div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endforeach
                        @endif
                        
                        
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Elektronik Home 2021</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('asset/js/bs-init.js')}}"></script>
    <script src="{{url('asset/js/theme.js')}}"></script>
</body>
@endsection