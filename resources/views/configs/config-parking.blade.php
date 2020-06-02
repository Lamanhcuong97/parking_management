@extends('layouts.admin')

@section('title', 'Cấu hình bãi gửi')

@section('content')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Cấu hình bãi gửi</h3></div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                <li class="breadcrumb-item active">Cấu hình bãi gửi</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thống kê</h4>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home"
                                                    role="tab"><span class="hidden-sm-up"><i
                                    class="ti-home"></i></span> <span
                                    class="hidden-xs-down">Cấu hình bảo vệ</span></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile"
                                                    role="tab"><span class="hidden-sm-up"><i
                                    class="ti-user"></i></span> <span
                                    class="hidden-xs-down">Cấu hình quản lý bãi</span></a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <div class="p-20">
                                    <div class="row justify-content-center">
                                        <div class="col-6">
                                            <form class="form-valide" action="#" method="post">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-parking">Chọn bãi gửi <span class="text-danger">*</span></label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="val-parking" name="val-parking">
                                                            <option value="0">Chọn bãi gửi</option>
                                                            <option value="1">Bãi số 1</option>
                                                            <option value="2">Bãi sô 2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-user-guard">Chọn bảo vệ <span class="text-danger">*</span></label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="val-user-guard" name="val-user-guard">
                                                            <option value="0">Chọn bảo vệ</option>
                                                            <option value="1">Phan Thanh Hùng</option>
                                                            <option value="2">Lã Mạnh Cường</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-Mac-Addr">Nhập địa chỉ Mac thiết bị<span class="text-danger">*</span></label>
                                                    <div class="col-lg-6">
                                                        <textarea class="form-control" id="val-Mac-Addr" name="val-Mac-Addr" rows="5" placeholder="Nhập địa chỉ Mac"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-status">Trạng thái <span class="text-danger">*</span></label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="val-status" name="val-status">
                                                            <option value="0">Chọn trạng thái</option>
                                                            <option value="1">Hoạt động</option>
                                                            <option value="2">Ngừng hoạt động</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-8 ml-auto">
                                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane  p-20" id="profile" role="tabpanel">
                                <div class="row justify-content-center">
                                    <div class="col-6">
                                        <form class="form-valide" action="#" method="post">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-parking-admin">Chọn bãi gửi <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="val-parking-admin" name="val-parking-admin">
                                                        <option value="0">Chọn bãi gửi</option>
                                                        <option value="1">Bãi số 1</option>
                                                        <option value="2">Bãi sô 2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-user">Chọn quản lý bãi <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="val-user" name="val-user">
                                                        <option value="0">Chọn quản lý</option>
                                                        <option value="1">Phan Thanh Hùng</option>
                                                        <option value="2">Lã Mạnh Cường</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-status">Trạng thái <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="val-status-admin" name="val-status">
                                                        <option value="0">Chọn trạng thái</option>
                                                        <option value="1">Hoạt động</option>
                                                        <option value="2">Ngừng hoạt động</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-8 ml-auto">
                                                    <button type="submit" class="btn btn-primary">Lưu</button>
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
                    <div class="col-md-5">
                        <div class="foot-links">
                            <h4> LIÊN KẾT </h4>
                            <ul>
                                <li><a href="../index.html">Trang chủ</a></li>
                                <li><a href="http://www.hitechviet.com/" target="_blank">Hitech</a></li>
                                <li><a href="#" target="_blank"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-info">
                            <h4> LIÊN HỆ</h4>
                            <ul>
                                <li><i class="fa fa-phone-square"></i> Hotline: (84-4) 934 466 269</li>
                                <li><i class="fa fa-envelope"></i> E-mail: <a class="mail-link" href="mailto:info@hitechviet.com">info@hitechviet.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-foot">
            <div class="container-fluid">
                <p>Bản quyền thuộc về Công ty Cổ Phần Hitech Việt Nam</p>
            </div>
        </div>
    </footer>
    <!-- End footer -->
</div>
@endsection
