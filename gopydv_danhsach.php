<script language="javascript">
    function deleteConfirm(){
      if(confirm("Bạn có chắc chắn muốn xóa!")){
        return true;
      }
       else{
          return false;
           }
}
</script>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">
                <small></small>
            </h1>
        </div>
        <div class="col-lg-12">
            <h1 class="page-header">Phản hồi về dịch vụ của khách hàng
                <small>Danh sách</small>
            </h1>
            <?php 
            include '../connection.php';

                //lay data cua bảng gop ý dich vụ cua khach hang
            $sql = "select gdv.gopydv_id, kh.kh_ten, gdv.gopydv_chude, gdv.gopydv_noidung, gdv.gopydv_ngay, gdv.gopydv_trangthai
            from gopydichvu gdv
            join khachhang kh on gdv.kh_id = kh.kh_id

            ";
            $query = mysqli_query($conn, $sql);
            $dataArr = array();
            while($row = mysqli_fetch_assoc($query)) {
                $dataArr[] = $row;
            }
            /*echo '<pre>';
            print_r($dataArr);
            echo '</pre>';*/

            // thuc hien tra loi phan hoi ve dich vu cho khach hang
            $phdv_noidung = "";
            $gopydv_id = "";
            $phdv_ngay = "";
            if(isset($_POST['btnTLPhanHoiDV'])) {
                //echo 'nhan nut submit roi nè';
                //thuc hien tra loi phan hoi ve vu
                //la them phdv_noidung, phdv_ngay (cho tu dong thêm như gio hien tại), gopydv_id (cho truong nay hidden trong form) vao bang phanhoidichvu
                //dong thoi cap nhat lai gopydv_trangthai trong bang
                //gopydichvu
                $phdv_noidung = trim($_POST['txtNoiDung']);
                $phdv_ngay = trim($_POST['txtNgay']);
                $gopydv_id = trim($_POST['txtgopydvid']);

                $phdv_ngay02 = date('Y-m-d', $phdv_ngay);

                $sql = "insert into phanhoidichvu(gopydv_id, phdv_noidung, phdv_ngay) values('$gopydv_id', '$phdv_noidung', '$phdv_ngay02')";
                $query = mysqli_query($conn, $sql);

                //neu them thanh cong, thì thuc hien update lai gopydv_trangthai
                if($query) {
                    $sql2 = "update gopydichvu set gopydv_trangthai='1' where gopydv_id='$gopydv_id'";
                    mysqli_query($conn, $sql2);
                    echo "<script language='javascript'>window.location='index.php?page=danhsachgopydv'</script>";
                }
            }

            ?>
        </div>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>STT</th>
                    <th>Khách hàng</th>
                    <th>Chủ đề</th>
                    <th>Nội dung</th>
                    <th>Ngày góp ý</th>
                    <th style="width:30px">Xóa</th>
                    <th style="width:100px;">Trạng thái</th>
                </tr>
            </thead>
            <tbody>
             <form name="frmSub" id="frmSub" action="" method="">
                <?php foreach($dataArr as $key => $value): ?>
                    <tr class="odd gradeX" align="center">
                        <td><?php echo $value['gopydv_id']; ?></td>
                        <td><?php echo $value['kh_ten']; ?></td>
                        <td><?php echo $value['gopydv_chude']; ?></td>
                        <td><?php echo $value['gopydv_noidung']; ?></td>
                        <td><?php echo $value['gopydv_ngay'] ?></td>
                        <td class="center">
                          <?php 
                          $gopydv_id = $value['gopydv_id'];
                          if($value['gopydv_trangthai'] == 1) {
                            echo '<div style="">
                            <i class="fa fa-trash-o  fa-fw"></i><a onclick="return deleteConfirm()" href="xoa_gopydv.php?ma='.$gopydv_id.'"> Xóa</a>
                            </div>';
                          }
                          else {
                            echo '<div style="opacity:0.3">
                            <i class="fa fa-trash-o  fa-fw"></i>Xóa
                            </div>';
                          }
                           ?>
                          
                        </td>
                        <td><a href="#">
                            <?php 
                            if($value['gopydv_trangthai'] == 0) {
                                echo '<button type="button" data-toggle="modal" data-target="#phanhoigopy'.$key.'" class="btn btn-danger">Chưa trả lời</button>';
                            }
                            else {
                                echo '<button type="button" data-toggle="modal" data-target="#phanhoigopy'.$key.'" class="btn btn-primary">Đã trả lời</button>';
                            }
                            ?>
                        </a></td>
                    </tr>
                <?php endforeach ?>
            </form>
        </tbody>
    </table>

    <?php foreach($dataArr as $key => $value): ?>
        <form name="frm" action="" method="post">

            <div class="modal fade" id="phanhoigopy<?php echo $key; ?>" role="dialog">
             <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">

                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Trả lời góp ý về dịch vụ</h4>
                 </div>
                 <div class="modal-body">
                     <div class="form-group">
                         <label>Chủ đề góp ý:</label>
                         <input readonly="" required="" type="text" name="txtChuDe" class="form-control" id="txtChuDe" value="<?php echo $value['gopydv_chude']; ?>" />
                     </div>
                     <div class="form-group">
                         <label>Nội dung góp ý:</label>
                         <textarea readonly="" name="txtNoiDung" rows="5" class="form-control"  id="txtNoiDung"><?php echo $value['gopydv_noidung']; ?></textarea>
                     </div>
                     <div class="form-group">
                         <label>Nội dung phản hồi:</label>
                         <textarea required="" name="txtNoiDung" rows="5" class="form-control"  id="txtNoiDung" placeholder="Nội dung phản hồi"></textarea>
                         <input type="hidden" name="txtNgay" class="form-control" id="txtNgay" value="<?php echo time(); ?>" />
                         <input type="hidden" name="txtgopydvid" class="form-control" id="txtgopydvid" value="<?php echo $dataArr[$key]['gopydv_id']; ?>" />
                     </div>
                 </div>
                 <div class="modal-footer">
                  <button type="submit" name="btnTLPhanHoiDV" class="btn btn-success">Gửi phản hồi</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
              </div>
          </div>
      </div>
  </div>
  <!-- end model -->
</form>
<?php endforeach ?>
</div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
