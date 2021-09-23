@extends('template')
@section('Title')
    List Karyawan
@endsection
@section('Content')
<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="padding-right: 0px;background: #171717;">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15" style="margin-right: -11px;"><img src="{{url('asset/Logo.png')}}" style="width: 40px;height: 40px;transform: rotate(15deg);"></div>
                    <div class="sidebar-brand-text mx-3"><span style="font-size: 14px;">Elektronik Home</span></div>
                </a>
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="/owner/indexowner"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="/owner/listkaryawan"><i class="fas fa-user"></i><span>Karyawan</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="/owner/stokbarang"><i class="fas fa-table"></i><span>Stok Barang</span></a></li>
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
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">{{Session::get("active")}}</span><img class="border rounded-circle img-profile" src="{{url('asset/img/avatars/avatar1.jpeg')}}"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">List Karyawan</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col d-xxl-flex justify-content-xxl-end"><button onclick="location.href='/owner/tambahpegawai'" class="btn btn-primary" >Tambah Karyawan</button></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th style="width: 250px;">Nama Karyawan</th>
                                            <th style="width: 155px;">Username</th>
                                            <th style="width: 174px;">Email</th>
                                            <th style="width: 157px;">Nomor Telefon</th>
                                            <th style="width: 93px;">Status</th>
                                            <th style="width: 93px;">Jabatan</th>
                                            <th style="width: 151px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($isi==1)
                                            @foreach ($datakaryawan as $item)
                                            <tr>
                                                <td><img class="rounded-circle me-2" width="30" height="30" src="{{url('asset/img/avatars/avatar1.jpeg')}}">{{$item->nama}}</td>
                                                <td>{{$item->username}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->telephone}}</td>
                                                <td>@if ($item->status==1)
                                                    Aktif
                                                @else
                                                    Tidak Aktif
                                                @endif</td>
                                                <td>{{$item->jabatan}}</td>
                                                <td>@if ($item->status==1)
                                                    <a href="/owner/disabledpegawai/{{$item->id_user}}" class="btn btn-danger">Disabled</a>
                                                @else
                                                    <a href="/owner/aktifpegawai/{{$item->id_user}}" class="btn btn-success">Aktif</a>
                                                @endif</td>
                                            </tr>
                                            @endforeach
                                        @endif
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col text-end"><button class="btn btn-primary" type="button">Check Out</button></div>
                            </div>
                        </div>
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
    <script src="assets/js/bs-init.js?h=e2b0d57f2c4a9b0d13919304f87f79ae"></script>
    <script src="assets/js/theme.js?h=79f403485707cf2617c5bc5a2d386bb0"></script>
</body>
@endsection