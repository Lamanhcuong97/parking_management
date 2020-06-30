@extends('layouts.admin')

@section('title', 'Cấu hình phí gửi')

@section('content')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Cấu hình phí gửi</h3></div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                <li class="breadcrumb-item active">Cấu hình phí</li>
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
                                    class="hidden-xs-down">Danh sách phí</span></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#messages"
                                                    role="tab"><span class="hidden-sm-up"><i
                                    class="ti-email"></i></span> <span
                                    class="hidden-xs-down">Cấu hình phí</span></a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <div class="p-20">
                                    <form class="form-valide" action="{{ route('config.configFee') }}" method="GET">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Tìm kiếm phí</h4>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Bãi gửi</label>
                                                                    <select class="form-control" id="val-type-vehicle-dan" name="parking_id">
                                                                        <option value="" selected disabled>Chọn bãi gửi</option>
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
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Phương tiện</label>
                                                                    <select class="form-control" id="val-type-vehicle-dan" name="vehicle_type">
                                                                        <option value="" selected disabled>Chọn loại xe</option>
                                                                        @if(count($vehicle_types) != 0)
                                                                            @foreach($vehicle_types as $vehicle_type)
                                                                                <option 
                                                                                    value="{{ $vehicle_type->Type_Vehicle_ID }}"
                                                                                    {{ old('vehicle_type') == $vehicle_type->Type_Vehicle_ID ? 'selected' : '' }}
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
                                                                    <button type="submit" class="btn btn-warning btn-rounded m-b-10 m-l-5">
                                                                        <i class="fa fa-search"></i> Tìm kiếm
                                                                    </button>
                                                                    <a 
                                                                        class="btn btn-default btn-refresh btn-rounded m-b-10 m-l-5"
                                                                        href="{{ route('config.configFee') }}"
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
                                                    <h4 class="card-title">Danh sách phí</h4>
                                                    <h6 class="card-subtitle">Xuất dữ liệu với Copy, CSV, Excel, PDF & In</h6>
                                                    <div class="table-responsive m-t-40">
                                                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Id</th>
                                                                    <th class="w-76">Bãi gửi</th>
                                                                    <th class="w-74">Loại phương tiện</th>
                                                                    <th class="w-81">Loại phí</th>
                                                                    <th class="w-73">Block</th>
                                                                    <th class="w-76">Phí gửi</th>
                                                                    <th class="w-73">Thời gian miễn phí</th>
                                                                    <th class="w-81">Quá giờ</th>
                                                                    <th class="w-98">Hành động</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if(count($parking_fees) != 0)
                                                                @php
                                                                    $no = 1;
                                                                @endphp
                                                                    @foreach($parking_fees as $parking_fee)
                                                                    <tr>
                                                                        <td>{{ $no++ }}</td>
                                                                        <td>{{ $parking_fee->parking->Parking_Area_Name ?? '' }}</td>
                                                                        <td>{{ $parking_fee->vehicle_type->Type_Vehicle_Name ?? '' }}</td>
                                                                        <td>{{ $parking_fee->Type_Of_Fee == 1 ? 'Theo giờ' : 'Theo ca' }}</td>
                                                                        <td>{{ $parking_fee->Time_Block ?? '' }}</td>
                                                                        <td>{{ $parking_fee->Unit_Price ?? '' }}</td>
                                                                        <td>{{ $parking_fee->Free_First_Time ?? ''}}</td>
                                                                        <td>
                                                                            {{ $parking_fee->Over_Time ?? '' }}
                                                                        </td>
                                                                       <td class="table-action">
                                                                            <a  data-toggle="detail" title="Chi tiết!"   href="{{ route('config.detailConfigFee', ['parking_id' => $parking_fee->parking->Parking_Area_ID, 
                                                                            'vehicle_type' => $parking_fee->vehicle_type->Type_Vehicle_ID, 'fee_type' => $parking_fee->Type_Of_Fee]) }}" class="btn btn-warning">
                                                                                <i class="fa fa-asterisk" aria-hidden="true"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                    @else 
                                                                    <tr>
                                                                        <td colspan="9" style="text-align: center">Danh sách rỗng</td>
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
                            <div class="tab-pane p-20" id="messages" role="tabpanel">
                                <div class="row">
                                    <div class="col-11">
                                        <form class="form-valide" action="{{ route('config.setConfigFee') }}" method="post">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-parking-dan">Chọn bãi gửi <span class="text-danger">*</span></label>
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
                                                <label class="col-lg-4 col-form-label" for="val-type-vehicle-dan">Chọn loại xe <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="val-type-vehicle-dan" name="type_vehicle">
                                                        <option value="0">Chọn loại xe</option>
                                                        @if(count($vehicle_types) != 0)
                                                            @foreach($vehicle_types as $vehicle_type)
                                                                <option 
                                                                    value="{{ $vehicle_type->Type_Vehicle_ID }}"
                                                                    {{ old('vehicle_type') == $vehicle_type->Type_Vehicle_ID ? 'selected' : '' }}
                                                                >
                                                                    {{ $vehicle_type->Type_Vehicle_Name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-status">Chọn loại phí <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="val-status-dan" name="type_fee">
                                                        <option value="" selected disabled>Chọn loại phí </option>
                                                        <option value="0">Tính phí theo Block</option>
                                                        <option value="1">Tính phí theo ca</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-max-price-dan">Số tiền tối đa qua 24h (vnd)<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="val-max-price-dan" name="max_price" placeholder="Nhập số tiền tối đa khi qua 24h"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-free-first-time-dan">Thời gian miễn phí ban đầu (phút)<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <textarea class="form-control" id="val-free-first-time-dan" name="free_first_time" rows="5" placeholder="Nhập thời gian miễn phí ban đầu"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-over-time-dan">Thời gian miễn phí khi quá giờ (phút)<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <textarea class="form-control" id="val-over-time-dan" name="over_time" rows="5" placeholder="Nhập thời gian miễn phí khi quá mỗi giờ"></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-lg-12 ml-auto ov-scroll">
                                                    <p class="btn btn-primary btn-add-row m-b-15">Thêm mới</p>
                                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>STT</th>
                                                                <th class="w-79">Thứ tự</th>
                                                                <th class="w-74">Thời gian Block</th>
                                                                <th class="w-74">Giá tiền</th>
                                                                <th class="w-73">Trạng thái</th>
                                                                <th class="w-112">Hành động</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="block_fee">
                                                            
                                                        </tbody>
                                                    </table>
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
    $(document).ready(function() {
        var no = 1;

      $('[data-toggle="detail"]').tooltip(); 
      $('[data-toggle="delete"]').tooltip(); 

        $('.btn-add-row').on('click', function(){
            $('#block_fee').append(
                `<tr>
                    <td>${ no++ }</td>
                    <td>
                        <input type="number" class="form-control" id="fee_seqs" name="fee_seqs[]"></input>
                    </td>
                    <td>
                        <input type="number" class="form-control" id="time_blocks" name="time_blocks[]"></input>
                    </td>
                    <td>
                        <input type="text" class="form-control" id="unit_prices" name="unit_prices[]"></input>
                    </td>
                    <td>
                        <select class="form-control" id="val-status-dan" name="status[]">
                            <option value="" selected disabled>Chọn trạng thái</option>
                            <option value="0" selected>Hoạt động</option>
                            <option value="1">Đã hủy</option>
                        </select>
                    </td>
                    <td>    
                        <p class="btn btn-danger btn-delete">X</p>

                    </td>
                    
                </tr>`);
        });

        $(document).on('click', '.btn-delete', function(){
            $(this).parents('tr').remove()
        })

        $('#val-max-price-dan').keyup(function(){
            let value = $(this).val().toString().replace(/,/g, '');

            $(this).val(convertNumberToCurrency(value));
        });

        $(document).on('keyup', '#unit_prices', function(){
            let value = $(this).val().toString().replace(/,/g, '');

            $(this).val(convertNumberToCurrency(value));
        });


        
      $('.btn-del').click(function (e) {
            e.preventDefault();

            var $form = $(this).closest('form');
            
            swal({
                title: "Bạn có muốn?",
                text: "Xóa dữ liệu không?",
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
        
    });
</script>
@endsection
