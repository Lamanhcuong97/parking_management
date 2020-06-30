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
                                                    @if(!is_null($user) && $user->Role_ID == 'RLM0000001')
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Chọn Công ty</label>
                                                            <select class="form-control" id="search-vehicle-company"
                                                                    name="search_company_id">
                                                                <option value="" disabled selected>Chọn công ty</option>
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
                                                            <label class="control-label">Chọn loại xe</label>
                                                            <select class="form-control"
                                                                    id="search-vehicle-type-vehicle"
                                                                    name="search_vehicle_type">
                                                                <option value="" selected disabled>Chọn loại xe</option>
                                                                @if(count($vehicle_types) != 0)
                                                                    @foreach($vehicle_types as $vehicle_type)
                                                                        <option 
                                                                            value="{{ $vehicle_type->Type_Vehicle_ID }}"
                                                                            {{ old('search_vehicle_type') == $vehicle_type->Type_Vehicle_ID ? 'selected' : '' }}
                                                                        >
                                                                            {{ $vehicle_type->Type_Vehicle_Name }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Biển số</label>
                                                            <input type="text" class="form-control"
                                                                    id="search-vehicle-lp"
                                                                    name="search_vehicle_lp"
                                                                    placeholder="Nhập vào biển số"
                                                                    value="{{ old('search_vehicle_lp')}}"
                                                                    >
                                                        </div>
                                                    </div>
                                                    @if(!is_null($user) && $user->Role_ID != 'RLM0000001')
                                                    <div class="col-md-3">
                                                        
                                                    </div>
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
                                                            <label class="control-label">Trạng thái</label>
                                                            <select class="form-control"
                                                                    id="search-vehicle-status"
                                                                    name="search_vehicle_status">
                                                                <option value="" disabled selected>Chọn trạng thái  {{ old('search_vehicle_status') }}</option>
                                                               
                                                                <option value="0" {{ old('search_vehicle_status') == "0" ? 'selected' : ''}}>Trong bãi</option>
                                                                <option value="1" {{ old('search_vehicle_status') == "1" ? 'selected' : ''}}>Rời bãi</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Thời gian bắt đầu
                                                                đầu</label>
                                                            <input type="datetime-local" class="form-control"
                                                                    id="search-vehicle-time-start"
                                                                    name="search_time_start"
                                                                    placeholder="ngày/tháng/năm giờ:phút:giây"
                                                                    value="{{ old('search_time_start') }}"
                                                                    >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Thời gian kết thúc</label>
                                                            <input type="datetime-local" class="form-control"
                                                                    id="search-vehicle-time-end"
                                                                    name="search_time_end"
                                                                    placeholder="ngày/tháng/năm giờ:phút:giây"
                                                                    value="{{ old('search_time_end') }}"
                                                                    >

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</label>
                                                            <a 
                                                                class="btn btn-default btn-refresh btn-rounded m-b-10 m-l-5"
                                                                href="{{ route('searchVehicle') }}"
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
                                                    @if(count($vehicles) != 0)
                                                        @php 
                                                        $i = 1;
                                                        @endphp
                                                        @foreach($vehicles as $vehicle)
                                                            <tr>
                                                                <td>{{ $i++ }}</td>
                                                                <td>{{ $vehicle->vehicle_type->Type_Vehicle_Name ?? '' }}</td>
                                                                <td>{{ $vehicle->License_Plates ?? '' }}</td>
                                                                <td>{{ $vehicle->Time_In ?? ''}}</td>
                                                                <td>{{ $vehicle->Time_Out ?? '' }}</td>
                                                                <td><span class="badge {{ $vehicle->Parking_Status == 1 ? 'badge-warning' :  'badge-danger'}} ">{{ $vehicle->Parking_Status == 1 ? 'Rời bãi' :  'Đang trong bãi'}}</span></td>
                                                                <td class="table-action">
                                                                    <a type="submit" data-toggle="detail" title="Chi tiết!"   href="{{ route('detailVehicle', [$vehicle->Parking_ID])}}" class="btn btn-warning">
                                                                        <i class="fa fa-asterisk" aria-hidden="true"></i>
                                                                    </a>
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
<script>
  $(document).ready(function(){
      $('[data-toggle="detail"]').tooltip(); 
  });
</script>
@endsection
