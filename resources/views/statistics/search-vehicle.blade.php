@extends('layouts.admin')

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
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="search" role="tabpanel">
                                <div class="p-20">

                                    <form class="form-valide" action="#" method="get">
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
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</label>
                                                            <button type="submit" class="btn btn-warning btn-rounded m-b-10 m-l-5">
                                                                <i class="fa fa-search"></i> Tìm kiếm
                                                            </button>
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
                                                            <label class="control-label">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</label>
                                                            <a 
                                                                class="btn btn-default btn-refresh btn-rounded m-b-10 m-l-5"
                                                                href="{{ route('statisticLogin') }}"
                                                            >
                                                                <i class="fa fa-eraser"></i> Làm mới
                                                            </a>
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
                                                        <th>#</th>
                                                        <th>Loại xe</th>
                                                        <th>Biển số</th>
                                                        <th>Thời gian vào</th>
                                                        <th>Thời gian ra</th>
                                                        <th>Trạng thái</th>
                                                        <th>Hành động</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Ô tô</td>
                                                        <td>Biển số</td>
                                                        <td>Thời gian vào</td>
                                                        <td>Thời gian ra</td>
                                                        <td><span class="badge badge-warning">Rời bãi</span></td>
                                                        <td class="table-action">
                                                            <a type="submit" data-toggle="detail" title="Chi tiết!"   href="{{ route('detailVehicle', ['id'])}}" class="btn btn-warning">
                                                                <i class="fa fa-asterisk" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
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

@section('script')

<script src={{ asset("/js/lib/morris-chart/raphael-min.js") }}></script>
<script src={{ asset("/js/lib/morris-chart/morris.js") }}></script>
<script src={{ asset("/js/chart-init/statistic-revenue.js") }}></script>


<script src={{ asset("/js/lib/datatables/datatables.min.js") }}></script>
<script src={{ asset("/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js") }}></script>
<script src={{ asset("/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js") }}></script>
<script src={{ asset("/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js") }}></script>
<script src={{ asset("/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js") }}></script>
<script src={{ asset("/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js") }}></script>
<script src={{ asset("/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js") }}></script>
<script src={{ asset("/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js") }}></script>
<script src={{ asset("/js/lib/datatables/datatables-init.js") }}></script>
<script>
  $(document).ready(function(){
      $('[data-toggle="detail"]').tooltip(); 
  });
</script>
@endsection
