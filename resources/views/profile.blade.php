@extends('layouts.admin')

@section('title', 'Thông tin cá nhân')

@section('content')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Thông tin cá nhân</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                <li class="breadcrumb-item active">Thông tin cá nhân</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thông tin</h4>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#info" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Thông tin cá nhân</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#edit" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Chỉnh sửa</span></a> </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="info" role="tabpanel">
                                <div class="p-20 justify-content-center">
                                    <div class="row">
                                        <div class="col-md-4" style="text-align: center;">
                                            <header>
                                                <div class="avatar">
                                                    <img style="width: 200px;" src="{{ asset("/images/users/avatar_profile.png") }}" alt="La Manh Cuong" />
                                                </div>
                                            </header>

                                            <h3>{{ $user->User_Name ?? ''}}</h3>
                                            <div class="desc">
                                                {{ $user->role->Role_Name ?? ''}}
                                            </div>
                                        </div>
                                        <div class="col-md-8" style="margin: 50px 0px;">
                                            <div class="row">
                                                <div class="col-md-6 col-xs-6 b-r"> <strong>Tên đăng nhập</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $user->User_Name ?? ''}}</p>
                                                </div>
                                                <div class="col-md-6 col-xs-6 b-r"> <strong>Số điện thoại</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $user->Phone ?? ''}}</p>
                                                </div>
                                                <div class="col-md-6 col-xs-6 b-r"> <strong>Tên đầy đủ</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $user->Full_Name ?? ''}}</p>
                                                </div>
                                                <div class="col-md-6 col-xs-6"> <strong>Công ty</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $user->company->Com_Name ?? ''}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="edit" role="tabpanel">
                                <div class="p-20">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material">
                                            <div class="form-group">
                                                <label class="col-md-12">Tên đăng nhập</label>
                                                <div class="col-md-12">
                                                    <input type="text" disabled value="{{ $user->User_Name ?? '' }}" name="user_name" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Họ và tên</label>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control form-control-line" value="{{ $user->Full_Name ?? '' }}" name="full_name" id="full_name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Số điện thoại</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="123 456 7890"  value="{{ $user->Phone ?? '' }}" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Cập nhật thông tin</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
