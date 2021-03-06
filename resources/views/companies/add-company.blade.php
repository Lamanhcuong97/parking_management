@extends('layouts.admin')

@section('title', 'Thêm mới công ty')

@section('content')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Quản lý công ty</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                <li class="breadcrumb-item active">Thêm mới công ty</li>
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
                            <form class="form-valide" action={{ route('company-management.store') }} method="POST">
                            @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-name-company">Tên công ty <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-name-company" name="company_name" required placeholder="Nhập vào tên công ty">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-address-company">Địa chỉ <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-address-company" required name="company_addr" placeholder="Nhập vào địa chỉ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-phone-company">Số điện thoại <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-phone-company" required name="company_phone" placeholder="Nhập số điện thoại">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email-company">Email<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="email" class="form-control" id="val-email-company" required name="company_email" placeholder="Nhập email công ty"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-status">Trạng thái <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-status" required name="status">
                                            <option value="" selected disabled>Chọn trạng thái</option>
                                            <option value="0">Hoạt động</option>
                                            <option value="1">Ngừng hoạt động</option>
                                        </select>
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
