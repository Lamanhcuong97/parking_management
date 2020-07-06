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
                        <div class="tab-pane  p-20" id="detail" role="tabpanel">
                            <div class="p-20">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Thông tin chi tiết</h4>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-4 b-r"><strong>Loại xe</strong>
                                                <br>
                                                <p class="text-muted">{{ $vehicle->vehicle_type->Type_Vehicle_Name ?? '' }}</p>
                                            </div>
                                            <div class="col-md-4 col-xs-4 b-r"><strong>Biển số</strong>
                                                <br>
                                                <p class="text-muted">{{ $vehicle->License_Plates ?? '' }}</p>
                                            </div>
                                            <div class="col-md-4 col-xs-4 b-r"><strong>Mã vé</strong>
                                                <br>
                                                <p class="text-muted">
                                                {{ $vehicle->Ticket_Code ?? '' }}
                                            </p>
                                            </div>

                                            <div class="col-md-4 col-xs-4 b-r"><strong>Thời gian
                                                vào</strong>
                                                <br>
                                                <p class="text-muted">{{ $vehicle->Time_In ?? '' }}</p>
                                            </div>
                                            <div class="col-md-4 col-xs-4 b-r"><strong>Thời gian
                                                ra</strong>
                                                <br>
                                                <p class="text-muted">{{ $vehicle->Time_Out ?? '' }}</p>
                                            </div>
                                            <div class="col-md-4 col-xs-4 b-r"><strong>Tình
                                                trạng</strong>
                                                <br>
                                                <p class="text-muted">
                                                    <span class="badge {{ $vehicle->Parking_Status == 1 ? 'badge-warning' :  'badge-danger'}} ">
                                                        {{ $vehicle->Parking_Status == 1 ? 'Rời bãi' :  'Đang trong bãi'}}
                                                    </span>
                                                </p>
                                            </div>

                                            <div class="col-md-4 col-xs-4 b-r"><strong>Bãi gửi</strong>
                                                <br>
                                                <p class="text-muted">{{ $vehicle->parking->Parking_Area_Name ?? '' }}</p>
                                            </div>
                                            <div class="col-md-4 col-xs-4 b-r"><strong>Bảo Vệ</strong>
                                                <br>
                                                <p class="text-muted">{{ $vehicle->vehicle_type->Type_Vehicle_Name ?? '' }}</p>
                                            </div>
                                            <div class="col-md-4 col-xs-4 b-r"><strong>Phí gửi</strong>
                                                <br>
                                                <p class="text-muted">{{ number_format($vehicle->Cost_Parking, 0) . ' VNĐ' ?? '0' }}</p>
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
                                                        <img style="width: 100%" src="{{ asset('/storage/vehicles/'. $images[0]) }}">
                                                    </div>
                                                    <div class="col-md-6 col-xs-6 b-r">
                                                        <img style="width: 100%" src="{{ asset('/storage/vehicles/'. $images[1]) }}">
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
                                                        <img style="width: 100%" src="{{ asset('/storage/vehicles/'. $images[2]) }}">
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
