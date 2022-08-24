    <link href="/Admin2/Content/CSS/cc.css" rel="stylesheet" />
    </head>

    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end" id="sidebar-wrapper" style="background-color: rgb(197, 212, 199);">
                <div class="sidebar-heading border-bottom" style="background-color: rgb(189, 212, 193);"><img src="/Content/IMG/logo.png" style="height:73px;"></div>
                <ul class="list-group list-group-flush">

                    <li class="nav-item dropdown bbaa">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Quản Trị Sản Phẩm
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?action=loaisanpham">Loại Sản Phẩm</a>
                            <a class="dropdown-item" href="index.php?action=sanpham">Danh Sách Sản Phẩm</a>
                        </div>
                    </li>
                    <!-- Thống kê -->
                    <li class="nav-item dropdown bbaa">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Thống Kê
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?action=thongke">Thống Kê Số Lượng Bán</a>
                            <a class="dropdown-item" href="#">Sản Phẩm chưa được giao</a>
                        </div>
                    </li>
                    <!-- Quản lí -->
                    <li class="nav-item bbaa">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Quản lí
                        </a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="index.php?action=users">Tài Khoản Đăng Ký</a>
                            <a class="dropdown-item" href="index.php?action=users&act=qldonhang">Đơn Hàng</a>
                            <a class="dropdown-item" href="index.php?action=users&act=qlbl">Bình Luận Đánh Giá</a>
                        </div>
                    </li>
                    <!-- Báo cáo -->
                    <!-- <li class="nav-item dropdown bbaa">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Báo Cáo
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Tháng</a>
                            <a class="dropdown-item" href="#">Quý</a>
                            <a class="dropdown-item" href="#">Năm</a>
                        </div>
                    </li> -->
                    <!-- Báo cáo Tồn kho -->
                    <!-- <li class="nav-item bbaa">
                        <a class="nav-link" href="#">Tồn Kho</a>
                    </li> -->
                </ul>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light border-bottom" style="background-color: rgb(197, 212, 199);">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="index.php?action=users&act=logout">Thoát vai trò Admin</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>