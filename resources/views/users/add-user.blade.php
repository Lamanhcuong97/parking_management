@extends('layouts.admin')
@section('title', 'Thêm mới người dùng')
@section('content')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Quản lý người dùng</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                <li class="breadcrumb-item active">Thêm mới người dùng</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('user-management.store')}}" method="post">
                                @csrf
                               
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Tên đăng nhập <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-username" name="user_name" value="{{ old('user_name') }}" placeholder="Nhập vào username..">
                                        @error('user_name')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-password">Mật khẩu <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" id="val-password" name="password" placeholder="Nhập một mật khẩu an toàn..">
                                        @error('password')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-confirm-password">Nhập lại mật khẩu <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" id="val-confirm-password" name="password_confirmation"  placeholder="..và nhập lại lần nữa!">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-fullname">Họ và tên<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" id="val-fullname" name="full_name" rows="5" value="{{ old('full_name') }}" placeholder="Nhập vào họ và tên"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-phone">Sdt <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-phone" name="phone" value="{{ old('phone') }}" placeholder="Nhập vào số điện thoại">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-permission">Quyền người dùng <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-permission" name="role_id">
                                            <option value="" selected disabled>Chọn quyền</option>
                                            @if(count($roles) != 0)
                                                @foreach($roles as $role)
                                                    <option value={{ $role->Role_ID }} {{ old('role_id') == $role->Role_ID ? 'selected' : '' }}>{{ $role->Role_Name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-status">Trạng thái <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-status" name="status">
                                            <option value="" selected disabled>Chọn trạng thái</option>
                                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Hoạt động</option>
                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Ngừng hoạt động</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label"><a data-toggle="modal" data-target="#modal-terms" href="#">Nội quy và điều khoản</a> <span class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                            <input type="checkbox" class="css-control-input" id="val-terms" name="terms" value="1">
                                            <span class="css-control-indicator"></span> Tôi đồng ý
                                            @error('terms')
                                                <div>
                                                    <span class="error" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                </div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Thêm</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
    <!-- footer -->
    <footer id="footer">
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-1">
                        <div class="infoarea">
                            <div class="footer-logo">
                                <a href="#">
                                    <img src="">
                                </a>
                            </div>
                        </div>
                    </div>
                     
                </div>
            </div>
        </div>
        <div class="footer-foot">
            <div class="container-fluid">
                <p> Bản quyền thuộc về Công ty Cổ Phần Pichiche Việt Nam</p>
            </div>
        </div>
    </footer>
    <!-- End footer -->
</div>
@endsection
