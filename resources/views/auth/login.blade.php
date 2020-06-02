@extends('layouts.app')

@section('content')
<div class="unix-login">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="login-content card">
                    <h1>Đăng nhập</h1>
                    <div class="login-form">
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group">
                                <label>Tên đăng nhập</label>
                                <input id="user_id" type="text" class="form-control @error('User_Name') is-invalid @enderror" name="User_Name" value="{{ old('User_Name') }}" required autocomplete="email" autofocus>

                                @error('User_Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="checkbox">
                                <label>
                                        <input type="checkbox"  id="remember" {{ old('remember') ? 'checked' : '' }}> Ghi nhớ đăng nhập
                                    </label>
                                <label class="pull-right">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">
                                            Quên mật khẩu?
                                        </a>
                                    @endif
                                </label>

                            </div>
                            <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30 m-t-15">Đăng nhập</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
