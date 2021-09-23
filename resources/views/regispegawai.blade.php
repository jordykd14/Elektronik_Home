@extends('template')
@section('Title')
    Regis Pegawai
@endsection
@section('Content')
<body class="bg-gradient-primary">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image" style="background-image: url({{url('asset/image2.jpeg')}});"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Tambah Karyawan</h4>
                            </div>
                            <form class="user" action="/owner/registercheck" method="POST">
                                @csrf
                                <div class="mb-3"><input class="form-control form-control-user" type="text" placeholder="Full Name" name="nama" required></div>
                                <div class="mb-3"><input class="form-control form-control-user" type="text" aria-describedby="emailHelp" placeholder="Username" name="username" required></div>
                                <div class="mb-3"><input class="form-control form-control-user" type="email" aria-describedby="emailHelp" placeholder="Email Address" name="email" required></div>
                                <div class="mb-3"><input class="form-control form-control-user" type="text" aria-describedby="emailHelp" placeholder="Alamat" name="alamat" required></div>
                                <div class="mb-3"><input class="form-control form-control-user" type="text" aria-describedby="emailHelp" placeholder="Phone Number" name="nomor_hp" required></div>
                                <div class="mb-3"><select name="jabatan" id="" class="form-control form-control-sm mb-3" style="border-radius: 25px; height: 50px">
                                    <option value="pegawai">Pegawai</option>
                                    <option value="admin">Admin</option>
                                    <option value="owner">Owner</option>    
                                </select></div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="password" placeholder="Password" name="password" required></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="password" placeholder="Repeat Password" name="password_repeat" required></div>
                                </div>
                                @error('password_repeat')
                                    <span class="invalid-input-mess" style="color: red">{{$message}}</span>
                                @enderror
                                <button class="btn btn-primary d-block btn-user w-100" type="submit">Register Account</button>
                                &nbsp
                            </form>
                            <button onclick="location.href='/owner/listkaryawan'" class="btn btn-danger d-block btn-user w-100 " style="border-radius: 25px" >Back</button>
                            
                            <div class="text-center"></div>
                            <div class="text-center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bs-init.js?h=e2b0d57f2c4a9b0d13919304f87f79ae"></script>
    <script src="assets/js/theme.js?h=79f403485707cf2617c5bc5a2d386bb0"></script>
</body>
@endsection