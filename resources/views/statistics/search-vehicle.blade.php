@extends('layouts.app')

@section('title', 'Tìm kiếm xe')

@section('content')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Tìm kiếm xe</h3></div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                <li class="breadcrumb-item active">Tìm kiếm xe</li>
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
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#search"
                                                    role="tab"><span class="hidden-sm-up"><i
                                    class="ti-home"></i></span> <span class="hidden-xs-down">Tìm kiếm xe</span></a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#detail"
                                                    role="tab"><span class="hidden-sm-up"><i
                                    class="ti-user"></i></span> <span class="hidden-xs-down">Chi tiết</span></a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="search" role="tabpanel">
                                <div class="p-20">

                                    <form class="form-valide" action="#" method="post">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Tìm kiếm</h4>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Chọn Công ty</label>
                                                            <select class="form-control" id="search-vehicle-company"
                                                                    name="search-vehicle-company">
                                                                <option value="">Chọn công ty</option>
                                                                <option value="1">Công ty Hitech</option>
                                                                <option value="2">Công ty số 2</option>
                                                                <option value="3">Công ty số 3</option>
                                                                <option value="4">Công ty số 4</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Chọn bãi gửi</label>
                                                            <select class="form-control" id="search-vehicle-parking"
                                                                    name="search-vehicle-parking">
                                                                <option value="">Chọn bãi gửi</option>
                                                                <option value="1">Bãi gửi HV</option>
                                                                <option value="2">Bãi gửi số 2</option>
                                                                <option value="3">Bãi gửi số 3</option>
                                                                <option value="4">Bãi gửi số 4</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Chọn loại xe</label>
                                                            <select class="form-control"
                                                                    id="search-vehicle-type-vehicle"
                                                                    name="search-vehicle-type-vehicle">
                                                                <option value="">Chọn loại xe</option>
                                                                <option value="1">Xe ô tô</option>
                                                                <option value="2">Xe máy</option>
                                                                <option value="3">Xe đạp</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Biển số</label>
                                                            <input type="text" class="form-control"
                                                                    id="search-vehicle-lp"
                                                                    name="search-vehicle-lp"
                                                                    placeholder="Nhập vào biển số">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Trạng thái</label>
                                                            <select class="form-control"
                                                                    id="search-vehicle-status"
                                                                    name="search-vehicle-status">
                                                                <option value="">Chọn trạng thái</option>
                                                                <option value="1">Trong bãi</option>
                                                                <option value="2">Rời bãi</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Thời gian bắt đầu
                                                                đầu</label>
                                                            <input type="datetime-local" class="form-control"
                                                                    id="search-vehicle-time-start"
                                                                    name="search-vehicle-time-start"
                                                                    placeholder="ngày/tháng/năm giờ:phút:giây">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Thời gian kết thúc</label>
                                                            <input type="datetime-local" class="form-control"
                                                                    id="search-vehicle-time-end"
                                                                    name="search-vehicle-time-end"
                                                                    placeholder="ngày/tháng/năm giờ:phút:giây">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Thống kê</label><br>
                                                            <button type="submit"
                                                                    class="btn btn-warning btn-rounded m-b-10 m-l-5">
                                                                <i class="fa fa-search"></i> Tìm kiếm
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Bảng thống kê xe gửi</h4>
                                            <h6 class="card-subtitle">Xuất dữ liệu với Copy, CSV, Excel, PDF &
                                                In</h6>
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
                                                        <td><span class="badge badge-success">Trong bãi</span></td>
                                                        <td>
                                                            <button type="submit" class="btn btn-warning">Chi tiết
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Xe ô tô</td>
                                                        <td>30A132655</td>
                                                        <td>2018-06-22 04:04:38</td>
                                                        <td>2018-06-22 22:04:38</td>
                                                        <td>202cb962ac59075b964b07152d234b70</td>
                                                        <td><span class="badge badge-warning">Rời bãi</span></td>
                                                        <td>
                                                            <button type="submit" class="btn btn-warning">Chi tiết
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Xe máy</td>
                                                        <td>17B135166</td>
                                                        <td>2018-06-22 04:04:38</td>
                                                        <td>2018-06-22 06:04:38</td>
                                                        <td>202cb962ac59075b964b07152d234b70</td>
                                                        <td><span class="badge badge-success">Trong bãi</span></td>
                                                        <td>
                                                            <button type="submit" class="btn btn-warning">Chi tiết
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Xe đạp</td>
                                                        <td>30</td>
                                                        <td>2018-06-22 04:04:38</td>
                                                        <td>2018-06-22 22:04:38</td>
                                                        <td>202cb962ac59075b964b07152d234b70</td>
                                                        <td><span class="badge badge-warning">Rời bãi</span></td>
                                                        <td>
                                                            <button type="submit" class="btn btn-warning">Chi tiết
                                                            </button>
                                                        </td>
                                                    </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane  p-20" id="detail" role="tabpanel">
                                <div class="p-20">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Thông tin chi tiết</h4>
                                            <div class="row">
                                                <div class="col-md-4 col-xs-4 b-r"><strong>Loại xe</strong>
                                                    <br>
                                                    <p class="text-muted">Xe ô tô</p>
                                                </div>
                                                <div class="col-md-4 col-xs-4 b-r"><strong>Biển số</strong>
                                                    <br>
                                                    <p class="text-muted">16B232354</p>
                                                </div>
                                                <div class="col-md-4 col-xs-4 b-r"><strong>Mã vé</strong>
                                                    <br>
                                                    <p class="text-muted">
                                                        21e1a0b875fdb800db36d23c4f424e75</p>
                                                </div>

                                                <div class="col-md-4 col-xs-4 b-r"><strong>Thời gian
                                                    vào</strong>
                                                    <br>
                                                    <p class="text-muted">2018-05-10 07:10:00</p>
                                                </div>
                                                <div class="col-md-4 col-xs-4 b-r"><strong>Thời gian
                                                    ra</strong>
                                                    <br>
                                                    <p class="text-muted">2018-05-10 17:20:00</p>
                                                </div>
                                                <div class="col-md-4 col-xs-4 b-r"><strong>Tình
                                                    trạng</strong>
                                                    <br>
                                                    <p class="text-muted">Trong bãi</p>
                                                </div>

                                                <div class="col-md-4 col-xs-4 b-r"><strong>Bãi gửi</strong>
                                                    <br>
                                                    <p class="text-muted">Bãi gửi HV Hà Đông</p>
                                                </div>
                                                <div class="col-md-4 col-xs-4 b-r"><strong>Bảo Vệ</strong>
                                                    <br>
                                                    <p class="text-muted">Trần Anh Tú</p>
                                                </div>
                                                <div class="col-md-4 col-xs-4 b-r"><strong>Phí gửi</strong>
                                                    <br>
                                                    <p class="text-muted">30.000 vnd</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-8">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Ảnh xe vào</h4>
                                                    <div class="row">
                                                        <div class="col-md-6 col-xs-6 b-r">
                                                            <img style="width: 100%" src="../images/anh1.jpg">
                                                        </div>
                                                        <div class="col-md-6 col-xs-6 b-r">
                                                            <img style="width: 100%" src="../images/anh2.jpg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Ảnh xe ra</h4>
                                                    <div class="row">
                                                        <div class="col-md-12 col-xs-12 b-r">
                                                            <img style="width: 100%" src="../images/anh3.jpg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                <li><i class="fa fa-envelope"></i> E-mail: <a class="mail-link"
                                                                                href="mailto:info@hitechviet.com">info@hitechviet.com</a>
                                </li>
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
