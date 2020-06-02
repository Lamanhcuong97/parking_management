@extends('layouts.admin')

@section('title', 'Thống kê xe')

@section('content')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Thống kê xe</h3></div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                <li class="breadcrumb-item active">Thống kê xe</li>
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
                                <div class="col-md-2">
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
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">Chọn bãi gửi</label>
                                        <select class="form-control" id="statistic-parking-area"
                                                name="statistic-parking-area">
                                            <option value="">Chọn Bãi</option>
                                            <option value="1">Bãi gửi số 1</option>
                                            <option value="2">Bãi gửi số 2</option>
                                            <option value="3">Bãi gửi số 3</option>
                                            <option value="4">Bãi gửi số 4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Thời gian bắt đầu đầu</label>
                                        <input type="datetime-local" class="form-control"
                                                id="statistic-vehicle-time-start" name="statistic-vehicle-time-start"
                                                placeholder="ngày/tháng/năm giờ:phút:giây">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Thời gian kết thúc</label>
                                        <input type="datetime-local" class="form-control"
                                                id="statistic-vehicle-time-end" name="statistic-vehicle-time-end"
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
                                    <th>Loại Xe</th>
                                    <th>Biển số</th>
                                    <th>Thời gian vào</th>
                                    <th>Thời gian ra</th>
                                    <th>Mã vé</th>
                                    <th>Phí gửi</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Loại Xe</th>
                                    <th>Biển số</th>
                                    <th>Thời gian vào</th>
                                    <th>Thời gian ra</th>
                                    <th>Mã vé</th>
                                    <th>Phí gửi</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Xe máy</td>
                                    <td>17B135166</td>
                                    <td>2018-06-22 04:04:38</td>
                                    <td>2018-06-22 06:04:38</td>
                                    <td>202cb962ac59075b964b07152d234b70</td>
                                    <td>30.000</td>
                                    <td><span class="badge badge-success">Trong bãi</span></td>
                                    <td>
                                        <button type="submit" class="btn btn-warning">Chi tiết</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Xe ô tô</td>
                                    <td>30A132655</td>
                                    <td>2018-06-22 04:04:38</td>
                                    <td>2018-06-22 22:04:38</td>
                                    <td>202cb962ac59075b964b07152d234b70</td>
                                    <td>30.000</td>
                                    <td><span class="badge badge-warning">Rời bãi</span></td>
                                    <td>
                                        <button type="submit" class="btn btn-warning">Chi tiết</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Xe máy</td>
                                    <td>17B135166</td>
                                    <td>2018-06-22 04:04:38</td>
                                    <td>2018-06-22 06:04:38</td>
                                    <td>202cb962ac59075b964b07152d234b70</td>
                                    <td>30.000</td>
                                    <td><span class="badge badge-success">Trong bãi</span></td>
                                    <td>
                                        <button type="submit" class="btn btn-warning">Chi tiết</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Xe đạp</td>
                                    <td>30</td>
                                    <td>2018-06-22 04:04:38</td>
                                    <td>2018-06-22 22:04:38</td>
                                    <td>202cb962ac59075b964b07152d234b70</td>
                                    <td>30.000</td>
                                    <td><span class="badge badge-warning">Rời bãi</span></td>
                                    <td>
                                        <button type="submit" class="btn btn-warning">Chi tiết</button>
                                    </td>
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
