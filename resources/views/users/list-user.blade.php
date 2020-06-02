@extends('layouts.admin')

@section('title', 'Danh sách người dùng')

@section('content')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Quản lý người dùng</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                <li class="breadcrumb-item active">Danh sách người dùng</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <form class="form-valide" action="{{ route('user-management.index')}}" method="GET">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tìm kiếm người dùng</h4>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Tên đăng nhập</label>
                                        <input type="text" class="form-control" name="user_name" value="{{ old('user_name') }}" placeholder="Nhập vào tên đăng nhập">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Tên người dùng</label>
                                        <input type="text" class="form-control" name="full_name" value="{{ old('full_name') }}" placeholder="Nhập vào họ và tên">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Tên công ty</label>
                                        <select class="form-control" id="statistic-parking-area"
                                                name="company_id">
                                            <option value="" selected disabled>Chọn công ty</option>
                                            @if(count($companies) != 0)
                                                @foreach($companies as $company)
                                                    <option value={{$company->Com_ID}} {{ old('user_name') == $company->Com_ID ? 'selected' : '' }}>{{ $company->Com_Name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Tìm người dùng</label><br>
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
                        <h4 class="card-title">Danh sách người dùng</h4>
                        <h6 class="card-subtitle">Xuất dữ liệu với Copy, CSV, Excel, PDF & In</h6>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th>Họ và tên</th>
                                        <th>Sdt</th>
                                        <th>Quyền</th>
                                        <th>Công ty</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th>Họ và tên</th>
                                        <th>Sdt</th>
                                        <th>Quyền</th>
                                        <th>Công ty</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                @if(count($users) != 0)
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->User_ID ?? '' }}</td>
                                            <td>{{ $user->User_Name ?? '' }}</td>
                                            <td>{{ $user->Full_Name ?? '' }}</td>
                                            <td>{{ $user->Phone ?? '' }}</td>
                                            <td>{{ $user->role->Role_Name ?? '' }}</td>
                                            <td>{{ $user->company->Com_Name ?? '' }}</td>
                                            <td>
                                                <span class="badge {{ $user->Delete_Flag == 0 ? 'badge-success' : 'badge-danger' }}">
                                                    {{ $user->Delete_Flag == 0 ? 'Hoạt động' : 'Ngừng hoạt động' }}
                                                </span>
                                            </td>
                                            <td>
                                                <a type="submit" href={{ route('user-management.show', [$user->User_ID]) }} class="btn btn-warning" >Chi tiết</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else 
                                    <tr>
                                        <td colspan="8" style="text-align: center">Danh sách rỗng</td>
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
</div
@endsection
