@extends('layouts.admin')

@section('title', 'Thông tin bãi gửi')

@section('content')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Quản lý bãi gửi</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                <li class="breadcrumb-item active">Thông tin bãi gửi</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('parking-management.update', [$parking->Parking_Area_ID])}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-name-parking-area">Tên bãi gửi <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-name-parking-area" name="parking_area_name" value='{{ $parking->Parking_Area_Name ?? '' }}' placeholder="Nhập vào tên bãi gửi..">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-status">Trạng thái <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-status" name="status">
                                            <option value="" selected disabled>Chọn trạng thái</option>
                                            <option value="0" {{ $parking->Delete_Flag == 0 ? 'selected' : '' }}>Hoạt động</option>
                                            <option value="1" {{ $parking->Delete_Flag == 1 ? 'selected' : '' }}>Ngừng hoạt động</option>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div id="map">

                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary btn-update" >Cập nhật</button>
                                    </div>
                                </div>

                            </form>
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
                <p> Bản quyền thuộc về Công ty Cổ Phần Pichiche Việt Nam</p>
            </div>
        </div>
    </footer>
    <!-- End footer -->
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
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

