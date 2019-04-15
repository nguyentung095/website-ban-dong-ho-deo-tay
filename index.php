<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Niên luận ngành">
    <meta name="author" content="">
    <title>Admin-Niên luận ngành</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Quản tri viên - Nguyễn Trường Giang</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Thông tin cá nhân</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Trang sản phẩm</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <div class="alert alert-info">
                                <center>Danh mục quản lý</center>
                            </div> 
                        </li>
                        <li>
                            <a href="?page=trangquantri"><i class="fa fa-area-chart fa-fw"></i>Thống kê</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Loại sản phảm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=danhsachloaisanpham">Danh sách loại sản phẩm</a>
                                </li>
                                <li>
                                    <a href="?page=themmoiloaisanpham">Thêm mới loại sản phẩm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i>Nhà sản xuất<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=danhsachnhasanxuat">Danh sách nhà sản xuất</a>
                                </li>
                                <li>
                                    <a href="?page=themmoinhasanxuat">Thêm mới nhà sản xuất</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cubes fa-fw"></i> Sản phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=danhsachsanpham">Danh sách sản phẩm</a>
                                </li>
                                <li>
                                    <a href="?page=themmoisanpham">Thêm mới sản phẩm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dollar fa-fw"></i> Khuyến mãi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=danhsachkhuyenmai">Danh sách khuyến mãi</a>
                                </li>
                                <li>
                                    <a href="?page=themmoikhuyenmai">Thêm mới khuyến mãi</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-newspaper-o fa-fw"></i>Tin tức<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=danhsachtintuc">Danh sách tin tức</a>
                                </li>
                                <li>
                                    <a href="?page=themmoitintuc">Thêm mới tin tức</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-credit-card fa-fw"></i> Hình thức thanh toán<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=danhsachhinhthucthanhtoan">Danh sách hình thức thanh toán</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-keyboard-o fa-fw"></i>Góp ý về dịch vụ<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=danhsachgopydv">Danh sách góp ý về dịch vụ</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pencil fa-fw"></i> Góp ý về sản phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=danhsachgopysp">Danh sách góp ý về sản phẩm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Quản lý khách hàng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=danhsachkhachhang">Danh sách khách hàng</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bank fa-fw"></i>Đơn hàng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=danhsachdonhang">Danh sách đơn hàng</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <?php
            if(isset($_GET['page'])){
                $page = $_GET['page'];
                if($page=="trangquantri"){
                    include_once "dashboard.php";
                }elseif($page=="danhsachsanpham")
				{
					include_once "sp_danhsach.php";
				}elseif($page=="themmoisanpham")
				{
					include_once "sp_themmoi.php";
				}
				elseif($page=="suasanpham")
				{
					include_once "sp_sua.php";
				}
				elseif($page=="suasanphamhinh")
				{
					include_once "sp_suahinhanh.php";
				}
				elseif($page=="danhsachloaisanpham")
				{
					include_once "lsp_danhsach.php";
				}
				elseif($page=="themmoiloaisanpham")
				{
					include_once "lsp_themmoi.php";
				}
				elseif($page=="sualoaisanpham")
				{
					include_once "lsp_sua.php";
				}
				elseif($page=="danhsachnhasanxuat")
				{
					include_once "nsx_danhsach.php";
				}
				elseif($page=="themmoinhasanxuat")
				{
					include_once "nsx_themmoi.php";
				}
				elseif($page=="suanhasanxuat")
				{
					include_once "nsx_sua.php";
				}
				elseif($page=="danhsachkhuyenmai")
				{
					include_once "km_danhsach.php";
				}
				elseif($page=="suakhuyenmai")
				{
					include_once "km_sua.php";
				}
				elseif($page=="themmoikhuyenmai")
				{
					include_once "km_themmoi.php";
				}
				elseif($page=="danhsachtintuc")
				{
					include_once "tt_danhsach.php";
				}
				elseif($page=="themmoitintuc")
				{
					include_once "tt_themmoi.php";
				}
				elseif($page=="suatintuc")
				{
					include_once "tt_sua.php";
				}
				elseif($page=="danhsachhinhthucthanhtoan")
				{
					include_once "httt_danhsach.php";
				}
				elseif($page=="suahinhthucthanhtoan")
				{
					include_once "httt_sua.php";
				}
				elseif($page=="danhsachkhachhang")
				{
					include_once "kh_danhsach.php";
				}
				elseif($page=="danhsachgopydv")
				{
					include_once "gopydv_danhsach.php";
				}
				elseif($page=="danhsachgopysp")
				{
					include_once "gopysp_danhsach.php";
				}
				elseif($page=="danhsachdonhang")
				{
					include_once "hd_danhsach.php";
				}
            }else{
                include_once "dashboard.php";
            }
        ?>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
	<!--ckEditor-->
    <script type="text/javascript" language="javascript" src="ckeditor/ckeditor.js" ></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>

</html>
