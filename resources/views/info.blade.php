@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Giới thiệu</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                <li class="breadcrumb-item active">Giới thiệu</li>
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
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#sysinfo" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Giới thiệu công ty</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#prodinfo" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Giới thiệu sản phẩm</span></a> </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="sysinfo" role="tabpanel">
                                <div class="p-20">
                                    <p style="text-align: justify;">Hitech Việt Nam có tên đầy đủ là Công ty Cổ Phần Hitech Việt Nam ( Tên tiếng Anh: Viet Nam Hitech Joint Stock Company, tên viết tắt: Hitech Viet Nam JSC) với mã số đăng ký kinh doanh: 01 05 78 29 96 do Sở kế hoạch đầu tư Thành Phố Hà Nội cấp.</p>
                                    <p style="text-align: justify;">Ra đời trong thời kỳ khủng hoảng, lãnh đạo công ty nhận thức rõ sự khó khăn trước mắt. Tuy nhiên, với quan điểm “lửa thử vàng, gian nan thử sức” toàn thể ban lãnh đạo và nhân viên trong công ty đều đồng lòng nhất trí coi đây là thời gian thử thách và quyết tâm vượt qua khó khăn, lấy đó làm động lực vươn lên.</p>
                                    <p style="text-align: justify;">Triết lý kinh doanh:<span style="color: #ff0000;"><em><strong> Lấy chữ TÂM làm cốt lõi, chữ TÀI làm trọng yếu.</strong></em></span></p>
                                    <p style="text-align: justify;">Chữ TÂM trong phục vụ khách khàng: Hitech hiểu rằng không có Khách hàng, sẽ không có Hitech, vì vậy toàn bộ nhân viên Hitech luôn cố gắng làm hài lòng khách hàng, dốc sức sử dụng trí tuệ, sức sáng tạo, nhiệt tình và tinh thần nghiêm túc, trách nhiệm để không chỉ thỏa mãn nhu cầu của khách hàng mà còn đem đến giá trị cao nhất có thể cho khách hàng. Nhưng chỉ hiểu được điều khách hàng cần thôi chưa đủ, mà còn phải đem đến cho khách hàng thứ mà họ muốn, chính vì thế Hitech luôn coi trọng người TÀI, vì chỉ có người TÀI mới có đủ trí lực, sức thông minh và sáng tạo để tạo nên giá trị phục vụ khách hàng. Với Hitech, chữ TÂM và chữ TÀI tạo nên chữ TÍN, chữ TÍN là sự nghiệp của chúng tôi.</p>
                                    <p style="text-align: justify;">Chữ TÂM trong quản trị nhân sự: luôn quan tâm đến lợi ích của nhân viên, tạo điều kiện để nhân viên tiến bộ, phát triển, đam mê công việc, gắn bó với tổ chức, trên cơ sở đó xây dựng tinh thần làm việc trách nhiệm, hăng say, đạt hiệu quả cao. Chúng tôi hiểu rằng tập hợp các cá nhân tạo nên tổ chức, muốn tổ chức vững mạnh, mỗi cá nhân phải xuất sắc. Do vậy, Hitech xác định con người là nguồn lực cốt yếu, quan trọng nhất quyết định tới sự phát triển, tồn vong của tổ chức. Vì thế, Hitech có chính sách tổ chức các khóa học đầu vào để đào tạo nghiệp vụ, kiến thức an toàn lao động… với những nhân viên mới, tổ chức các buổi thảo luận, trao đổi kinh nghiệm tạo điều kiện để nhân viên học hỏi lẫn nhau, động viên khuyến khích nhân viên sáng tạo trong công việc. Bên cạnh đó, Hitech còn cử nhân viên đi học tập với các chuyên gia của hãng, nâng cao chuyên môn, nghiệp vụ.</p>
                                    <p style="text-align: justify;">Về phương châm kinh doanh: Chúng tôi hiểu rằng chỉ đem đến cho khách hàng sản phẩm tốt thôi là chưa đủ, thứ khách hàng muốn là tiện ích của sản phẩm đó. Chúng tôi luôn dặn dò nhân viên rằng: Khách hàng không trả tiền để đổi lấy sản phẩm, mà để mua được sự hài lòng. Khách hàng có thể lựa chọn chúng ta hoặc không lựa chọn chúng ta nhưng khiến khách hàng hài lòng tức chúng tôi đã thành công.</p>
                                    <p style="text-align: justify;">Quan điểm về phát triển công nghệ: Hitech muốn sử dụng sức mạnh trí tuệ Việt để tạo giá trị phục vụ người Việt, nâng cao tiện nghi cho người Việt. Nhưng chúng tôi có quan niệm: Không sáng tạo lại những thứ đã có. Chúng tôi biết rằng trí tuệ của tất cả chúng tôi chỉ là giọt nước trong biển cả trí tuệ nhân loại, vì vậy chúng tôi học hỏi những kiến thức đó, chắt lọc, biến nó thành của mình, cải tiến nó để phù hợp với cuộc sống người Việt. Hơn nữa, chúng tôi mong muốn sử dụng trí tuệ, kiến thức sẵn có kết hợp với niềm đam mê, nhiệt huyết sáng tạo, trong điều kiện thực tiễn Việt Nam để tìm tòi những phương pháp mới, công nghệ mới ứng dụng vào cuộc sống, đồng thời tạo ra điểm sáng, riêng biệt của Hitech.</p>
                                    <p style="text-align: justify;">Về chế độ phúc lợi khác, Hitech cam kết đáp ứng đầy đủ các chế độ chính sách về bảo hiểm, phúc lợi lao động để người lao động yên tâm làm việc. Hitech luôn cố gắng cải thiện điều kiện làm việc của người lao động, đầu tư các trang thiết bị phục vụ công việc, đảm bảo an toàn lao động như: thang gấp, bộ đàm liên lạc, mũ, áo, đồ bảo hộ lao động… Ngoài ra, Hitech còn tổ chức các hoạt động nội bộ nhằm củng cố các mối quan hệ giữa cấp trên – cấp dưới, đồng nghiệp – đồng nghiệp, tạo điều kiện để mỗi thành viên trong công ty chia sẻ, hỗ trợ giúp đỡ nhau, xây dựng khối đoàn kết, cùng phục vụ lợi ích khách hàng, cùng phát triển. Chúng tôi hi vọng cùng với sự phát triển của Hitech sẽ được đóng góp sức lao động vào sự phồn thịnh của xã hội.</p>
                                    <p style="text-align: justify;"><span style="color: #ff0000;"><em><strong>Tầm nhìn: Trở thành công ty công nghệ hàng đầu Việt Nam dựa trên nền tảng trí tuệ Việt.</strong></em></span><br>
                                        <span style="color: #ff0000;"> <em><strong> Sứ mạng: Sử dụng sức mạnh trí tuệ Việt để tạo giá trị phục vụ người Việt.</strong></em></span><br>
                                        <span style="color: #ff0000;"> <em><strong> Giá trị cốt lõi: Lấy chữ TÂM làm cốt lõi, chữ TÀI làm trọng yếu.</strong></em></span></p>
                                </div>
                            </div>
                            <div class="tab-pane  p-20" id="prodinfo" role="tabpanel">
                                <div class="p-20">
                                    thong tin san pham
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
