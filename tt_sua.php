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
                    <small>Sửa</small>
                </h1>
                <?php 
                
                include '../connection.php';

                if(isset($_GET['ma'])) {

                    $tt_id = $_GET['ma'];
                    $sql = "select * from tintuc where tt_id=".$tt_id;
                    $query = mysqli_query($conn, $sql);

                    $dataArr = array();
                    $dataArr[] = mysqli_fetch_assoc($query);
                    //echo $dataArr[0]['tt_id'];


    //-------------------------------

                    if(isset($_POST['btnSuaMoitt'])) {
                        $file = $_FILES['fileHinhTT'];
                        $tt_chude = isset($_POST['btnSuaMoitt']) ? trim($_POST['txtTenTinTuc']) : '';
                        $tt_noidung = isset($_POST['btnSuaMoitt']) ? trim($_POST['txtChiTietTinTuc']) : '';
                        $tt_hinhanh = $file['name'];
                        if($tt_hinhanh != "") {
                            
                            $tt_hinhanh = $file['name'];
                        }
                        else {
                            $tt_hinhanh = $dataArr[0]['tt_hinhanh'];
                        }

                        //echo $tt_hinhanh;
                        
                        /*echo '<pre>';
                        print_r($file);
                        echo '</pre>';*/
                       $tt_id = $dataArr[0]['tt_id'];
                       $sql = "update tintuc set tt_chude='".$tt_chude."', tt_noidung='".$tt_noidung."', tt_hinhanh='".$tt_hinhanh."' where tt_id=$tt_id";
                       if(mysqli_query($conn, $sql)) {
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

                }
                ?>
                
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST" enctype="multipart/form-data" name="frmSuaTinTuc" id="frmSuaTinTuc">
                    <?php foreach($dataArr as $key => $value): ?>
                        <div class="form-group">
                            <label>Tên tin tức</label>
                            <input type="text" class="form-control" name="txtTenTinTuc" id="txtTenTinTuc" value="<?php echo $value['tt_chude']; ?>" />
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea rows="5" name="txtChiTietTinTuc" id="txtChiTietTinTuc" class="form-control"><?php echo $value['tt_noidung']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control" name="fileHinhTT" id="fileHinhTT" value=""  />
                            <div style="margin-top: 15px;"><img width="30%" height="30%" src="image/<?php echo $value['tt_hinhanh']; ?>" alt=""></div>
                        </div>
                    <?php endforeach ?>
                    <button type="submit" name="btnSuaMoitt" class="btn btn-default">Sửa</button>
                   <a href="?page=danhsachtintuc"><button type="button" class="btn btn-default">Hủy</button></a>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
        <!-- /#page-wrapper -->