@extends('template')
@section('Title')
    Login
@endsection

@section('Content')
<body class="bg-gradient-primary">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10" style="margin-top: 17px;">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-flex">
                            <div class="flex-grow-1 bg-login-image"><img src="{{url('asset/image3.jpeg')}}" style="width: 550px; Height: 450px"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5" style="margin-top: 75px;margin-bottom: 75px;">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4">Elektronik Home</h4>
                                </div>
                                <form class="user" action="/logcheck" method="POST">
                                    @csrf
                                    <div class="mb-3"><input class="form-control" type="text" name="username" placeholder="Username" style="border-radius: 25px"></div>
                                    <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password" name="password" style="border-radius: 25px"></div>
                                    @error('password')
                                    <span class="invalid-input-mess" style="color: red">{{$message}}</span>
                                    @enderror
                                    <div class="mb-3">
                                        <div class="custom-control custom-checkbox small"></div>
                                    </div><button type="submit" class="btn btn-primary d-block btn-user w-100" style="margin-top: 0; border-radius: 25px">Log In</button>
                                </form>
                                <div class="text-center"></div>
                                <div class="text-center"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bs-init.js?h=e2b0d57f2c4a9b0d13919304f87f79ae"></script>
<script src="assets/js/theme.js?h=79f403485707cf2617c5bc5a2d386bb0"></script>    
@if (Session("blacklisted"))
      <script>
        Swal.fire({
            icon: 'error',
            text: 'Akun anda salah'
        })
      </script>
  @endif
  @if (Session("success"))
  <script>
      Swal.fire({
          icon: 'success',
          title: '{!!Session("success")!!}',
          showConfirmButton: false,
          timer: 1500
      })
  </script>
  @endif
</body>
@endsection
