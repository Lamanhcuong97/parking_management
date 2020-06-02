@extends('layouts.admin')

@section('title', 'Cấu hình phí gửi')

@section('content')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Cấu hình phí gửi</h3></div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                <li class="breadcrumb-item active">Cấu hình phí</li>
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
                                    class="hidden-xs-down">Tính phí theo giờ</span></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile"
                                                    role="tab"><span class="hidden-sm-up"><i
                                    class="ti-user"></i></span> <span
                                    class="hidden-xs-down">Tính phí theo block</span></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#messages"
                                                    role="tab"><span class="hidden-sm-up"><i
                                    class="ti-email"></i></span> <span
                                    class="hidden-xs-down">Tính phí ngày đêm</span></a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <div class="p-20">
                                    <div class="row justify-content-center">
                                        <div class="col-10">
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
                                                    <label class="col-lg-4 col-form-label" for="val-type-vehicle">Chọn loại xe <span class="text-danger">*</span></label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="val-type-vehicle" name="val-type-vehicle">
                                                            <option value="0">Chọn loại xe</option>
                                                            <option value="1">Xe ô tô</option>
                                                            <option value="2">Xe gắn máy</option>
                                                            <option value="3">Xe đạp</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-fee">Đơn giá (vnd) <span class="text-danger">*</span></label>
                                                    <div class="col-lg-6">
                                                        <textarea class="form-control" id="val-fee" name="val-fee" rows="5" placeholder="Nhập số tiền gửi cho mỗi giờ"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-max-price">Số tiền tối đa qua 24h (vnd)<span class="text-danger">*</span></label>
                                                    <div class="col-lg-6">
                                                        <textarea class="form-control" id="val-max-price" name="val-max-price" rows="5" placeholder="Nhập số tiền tối đa khi qua 24h"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-free-first-time">Thời gian miễn phí ban đầu (phút)<span class="text-danger">*</span></label>
                                                    <div class="col-lg-6">
                                                        <textarea class="form-control" id="val-free-first-time" name="val-free-first-time" rows="5" placeholder="Nhập thời gian miễn phí ban đầu"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-over-time">Thời gian miễn phí khi quá giờ (phút)<span class="text-danger">*</span></label>
                                                    <div class="col-lg-6">
                                                        <textarea class="form-control" id="val-over-time" name="val-over-time" rows="5" placeholder="Nhập thời gian miễn phí khi quá mỗi giờ"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-status">Trạng thái <span class="text-danger">*</span></label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="val-status" name="val-status">
                                                            <option value="0">Chọn trạng thái</option>
                                                            <option value="1">Hoạt động</option>
                                                            <option value="2">Đã hủy</option>
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
                                <div class="row">
                                    <h4>Cấu hình phí theo block</h4>
                                </div>
                            </div>
                            <div class="tab-pane p-20" id="messages" role="tabpanel">
                                <div class="row">
                                    <div class="col-10">
                                        <form class="form-valide" action="#" method="post">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-parking-dan">Chọn bãi gửi <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="val-parking-dan" name="val-parking-dan">
                                                        <option value="0">Chọn bãi gửi</option>
                                                        <option value="1">Bãi số 1</option>
                                                        <option value="2">Bãi sô 2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-type-vehicle-dan">Chọn loại xe <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="val-type-vehicle-dan" name="val-type-vehicle-dan">
                                                        <option value="0">Chọn loại xe</option>
                                                        <option value="1">Xe ô tô</option>
                                                        <option value="2">Xe gắn máy</option>
                                                        <option value="3">Xe đạp</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-time-start-day">Thời gian bắt đầu ca sáng <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input type="time" class="form-control" id="val-time-start-day" name="val-time-start-day" rows="5" value="07:00"></input>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-fee-day">Đơn giá ca sáng(vnd) <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <textarea class="form-control" id="val-fee-day" name="val-fee-day" rows="5" placeholder="Nhập số tiền gửi cho ca sáng"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-time-start-night">Thời gian bắt đầu ca đêm <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input type="time" class="form-control" id="val-time-start-night" name="val-time-start-night" rows="5" value="19:00"></input>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-fee-night">Đơn giá ca đêm(vnd) <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <textarea class="form-control" id="val-fee-night" name="val-fee-night" rows="5" placeholder="Nhập số tiền gửi cho mỗi giờ"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-max-price-dan">Số tiền tối đa qua 24h (vnd)<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <textarea class="form-control" id="val-max-price-dan" name="val-max-price-dan" rows="5" placeholder="Nhập số tiền tối đa khi qua 24h"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-free-first-time-dan">Thời gian miễn phí ban đầu (phút)<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <textarea class="form-control" id="val-free-first-time-dan" name="val-free-first-time-dan" rows="5" placeholder="Nhập thời gian miễn phí ban đầu"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-over-time-dan">Thời gian miễn phí khi quá giờ (phút)<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <textarea class="form-control" id="val-over-time-dan" name="val-over-time-dan" rows="5" placeholder="Nhập thời gian miễn phí khi quá mỗi giờ"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-status">Trạng thái <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="val-status-dan" name="val-status">
                                                        <option value="0">Chọn trạng thái</option>
                                                        <option value="1">Hoạt động</option>
                                                        <option value="2">Đã hủy</option>
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
