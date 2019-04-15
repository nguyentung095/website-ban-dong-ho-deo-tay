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
                        <h1 class="page-header">Tin tức
                        <small>Thêm mới</small>
                        </h1>
                        <?php 
                            include '../connection.php';

                            $tt_chude="";
                            $tt_noidung="";
                            $tt_hinhanh="";
                            $error="";
                            if(isset($_POST['btnThemMoitt'])) {
                                //echo 'nhan submit roi ne';
                                $file = $_FILES['fileHinhTT'];
                                $tt_chude = isset($_POST['btnThemMoitt']) ? trim($_POST['txtTenTinTuc']) : '';
                                $tt_noidung = isset($_POST['btnThemMoitt']) ? trim($_POST['txtChiTietTinTuc']) : '';
                                $tt_hinhanh = isset($_POST['btnThemMoitt']) ? trim($file['name']) : '';

                                /*echo $tt_chude.'<br>'.$tt_noidung.'<br>'.$tt_hinhanh;
                                echo '<pre>';
                                print_r($file);
                                echo '</pre>';*/

                                $error = "";
                                if($tt_chude=="") {
                                    $error .= "Tiêu đề tin tức không được rỗng!";
                                }
                                else if($tt_noidung=="") {
                                    $error .= "Nội dung tin tức không được rỗng!";
                                }
                                else if($tt_hinhanh =="") {
                                    $error .= "Chọn hình sản phẩm!";
                                }
                                

                                if($error == "") {
                                    $sql = "insert into tintuc(tt_chude, tt_noidung, tt_hinhanh) values('$tt_chude', '$tt_noidung', '$tt_hinhanh')";

                                    $query = mysqli_query($conn, $sql);

                                    if($query) {
                                     if($tt_hinhanh != "") {
                                        //echo "co hinh ne";
                                        $filename       = $file['tmp_name'];
                                        $destination    = 'image/'.$file['name']; 
                                        move_uploaded_file($filename, $destination);
                                        //header('location: index.php?page=danhsachtintuc');
                                        echo "<script language='javascript'>window.location='index.php?page=danhsachtintuc'</script>";
                                        }
                                    }
                                }

                                //$sql = "insert into tintuc values()"



                            }

                         ?>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST" enctype="multipart/form-data" name="frmThemTinTuc" id="frmThemTinTuc">
                            <div class="form-group">
                                <label>Tên tin tức</label>
                                <input required="" title="Nhập tiêu đề tin tức vào!" type="text" class="form-control" name="txtTenTinTuc" id="txtTenTinTuc" value="<?php echo $tt_chude; ?>" placeholder="Vui lòng nhập tên tin tức" />
                                <small class="text-mute"></small>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                               	<textarea required="" title="Nhập nội dung tin tức vào!" rows="5" name="txtChiTietTinTuc" id="txtChiTietTinTuc" class="form-control" placeholder="Vui lòng nhập nội dung tin tức"><?php echo $tt_noidung; ?></textarea>
                                <small class="text-mute"></small>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" class="form-control" name="fileHinhTT" id="fileHinhTT"  />
                                <small style="color: red" class="text-mute"><?php echo $error; ?></small>
                            </div>
                            <button type="submit" name="btnThemMoitt" class="btn btn-default">Thêm mới</button>
                            <button type="reset" class="btn btn-default">Hủy</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->