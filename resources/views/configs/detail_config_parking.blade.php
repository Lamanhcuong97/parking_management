@extends('layouts.admin')

@section('title', 'Tìm kiếm xe')

@section('content')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Cấu hình bãi gửi xe</h3></div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                <li class="breadcrumb-item active">Chi tiết cấu hình bãi xe</li>
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
                        <h4 class="card-title">Thông tin chi tiết</h4>
                        <form class="form-valide" action="{{ route('config.updateConfigParking', [$configParking->Set_Parking_ID]) }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-parking-admin">Chọn bãi gửi <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="val-parking-dan" name="parking_id" disabled>
                                        <option value="0">Chọn bãi gửi</option>
                                        @if(count($parkings) != 0)
                                            @foreach($parkings as $parking)
                                                <option 
                                                    value="{{ $parking->Parking_Area_ID }}"
                                                    {{ $parking->Parking_Area_ID == $configParking->Parking_Area_ID ? 'selected' : '' }}
                                                >
                                                    {{ $parking->Parking_Area_Name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <input type="hidden" name="parking_id" value="{{ $configParking->Parking_Area_ID }}"/>
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
                                                    {{ $configParking->user->User_ID == $row->User_ID ? 'selected' : '' }}
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
                                                    {{ $configParking->user->Role_ID == $role->Role_ID ? 'selected' : '' }}
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
                                    <input type="text" class="form-control" id="mac-addr" name="mac_addr" value="{{ $configParking->MAC_Addr }}" placeholder="Nhập địa chỉ MAC của thiết bị"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-status">Trạng thái <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="val-status-admin" name="status">
                                        <option value="" selected disabled>Chọn trạng thái</option>
                                        <option value="0" {{ $configParking->Delete_Flag == 0 ? ' selected': '' }}>Hoạt động</option>
                                        <option value="1" {{ $configParking->Delete_Flag == 1 ? ' selected': ''}}>Ngừng hoạt động</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-primary btn-update">Cập nhật</button>
                                </div>
                            </div>
                        </form>
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
        });

        $('.btn-update').click(function (e) {
            e.preventDefault();

            var $form = $(this).closest('form');
            
            swal({
                title: "Bạn có muốn?",
                text: "Cập nhật dữ liệu không?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Có", 
                cancelButtonText: "Không", 
                closeOnConfirm: false
            }, function (isConfirmed) {
                if (isConfirmed) {
                    $form.submit();
                }
            });

            return false;
        });  
    })
</script>
@endsection
