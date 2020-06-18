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
                                            <div class="col-md-4 col-xs-4 b-r"><strong>Bãi gửi</strong>
                                                <br>
                                                <p class="text-muted">{{ $configParking->parking->Parking_Area_Name ?? '' }}</p>
                                            </div>
                                            <div class="col-md-4 col-xs-4 b-r"><strong>Bảo Vệ</strong>
                                                <br>
                                                <p class="text-muted">{{ $configParking->user->User_Name ?? '' }}</p>
                                            </div>
                                            <div class="col-md-4 col-xs-4 b-r"><strong>Địa chỉ</strong>
                                                <br>
                                                <p class="text-muted">{{ $configParking->MAC_Addr ?? '' }}</p>
                                            </div>
                                            <div class="col-md-4 col-xs-4 b-r"><strong>Thời gian tạo</strong>
                                                <br>
                                                <p class="text-muted">{{ $configParking->Reg_Date ?? '' }}</p>
                                            </div>
                                            <div class="col-md-4 col-xs-4 b-r"><strong>Thời gian cập nhật</strong>
                                                <br>
                                                <p class="text-muted">{{ $configParking->Mod_Date ?? '' }}</p>
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
                    <div class="col-md-5">
                        <div class="foot-links">
                            <h4> LIÊN KẾT </h4>
                            <ul>
                                <li><a href="../index.html">Trang chủ</a></li>
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
                                <li><i class="fa fa-envelope"></i> E-mail: <a class="mail-link"
                                                                                href="mailto:info@hitechviet.com">info@hitechviet.com</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-foot">
            <div class="container-fluid">
                <p>Bản quyền thuộc về Công ty Cổ Phần Hitech Việt Nam</p>
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
