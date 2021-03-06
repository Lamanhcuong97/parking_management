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
        <form class="form-valide" action="#" method="get">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Chọn thời gian thống kê</h4>
                            <div class="row">
                                @if(!is_null($user) && $user->Role_ID == 'RLM0000001')
                                <div class="col-md-3">
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
                                @endif
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Tên người dùng</label>
                                        <input type="text" class="form-control"
                                                id="statistic-login-name" name="search_user_name"
                                                value="{{ old('search_user_name')}}"
                                                placeholder="Tên người dùng">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Tên bãi gửi</label>
                                        <input type="text" class="form-control"
                                                id="statistic-login-parking" 
                                                value="{{ old('search_parking_name')}}"
                                                name="search_parking_name"
                                                placeholder="Nhập tên bãi" >
                                    </div>
                                </div>
                                @if(!is_null($user) && $user->Role_ID != 'RLM0000001')
                               
                                @endif
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
                                        <label class="control-label">Thời gian bắt đầu đầu</label>
                                        <input type="datetime-local" class="form-control"
                                                id="statistic-login-time-start" name="search_time_start"
                                                value="{{ old('search_time_start')}}"
                                                placeholder="ngày/tháng/năm giờ:phút:giây">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Thời gian kết thúc</label>
                                        <input type="datetime-local" class="form-control"
                                                id="statistic-login-time-end" name="search_time_end"
                                                value="{{ old('search_time_end')}}"
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
                                <tbody>
                                    @if(count($log_logins) != 0)
                                        @php 
                                        $i = 1;
                                        @endphp
                                        @foreach($log_logins as $log_login)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $log_login->user->User_Name ?? '' }}</td>
                                                <td>{{ $log_login->Mac_Addr ?? '' }}</td>
                                                <td>{{ $log_login->parking->Parking_Area_Name }}</td>
                                                <td>{{ $log_login->Time_Log_In }}</td>
                                                <td>{{ $log_login->Time_Log_Out }}</td>
                                                <td><span class="badge {{ $time_now > $log_login->Time_Log_Out ? 'badge-danger' : 'badge-success' }}">
                                                    {{ $time_now > $log_login->Time_Log_Out ? 'Đã đăng xuất' : 'Đang hoạt động' }}
                                                </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
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
                     
                </div>
            </div>
        </div>
        <div class="footer-foot">
            <div class="container-fluid">
                <p>  &copy;Bản quyền thuộc về Công ty Cổ Phần Pichiche Việt Nam</p>
            </div>
        </div>
    </footer>
    <!-- End footer -->
</div>
@endsection

@section('script')

<script src={{ asset("/js/lib/datatables/datatables.min.js") }}></script>
<script src={{ asset("/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js") }}></script>
<script src={{ asset("/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js") }}></script>
<script src={{ asset("/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js") }}></script>
<script src={{ asset("/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js") }}></script>
<script src={{ asset("/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js") }}></script>
<script src={{ asset("/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js") }}></script>
<script src={{ asset("/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js") }}></script>
<script src={{ asset("/js/lib/datatables/datatables-init.js") }}></script>
@endsection
