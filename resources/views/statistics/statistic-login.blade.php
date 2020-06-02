@extends('layouts.admin')

@section('title', 'Thống kê đăng nhập')

@section('content')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Thống kê đăng nhập</h3></div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                <li class="breadcrumb-item active">Thống đăng nhập</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <form class="form-valide" action="#" method="post">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Chọn thời gian thống kê</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Chọn Công ty</label>
                                        <select class="form-control" id="statistic-company"
                                                name="statistic-company">
                                            <option value="">Chọn công ty</option>
                                            <option value="1">Công ty Hitech</option>
                                            <option value="2">Công ty số 2</option>
                                            <option value="3">Công ty số 3</option>
                                            <option value="4">Công ty số 4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Tên người dùng</label>
                                        <input type="text" class="form-control"
                                                id="statistic-login-name" name="statistic-login-name"
                                                placeholder="Tên người dùng">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Tên bãi gửi</label>
                                        <input type="text" class="form-control"
                                                id="statistic-login-parking" name="statistic-login-parking"
                                                placeholder="Nhập tên bãi">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Địa chỉ Mac</label>
                                        <input type="text" class="form-control"
                                                id="statistic-login-device" name="statistic-login-device"
                                                placeholder="Nhập địa chỉ Mac">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Thời gian bắt đầu đầu</label>
                                        <input type="datetime-local" class="form-control"
                                                id="statistic-login-time-start" name="statistic-login-time-start"
                                                placeholder="ngày/tháng/năm giờ:phút:giây">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Thời gian kết thúc</label>
                                        <input type="datetime-local" class="form-control"
                                                id="statistic-login-time-end" name="statistic-login-time-end"
                                                placeholder="ngày/tháng/năm giờ:phút:giây">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">Thống kê</label><br>
                                        <button type="submit" class="btn btn-warning btn-rounded m-b-10 m-l-5">
                                            <i class="fa fa-search"></i> Tìm kiếm
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bảng thống kê xe gửi</h4>
                        <h6 class="card-subtitle">Xuất dữ liệu với Copy, CSV, Excel, PDF & In</h6>
                        <div class="table-responsive m-t-40">
                            <table id="example23"
                                    class="display nowrap table table-hover table-striped table-bordered"
                                    cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Họ và tên</th>
                                    <th>Thiết bị</th>
                                    <th>Bãi</th>
                                    <th>Thời gian đăng nhập</th>
                                    <th>Thời gian đăng xuất</th>
                                    <th>Trạng thái</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Họ và tên</th>
                                    <th>Thiết bị</th>
                                    <th>Bãi</th>
                                    <th>Thời gian đăng nhập</th>
                                    <th>Thời gian đăng xuất</th>
                                    <th>Trạng thái</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Trần Nguyên Nghĩa</td>
                                    <td>E8:50:8B:3E:AE:10</td>
                                    <td>Bãi gửi số 1</td>
                                    <td>2018-06-22 04:04:38</td>
                                    <td>0000-00-00 00:00:00</td>
                                    <td><span class="badge badge-success">Đang hoạt động</span></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Phan Thanh Hùng</td>
                                    <td>E8:50:8B:3E:AE:10</td>
                                    <td>Bãi gửi số 1</td>
                                    <td>2018-06-22 04:04:38</td>
                                    <td>2018-06-22 06:04:38</td>
                                    <td><span class="badge badge-warning">Đã đang xuất</span></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Hà Văn Chương</td>
                                    <td>E8:50:8B:3E:AE:10</td>
                                    <td>Bãi gửi số 2</td>
                                    <td>2018-06-22 04:04:38</td>
                                    <td>0000-00-00 00:00:00</td>
                                    <td><span class="badge badge-success">Đang hoạt động</span></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Lưu Thế Anh</td>
                                    <td>E8:50:8B:3E:AE:10</td>
                                    <td>Bãi gửi số 2</td>
                                    <td>2018-06-22 04:04:38</td>
                                    <td>2018-06-22 06:04:38</td>
                                    <td><span class="badge badge-warning">Đã đang xuất</span></td>
                                </tr>

                                </tbody>
                            </table>
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
