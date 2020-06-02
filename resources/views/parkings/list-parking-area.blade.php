@extends('layouts.admin')

@section('title', 'Danh sách bãi gửi')

@section('content')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Quản lý bãi gửi</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                <li class="breadcrumb-item active">Danh sách bãi gửi</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <form class="form-valide" action="{{ route('parking-management.index')}}" >
        @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tìm kiếm bãi gửi</h4>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label">Tên bãi</label>
                                        <input type="text" class="form-control" name="parking_name" value='{{ old('parking_name')}}'placeholder="Nhập vào tên bãi">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label">Tên công ty</label>
                                        <select class="form-control" id="statistic-parking-area"
                                                name="company_id">
                                            <option value="" selected disabled >Chọn công ty</option>
                                            @if(count($companies) != 0)
                                                @foreach($companies as $company)
                                                    <option value={{ $company->Com_ID}} {{ (old('company_id') == $company->Com_ID) ? 'selected' : '' }}>{{ $company->Com_Name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">Tìm bãi</label><br>
                                        <button type="submit" class="btn btn-warning btn-rounded m-b-10 m-l-5">
                                            <i class="fa fa-search"></i> Tìm kiếm
                                        </button>
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
                        <h4 class="card-title">Danh sách bãi gửi</h4>
                        <h6 class="card-subtitle">Xuất dữ liệu với Copy, CSV, Excel, PDF & In</h6>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tên Bãi</th>
                                    <th>Kinh độ</th>
                                    <th>Vĩ độ</th>
                                    <th>Công ty</th>
                                    <th>Cấu hình vé</th>
                                    <th>Cấu hình hóa đơn</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Tên Bãi</th>
                                    <th>Kinh độ</th>
                                    <th>Vĩ độ</th>
                                    <th>Công ty</th>
                                    <th>Cấu hình vé</th>
                                    <th>Cấu hình hóa đơn</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                    @if(count($parkings) != 0)
                                        @foreach($parkings as $parking)
                                            <tr>
                                                <td>{{ $parking->Parking_Area_ID ?? '' }}</td>
                                                <td>{{ $parking->Parking_Area_Name ?? '' }}</td>
                                                <td>21.033548</td>
                                                <td>105.954212</td>
                                                <td>Công ty {{ $parking->company->Com_Name ?? '' }}</td>
                                                <td>Bãi gửi số 1 - Hitech</td>
                                                <td>Bãi gửi số 1 - Hitech</td>
                                                <td><span class="badge {{ $parking->Delete_Flag == 0 ? 'badge-success' : 'badge-danger' }}">{{ $parking->Delete_Flag == 0 ? 'Hoạt động' : 'Ngừng hoạt động' }}</span></td>
                                                <td>
                                                    <a type="submit" href={{ route('parking-management.show', [$parking->Parking_Area_ID])}} class="btn btn-warning">Chi tiết</a>
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
                                <li><i class="fa fa-envelope"></i> E-mail: <a class="mail-link" href="mailto:info@hitechviet.com">info@hitechviet.com</a></li>
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
