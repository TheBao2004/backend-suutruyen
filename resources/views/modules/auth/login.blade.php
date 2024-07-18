
@extends('layouts.admin')


@section('root')

     <!-- Sign In Start -->
     <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <form method="POST" action="{{ route('login') }}" class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a class="">
                            <h3 class="text-primary"><i class="fa fa-book me-2"></i>Admin Suu</h3>
                        </a>
                        <h3>Đăng nhập</h3>
                    </div>

                    @csrf

                    <div class="form-floating mb-3">
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="">
                        <label>Email</label>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" name="password" class="form-control" placeholder="">
                        <label>Mật khẩu</label>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="form-check">
                            <input name="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox" class="form-check-input">
                            <label class="form-check-label">Lưu đăng nhập</label>
                        </div>
                        {{-- <a href="">Forgot Password</a> --}}
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Đăng nhập</button>
                    {{-- <p class="text-center mb-0">Don't have an Account? <a href="">Sign Up</a></p> --}}
                </form>
            </div>
        </div>
    </div>
    <!-- Sign In End -->

@endsection
