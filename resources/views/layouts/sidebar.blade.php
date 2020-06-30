<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-label">TRANG CHỦ QUẢN LÝ</li>
                <li> <a  href={{ route('home') }} aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li class="nav-label">Cấu hình</li>
                <li> <a href={{ route('config.configParking') }} aria-expanded="false"><i class="fa fa-cogs"></i><span class="hide-menu">Cấu hình bãi gửi</span></a>
                <li> <a href={{ route('config.configFee') }} aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu">Cấu hình phí gửi</span></a>

                <li class="nav-label">Quản lý</li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user-circle-o"></i><span class="hide-menu">Quản lý người dùng</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href={{ route('user-management.create') }} >Thêm mới</a></li>
                        <li><a href={{ route('user-management.index') }}>Danh sách</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-map-marker"></i><span class="hide-menu">Quản lý bãi gửi</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href={{ route('parking-management.create') }}>Thêm mới</a></li>
                        <li><a href={{ route('parking-management.index') }}>Danh sách</a></li>
                    </ul>
                </li>
                @if(!is_null($user) && $user->Role_ID == 'RLM0000001')
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-building"></i><span class="hide-menu">Quản lý công ty</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href={{ route('company-management.create') }}>Thêm mới</a></li>
                        <li><a href={{ route('company-management.index') }}>Danh sách</a></li>
                    </ul>
                </li>
                @endif

                <li class="nav-label">Thống kê</li>
                <li> <a href={{ route('statisticVehicle') }} aria-expanded="false"><i class="fa fa-file-text-o"></i><span class="hide-menu">Thống kê xe</span></a>
                <li> <a href={{ route('statisticRevenue') }} aria-expanded="false"><i class="fa fa-bar-chart"></i><span class="hide-menu">Thống kê doanh thu</span></a>
                <li> <a href={{ route('statisticLogin') }} aria-expanded="false"><i class="fa fa-sign-in"></i><span class="hide-menu">Thống kê đăng nhập</span></a>
                <li> <a href={{ route('searchVehicle') }} aria-expanded="false"><i class="fa fa-car"></i><span class="hide-menu">Tìm kiếm xe</span></a>

                <li class="nav-label">Thông tin</li>
                <li> <a href={{ route('info') }} aria-expanded="false"><i class="fa fa-info"></i><span class="hide-menu">Giới thiệu</span></a>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>
