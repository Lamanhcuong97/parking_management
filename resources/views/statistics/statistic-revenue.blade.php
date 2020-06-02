@extends('layouts.admin')

@section('title', 'Thống kê doanh thu')

@section('content')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Thống kê doanh thu</h3></div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                <li class="breadcrumb-item active">Thống kê doanh thu</li>
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
                                    class="hidden-xs-down">Thống kê theo ngày</span></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile"
                                                    role="tab"><span class="hidden-sm-up"><i
                                    class="ti-user"></i></span> <span
                                    class="hidden-xs-down">Thống kê theo tháng</span></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#messages"
                                                    role="tab"><span class="hidden-sm-up"><i
                                    class="ti-email"></i></span> <span
                                    class="hidden-xs-down">Thống kê theo năm</span></a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <div class="p-20">
                                    <div class="row">
                                        <div class="col-6">
                                            <form class="form-valide" action="#" method="post">
                                                <div class="form-group">
                                                    <label class="control-label">Chọn ngày</label>
                                                    <input type="date" class="form-control"
                                                            id="statistic-revenue-day" name="statistic-revenue-day"
                                                            placeholder="ngày/tháng/năm">
                                                </div>
                                            </form>
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
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h4 class="card-title">Số lượng loại xe</h4>
                                            <div id="day-chart"></div>
                                        </div>
                                        <div class="col-lg-6">
                                            <h4>Thống kê chi tiết</h4>
                                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>Loại xe</th>
                                                    <th>Trong Bãi</th>
                                                    <th>Đã ra</th>
                                                    <th>Doanh thu</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Xe ô tô</td>
                                                    <td>123</td>
                                                    <td>456</td>
                                                    <td>300.000 vnd</td>
                                                </tr>
                                                <tr>
                                                    <td>Xe máy</td>
                                                    <td>123</td>
                                                    <td>456</td>
                                                    <td>200.000 vnd</td>
                                                </tr>
                                                <tr>
                                                    <td>Xe đạp</td>
                                                    <td>123</td>
                                                    <td>456</td>
                                                    <td>100.000 vnd</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" ><b>Tổng doanh thu</b></td>
                                                    <td>600.000 vnd</td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane  p-20" id="profile" role="tabpanel">
                                <div class="row">
                                    <div class="col-6">
                                        <form class="form-valide" action="#" method="post">
                                            <div class="form-group">
                                                <label class="control-label">Chọn tháng</label>
                                                <input type="month" class="form-control"
                                                        id="statistic-revenue-month" name="statistic-revenue-month"
                                                        placeholder="tháng/năm">
                                            </div>
                                        </form>
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
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h4 class="card-title">Số lượng loại xe</h4>
                                        <div id="month-chart"></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4>Thống kê chi tiết</h4>
                                        <table id="example25" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Loại xe</th>
                                                <th>Trong Bãi</th>
                                                <th>Đã ra</th>
                                                <th>Doanh thu</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Xe ô tô</td>
                                                <td>123</td>
                                                <td>456</td>
                                                <td>300.000 vnd</td>
                                            </tr>
                                            <tr>
                                                <td>Xe máy</td>
                                                <td>123</td>
                                                <td>456</td>
                                                <td>200.000 vnd</td>
                                            </tr>
                                            <tr>
                                                <td>Xe đạp</td>
                                                <td>123</td>
                                                <td>456</td>
                                                <td>100.000 vnd</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" ><b>Tổng doanh thu</b></td>
                                                <td>600.000 vnd</td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane p-20" id="messages" role="tabpanel">
                                <div class="row">
                                    <div class="col-6">
                                        <form class="form-valide" action="#" method="post">
                                            <div class="form-group">
                                                <label class="control-label">Chọn năm</label>
                                                <input type="year" class="form-control"
                                                        id="statistic-revenue-year" name="statistic-revenue-year"
                                                        placeholder="năm">
                                            </div>
                                        </form>
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
                                <h4>Rồi sẽ có cái gì đó ở đây</h4>
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
