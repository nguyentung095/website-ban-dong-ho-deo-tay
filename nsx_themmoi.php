
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small></small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <h1 class="page-header">Nhà sản xuất
                        <small>Thêm mới</small>
                        </h1>
                        <?php 
                            include '../connection.php';
                            $txtTenNhaSanXuat = "";
                            $loi = "";
                            if(isset($_POST['btn_them_nsx']))
                            //echo 'submitne';
                            echo $txtTenNhaSanXuat = trim($_POST['txtTenNhaSanXuat']);
                            $sql = "select nsx_ten from nhasanxuat where nsx_ten='.$txtTenNhaSanXuat.'";
                            $query = mysqli_query($conn, $sql);
                            if($query>0) {
                                echo "trung nsx";
                            }
                         ?>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST" enctype="multipart/form-data" name="frmThemNSX" id="frmThemNSX">
                            <div class="form-group">
                                <label>Tên nhà sản xuất</label>
                                <input type="text" class="form-control" name="txtTenNhaSanXuat" id="txtTenNhaSanXuat" placeholder="<?php echo $txtTenNhaSanXuat; ?>" />
                            </div>
                            <button type="submit" name="btn_them_nsx" class="btn btn-default">Thêm mới</button>
                            <button type="reset" class="btn btn-default">Hủy</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->