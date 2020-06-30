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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Tên bãi</label>
                                        <input type="text" class="form-control" name="parking_name" value='{{ old('parking_name')}}'placeholder="Nhập vào tên bãi">
                                    </div>
                                </div>
                                @if(!is_null($user) && $user->Role_ID == 'RLM0000001')
                                <div class="col-md-4">
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
                                @endif
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-warning btn-rounded m-b-10 m-l-5">
                                            <i class="fa fa-search"></i> Tìm kiếm
                                        </button>
                                        <a 
                                            class="btn btn-default btn-refresh btn-rounded m-b-10 m-l-5"
                                            href="{{ route('parking-management.index') }}"
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
                        <h4 class="card-title">Danh sách bãi gửi</h4>
                        <h6 class="card-subtitle">Xuất dữ liệu với Copy, CSV, Excel, PDF & In</h6>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tên Bãi</th>
                                    <th>Công ty</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(count($parkings) != 0)
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach($parkings as $parking)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $parking->Parking_Area_Name ?? '' }}</td>
                                                <td>Công ty {{ $parking->company->Com_Name ?? '' }}</td>
                                                <td><span class="badge {{ $parking->Delete_Flag == 0 ? 'badge-success' : 'badge-danger' }}">{{ $parking->Delete_Flag == 0 ? 'Hoạt động' : 'Ngừng hoạt động' }}</span></td>
                                                <td class="table-action">
                                                    <a type="submit" data-toggle="detail" title="Chi tiết!"  href={{ route('parking-management.show', [$parking->Parking_Area_ID])}} class="btn btn-warning">
                                                        <i class="fa fa-asterisk" aria-hidden="true"></i>
                                                    </a>
                                                    <form action="{{ route('parking-management.destroy', [$parking->Parking_Area_ID])}}" method="POST">
                                                        {{method_field('DELETE')}}
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-del" data-toggle="delete" title="Xóa!" ><i class="fa fa-trash"></i></button>
                                                    </form>
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
      $('[data-toggle="delete"]').tooltip();   
      $('[data-toggle="detail"]').tooltip();   

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
