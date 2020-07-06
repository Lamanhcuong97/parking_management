@extends('layouts.admin')

@section('title', 'Cấu hình bãi gửi')

@section('content')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Cấu hình bãi gửi</h3></div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                <li class="breadcrumb-item active">Cấu hình bãi gửi</li>
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
                                    class="hidden-xs-down">Danh sách bãi gửi</span></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile"
                                                    role="tab"><span class="hidden-sm-up"><i
                                    class="ti-user"></i></span> <span
                                    class="hidden-xs-down">Cấu hình quản lý bãi</span></a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <div class="p-20">
                                    <form class="form-valide" action="{{ route('config.configParking') }}" method="GET">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Tìm kiếm bãi gửi</h4>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Tên bãi</label>
                                                                    <select class="form-control" id="val-parking-dan" name="search_parking_id">
                                                                        <option value="0">Chọn bãi gửi</option>
                                                                        @if(count($parkings) != 0)
                                                                            @foreach($parkings as $parking)
                                                                                <option 
                                                                                    value="{{ $parking->Parking_Area_ID }}"
                                                                                    {{ old('search_parking_id') == $parking->Parking_Area_ID ? 'selected' : '' }}
                                                                                >
                                                                                    {{ $parking->Parking_Area_Name }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Chức vụ</label>
                                                                    <select class="form-control" id="val-user" name="search_role_id">
                                                                        <option value="0" selected disabled>Chọn chức vụ</option>
                                                                        @if(count($roles) != 0)
                                                                            @foreach($roles as $role)
                                                                                <option 
                                                                                    value="{{ $role->Role_ID }}"
                                                                                    {{ old('search_role_id') == $role->Role_ID ? 'selected' : '' }}
                                                                                >
                                                                                    {{ $role->Role_Name }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Nhân viên</label>
                                                                    <select class="form-control" id="val-user" name="search_user_id">
                                                                        <option value="0" selected disabled>Chọn nhân viên</option>
                                                                        @if(count($users) != 0)
                                                                            @foreach($users as $row)
                                                                                <option 
                                                                                    value="{{ $row->User_ID }}"
                                                                                    {{ old('search_user_id') == $row->User_ID ? 'selected' : '' }}
                                                                                >
                                                                                    {{ $row->User_Name }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-warning btn-rounded m-b-10 m-l-5">
                                                                        <i class="fa fa-search"></i> Tìm kiếm
                                                                    </button>
                                                                    <a 
                                                                        class="btn btn-default btn-refresh btn-rounded m-b-10 m-l-5"
                                                                        href="{{ route('config.configParking') }}"
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
                                                    <h4 class="card-title">Danh sách người dùng</h4>
                                                    <h6 class="card-subtitle">Xuất dữ liệu với Copy, CSV, Excel, PDF & In</h6>
                                                    <div class="table-responsive m-t-40">
                                                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Id</th>
                                                                    <th class="w-74">Tên bãi</th>
                                                                    <th class="w-74">Tên người dùng</th>
                                                                    <th class="w-79">Chức vụ</th>
                                                                    <th class="w-73">Trạng thái</th>
                                                                    <th>Hành động</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if(count($config_parkings) != 0)
                                                                @php 
                                                                    $no = 1;
                                                                @endphp
                                                                    @foreach($config_parkings as $config_parking)
                                                                        <tr>
                                                                            <td>{{ $no++ }}</td>
                                                                            <td>{{ $config_parking->parking->Parking_Area_Name ?? ''}}</td>
                                                                            <td>{{ $config_parking->user->User_Name ?? ''}}</td>
                                                                            <td>{{ $config_parking->user->role->Role_Name}}</td>
                                                                            <td>
                                                                                <span class="badge badge-success">
                                                                                    Hoạt động
                                                                                </span>
                                                                            </td>
                                                                            <td class="table-action">
                                                                                <a type="submit" data-toggle="detail" title="Chi tiết!"  href="{{ route('config.detailConfigParking', [$config_parking->Set_Parking_ID]) }}" class="btn btn-warning">
                                                                                    <i class="fa fa-asterisk" aria-hidden="true"></i>
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach
                                                                    @else 
                                                                        <tr>
                                                                            <td colspan="6" style="text-align: center">Danh sách rỗng</td>
                                                                        </tr>
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
                            <div class="tab-pane  p-20" id="profile" role="tabpanel">
                                <div class="row justify-content-center">
                                    <div class="col-md-6 col-sm-12">
                                        <form class="form-valide" action="{{ route('config.setConfigParking') }}" method="post">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-parking-admin">Chọn bãi gửi <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="val-parking-dan" name="parking_id">
                                                        <option value="0">Chọn bãi gửi</option>
                                                        @if(count($parkings) != 0)
                                                            @foreach($parkings as $parking)
                                                                <option 
                                                                    value="{{ $parking->Parking_Area_ID }}"
                                                                    {{ old('parking_id') == $parking->Parking_Area_ID ? 'selected' : '' }}
                                                                >
                                                                    {{ $parking->Parking_Area_Name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-user">Chọn quản lý bãi <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="val-user" name="user_id">
                                                        <option value="0" selected disabled>Chọn nhân viên</option>
                                                        @if(count($users) != 0)
                                                            @foreach($users as $row)
                                                                <option 
                                                                    value="{{ $row->User_ID }}"
                                                                    data_role_id="{{ $row->role->Role_ID }}"
                                                                    {{ old('user_id') == $row->User_ID ? 'selected' : '' }}
                                                                >
                                                                    {{ $row->User_Name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-user">Chức vụ <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="val-role-id" name="role_id" onchange="event.target.selectedIndex = 0">
                                                        <option value="0" selected disabled>Chọn chức vụ</option>
                                                        @if(count($roles) != 0)
                                                            @foreach($roles as $role)
                                                                <option 
                                                                    value="{{ $role->Role_ID }}"
                                                                    id="role-id-{{ $role->Role_ID }}"       
                                                                    {{ old('role_id') == $role->Role_ID ? 'selected' : '' }}
                                                                >
                                                                    {{ $role->Role_Name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="mac-addr">Địa chỉ MAC<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="mac-addr" name="mac_addr" placeholder="Nhập địa chỉ MAC của thiết bị"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-status">Trạng thái <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="val-status-admin" name="status">
                                                        <option value="" selected disabled>Chọn trạng thái</option>
                                                        <option value="0">Hoạt động</option>
                                                        <option value="1">Ngừng hoạt động</option>
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
        $('[data-toggle="delete"]').tooltip(); 

        $('#val-role-id').css({'pointer-events': 'none', 'background-color': '#ddd'});

        $(document).on('keyup', '#mac-addr', function(){
            let value = $(this).val().replace(/:/g, '');

            $(this).val(convertMACAddr(value));
        });

        $(document).on('change', '#val-user', function(){
            let role_id = $(this).find(":selected").attr('data_role_id');
            $('#val-role-id').val(role_id);
        })
    })
</script>
@endsection
