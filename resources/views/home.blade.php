@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-md-3">
                <div class="card p-20">
                    <div class="media">
                        <div class="media-top">
                            <div><span><i class="fa fa-usd f-s-40 color-primary"></i></span></div>
                            <div class="media-top-right"> <h2>{{ is_null($revenue) ? number_format(568120, 0) :  number_format($revenue, 2) }}</h2></div>
                        </div>
                        <div class="media-bottom">
                            <p class="m-b-0">Tổng doanh thu tháng {{ $now }}</p>
                            <p class="m-b-0">(Đơn vị: VNĐ)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-20">
                    <div class="media">
                        <div class="media-top">
                            <div><span><i class="fa fa-car f-s-40 color-success"></i></span></div>
                            <div class="media-top-right"> <h2>{{ $data[0]->total ?? '123' }}</h2></div>
                        </div>
                        <div class="media-bottom">
                           
                            <p class="m-b-0">Số xe ô tô gửi tháng {{ $now }}</p>
                            <p class="m-b-0">(Lượt xe)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-20">
                    <div class="media">
                        <div class="media-top">
                            <div><span><i class="fa fa-motorcycle f-s-40 color-warning"></i></span></div>
                            <div class="media-top-right"><h2>{{ $data[1]->total ?? '123' }}</h2></div>
                        </div>
                        <div class="media-bottom">
                            <p class="m-b-0">Số xe máy gửi tháng {{ $now }}</p>
                            <p class="m-b-0">(Lượt xe)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-20">
                    <div class="media">
                        <div class="media-top">
                            <div><span><i class="fa fa-bicycle f-s-40 color-danger"></i></span></div>
                            <div class="media-top-right"><h2>{{ $data[2]->total ?? '123' }}</h2></div>
                        </div>
                        <div class="media-bottom">
                            <p class="m-b-0">Số xe đạp gửi tháng {{ $now }}</p>
                            <p class="m-b-0">(Lượt xe)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row bg-white m-l-0 m-r-0 box-shadow ">
            <!-- column -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Biểu đồ doanh thu</h4>
                        <div id="extra-area-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                {{-- <div class="year-calendar"></div> --}}
                <div class="year-calendar"> 
                    
                </div>
                <div class="tooltip-date">
                    <p id="tooltip-day"></p>
                    <p id="tooltip-car"></p>
                    <p id="tooltip-motobike"></p>
                    <p id="tooltip-bike"></p>
                    <p id="tooltip-revenue"></p>
                </div>
            </div>
            <!-- column -->
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
                                <li><a href="index.html">Trang chủ</a></li>
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
                                <li><i class="fa fa-envelope"></i> E-mail: <a class="mail-link" href="mailto:info@hitechviet.com">info@hitechviet.com</a></li>
                            </ul>
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
<!-- Amchart -->
<script src={{ asset("js/lib/morris-chart/raphael-min.js") }}></script>
<script src={{ asset("js/lib/morris-chart/morris.js") }}></script>

<script src={{ asset("js/lib/calendar-2/moment.latest.min.js") }}></script>
<!-- scripit init-->
<script src={{ asset("js/lib/calendar-2/semantic.ui.min.js") }}></script>
<!-- scripit init-->
<script src={{ asset("js/lib/calendar-2/prism.min.js") }}></script>
<!-- scripit init-->
<script src={{ asset("js/lib/calendar-2/pignose.calendar.min.js") }}></script>
<!-- scripit init-->
<script src={{ asset("js/lib/calendar-2/pignose.init.js") }}></script>

<script src={{ asset("js/lib/owl-carousel/owl.carousel.min.js") }}></script>
<script src={{ asset("js/lib/owl-carousel/owl.carousel-init.js") }}></script>

<script>
    $( function () {
        "use strict";
        var d = new Date();
        var year = d.getFullYear();
        var prev_year = year - 1;
        var data = [];

        $.ajax({
            url: base_url +'statisticOfYear/' + year,
            type: 'GET',
            async: false,
            success: function(res) {
                data['data_current_year'] = {
                    'period': res.now, 
                    'car': res.data.car, 
                    'motobike': res.data.motobike, 
                    'bike': res.data.bike, 
                    'revenue': res.revenue
                }
            }
        });

        $.ajax({
            url: base_url +'statisticOfYear/' + prev_year,
            type: 'GET',
            async: false,
            success: function(res) {
                
                data['data_prev_year'] = {
                    'period': res.now, 
                    'car': res.data.car, 
                    'motobike': res.data.motobike, 
                    'bike': res.data.bike, 
                    'revenue': res.revenue
                }
            }
        });

        Morris.Area( {
            element: 'extra-area-chart',
            data: [
                data['data_prev_year'],
                data['data_current_year']
            ],
            lineColors: [ '#26DAD2', '#fc6180', '#ffb64d', '#4680ff' ],
            xkey: 'period',
            ykeys: [ 'car', 'bike', 'motobike', 'revenue' ],
            labels: [ 'Ô tô', 'Xe đạp', 'Xe máy', 'Doanh thu' ],
            pointSize: 0,
            lineWidth: 0,
            resize: true,
            fillOpacity: 0.8,
            behaveLikeLine: true,
            gridLineColor: '#e0e0e0',
            hideHover: 'auto'

        } );



    } );
</script>
@endsection
