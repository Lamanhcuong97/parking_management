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
        <form class="form-valide" action="{{ route('statisticVehicle')}}" method="get">
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
                                        <select class="form-control" id="search_company_id"
                                                name="search_company_id">
                                            <option value="" selected disabled>Chọn công ty</option>
                                            @if(count($companies) != 0)
                                                @foreach($companies as $company)
                                                    <option value="{{  $company->Com_ID }}" {{ old('search_company_id') == $company->Com_ID ? 'selected' : '' }}>{{  $company->Com_Name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                               @endif
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Thời gian bắt đầu đầu</label>
                                        <input type="datetime-local" class="form-control"
                                                id="statistic-vehicle-time-start" name="search_time_start"
                                                value="{{ old('search_time_start')}}"
                                                placeholder="ngày/tháng/năm giờ:phút:giây">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Thời gian kết thúc</label>
                                        <input type="datetime-local" class="form-control"
                                                id="statistic-vehicle-time-end" name="search_time_end"
                                                value="{{ old('search_time_end')}}"
                                                placeholder="ngày/tháng/năm giờ:phút:giây">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-warning btn-rounded m-b-10 m-l-5">
                                            <i class="fa fa-search"></i> Tìm kiếm
                                        </button>
                                        <a 
                                            class="btn btn-default btn-refresh btn-rounded m-b-10 m-l-5"
                                            href="{{ route('statisticVehicle') }}"
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
                                        <th>#</th>
                                        <th>Tên bãi</th>
                                        <th>Loại xe</th>
                                        <th>Lượt xe</th>
                                        <th>%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($data))
                                    @php 
                                    $i = 1;
                                    @endphp
                                        @foreach($data as $item)
                                        <tr>
                                            <tr>
                                                <td rowspan="5">{{ $i++ }}</td>
                                                <td rowspan="5">{{ $item->Parking_Area_Name ?? '' }}</td>
                                            </tr>
                                            @foreach($item->statistics as $statistic)
                                            <tr>
                                                <td>{{ $statistic->Type_Vehicle_Name ?? '' }}</td>
                                                <td>{{ $statistic->total ?? '' }}</td>
                                                <td>{{ round(($statistic->total/ $item->total)*100, 3) }}</td>
                                            </tr>
                                            @endforeach
                                            <tr class="title-table">
                                                <td>Tổng</td>
                                                <td>{{ $item->total ?? '0' }}</td>
                                                <td>100</td>
                                            </tr>
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
@endsection
