@extends('layouts.admin')

@section('title', 'Tìm kiếm xe')

@section('content')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Chi tiết cấu phí</h3></div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                <li class="breadcrumb-item active">Chi tiết cấu hình phí</li>
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
                        <form class="form-valide" action="{{ route('config.updateConfigFee') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-parking-dan">Bãi gửi <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="val-parking-dan" name="parking_id" disabled>
                                        <option value="0">Chọn bãi gửi</option> 
                                        @if(count($parkings) != 0)
                                            @foreach($parkings as $parking)
                                                <option 
                                                    value="{{ $parking->Parking_Area_ID }}"
                                                    {{ old('parking_id', $detail_fees[0]['Parking_Area_ID']) == $parking->Parking_Area_ID ? 'selected' : '' }}
                                                >
                                                    {{ $parking->Parking_Area_Name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <input type="hidden" name="parking_id" value="{{  $parking->Parking_Area_ID }}"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-type-vehicle-dan">Loại xe <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="val-type-vehicle-dan" name="type_vehicle" disabled>
                                        <option value="0">Chọn loại xe</option>
                                        @if(count($vehicle_types) != 0)
                                            @foreach($vehicle_types as $vehicle_type)
                                                <option 
                                                    value="{{ $vehicle_type->Type_Vehicle_ID }}"
                                                    {{ old('vehicle_type', $detail_fees[0]['Vehicle_ID']) == $vehicle_type->Type_Vehicle_ID ? 'selected' : '' }}
                                                >
                                                    {{ $vehicle_type->Type_Vehicle_Name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <input type="hidden" name="type_vehicle" value="{{  $detail_fees[0]['Vehicle_ID'] }}"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-status">Loại phí <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="val-status-dan" name="type_fee" disabled>
                                        <option value="" selected disabled>Chọn loại phí </option>
                                        <option value="0" {{ old('type_fee', $detail_fees[0]['Type_Of_Fee']) == 0 ? 'selected' : '' }}>Tính phí theo Block</option>
                                        <option value="1" {{ old('type_fee', $detail_fees[0]['Type_Of_Fee']) == 1 ? 'selected' : '' }}>Tính phí theo ca</option>
                                    </select>
                                    <input type="hidden" name="type_vehicle" value="{{  $detail_fees[0]['Type_Of_Fee'] }}"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-max-price-dan">Số tiền tối đa qua 24h (vnd)<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="val-max-price-dan" name="max_price" value='{{ old('max_price', $detail_fees[0]['Max_Price']) }}' placeholder="Nhập số tiền tối đa khi qua 24h"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-free-first-time-dan">Thời gian miễn phí ban đầu (phút)<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="val-free-first-time-dan" name="free_first_time" value='{{ old('free_first_time', $detail_fees[0]['Free_First_Time']) }}'  placeholder="Nhập thời gian miễn phí ban đầu"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-over-time-dan">Thời gian miễn phí khi quá giờ (phút)<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="val-over-time-dan" name="over_time" value='{{ old('over_time', $detail_fees[0]['Over_Time']) }}'  placeholder="Nhập thời gian miễn phí khi quá mỗi giờ"/>
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
                                        @if(count($detail_fees) != 0)
                                        @php 
                                            $no = 1;
                                        @endphp
                                        @foreach($detail_fees as $detail_fee)
                                            <input type="hidden" class="form-control" id="fee_seqs" name="fee_ids[]" value='{{ $detail_fee['Parking_Fee_ID'] }}'/>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>
                                                    <input type="number" class="form-control" id="fee_seqs" name="fee_seqs[]" value='{{ $detail_fee['Fee_SEQ'] }}'/>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="time_blocks" name="time_blocks[]" value='{{ $detail_fee['Time_Block'] }}'></input>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="unit_prices" name="unit_prices[]" value='{{ number_format($detail_fee['Unit_Price'], 0) }}'></input>
                                                </td>
                                                <td>
                                                    <select class="form-control" id="val-status-dan" name="status[]">
                                                        <option value="" selected disabled>Chọn trạng thái</option>
                                                        <option value="0" {{ $detail_fee['Delete_Flag'] == 0 ? 'selected' : '' }}>Hoạt động</option>
                                                        <option value="1" {{ $detail_fee['Delete_Flag'] == 1 ? 'selected' : '' }}>Đã hủy</option>
                                                    </select>
                                                </td>
                                                <td>    

                                                </td>
                                                
                                            </tr>
                                        @endforeach
                                        @endif
                                        </tbody>
                                    </table>
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
<script>
    $(document).ready(function() {
        var no = {{ count($detail_fees) + 1 }};

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

        let max_price = $('#val-max-price-dan').val();
        $('#val-max-price-dan').val(convertNumberToCurrency(max_price));

        $('#val-max-price-dan').keyup(function(){
            let value = $(this).val().toString().replace(/,/g, '');

            $(this).val(convertNumberToCurrency(value));
        });

        $(document).on('keyup', '#unit_prices', function(){
            let value = $(this).val().toString().replace(/,/g, '');

            $(this).val(convertNumberToCurrency(value));
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
        
    });
</script>
@endsection
