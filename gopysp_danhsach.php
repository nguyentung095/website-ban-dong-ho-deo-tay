

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
            <?php 
            include '../connection.php';

                //thuc hiien lay data từ bảng gopysp va bang khachang
            $sql = "
            select gysp.gopysp_id, gysp.gopysp_chude, gysp.gopysp_ngay, 
            gysp.gopysp_noidung, gysp.gopysp_trangthai, kh.kh_ten, sp.sp_ten  
            from gopysp gysp join khachhang kh 
            on kh.kh_id = gysp.kh_id 
            join sanpham sp 
            on sp.sp_id = gysp.sp_id
            ";
            $query = mysqli_query($conn, $sql);
            $dataArr = array();
            while($row = mysqli_fetch_assoc($query)) {
                $dataArr[] = $row;
            }
           /* echo '<pre>';
            print_r($dataArr);
            echo '</pre>';*/

            //thuc hien them tra loi phan hoi ve san pham cho khach hang
            $phsp_noidung = "";
            $gopysp_id = "";
            $phsp_ngay = "";
            if(isset($_POST['btnTLPhanHoiSP'])) {
                //echo 'nhan nut submit roi nè';
                //thuc hien tra loi phan hoi ve vu
                //la them phdv_noidung, phdv_ngay (cho tu dong thêm như gio hien tại), gopydv_id (cho truong nay hidden trong form) vao bang phanhoidichvu
                //dong thoi cap nhat lai gopydv_trangthai trong bang
                //gopydichvu
                $phsp_noidung = trim($_POST['txtNoiDung']);
                $phsp_ngay = trim($_POST['txtNgay']);
                $gopysp_id = trim($_POST['txtgopyspid']);

                $phsp_ngay02 = date('Y-m-d', $phsp_ngay);

                $sql = "insert into phanhoisp(gopysp_id, phsp_noidung, phsp_ngay) values('$gopysp_id', '$phsp_noidung', '$phsp_ngay02')";
                $query = mysqli_query($conn, $sql);

                //neu them thanh cong, thì thuc hien update lai gopydv_trangthai
                if($query) {
                    $sql2 = "update gopysp set gopysp_trangthai='1' where gopysp_id='$gopysp_id'";
                    mysqli_query($conn, $sql2);
                    echo "<script language='javascript'>window.location='index.php?page=danhsachgopysp'</script>";
                }
            }
            ?>
        </div>
        <div class="col-lg-12">
            <h1 class="page-header">Góp ý về sản phẩm của khách hàng
                <small>Danh sách</small>
            </h1>
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
                    <th>Tên sản phẩm</th>
                    <th style="width:30px">Xóa</th>
                    <th style="width:100px;">Trạng thái</th>
                </tr>
            </thead>
            <tbody>
             <form name="frmSub" id="frmSub" action="" method="">
                <?php $i=1; foreach($dataArr as $key => $value): ?>
                <tr class="odd gradeX" align="center">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $value['kh_ten']; ?></td>
                    <td><?php echo $value['gopysp_chude']; ?></td>
                    <td><?php echo $value['gopysp_noidung']; ?></td>
                    <td><?php echo $value['gopysp_ngay'] ?></td>
                    <td><?php echo $value['sp_ten']; ?></td>
                    <td class="center">
                      <?php 
                          $gopysp_id = $value['gopysp_id'];
                          if($value['gopysp_trangthai'] == 1) {
                            echo '<div style="">
                            <i class="fa fa-trash-o  fa-fw"></i><a onclick="return deleteConfirm()" href="xoa_gopysp.php?ma='.$gopysp_id.'"> Xóa</a>
                            </div>';
                          }
                          else {
                            echo '<div style="opacity:0.3">
                            <i class="fa fa-trash-o  fa-fw"></i> Xóa
                            </div>';
                          }
                           ?>
                    </td>
                    <td><a href="#">
                        <?php 
                        if($value['gopysp_trangthai'] == 0) {
                            echo '<button type="button" data-toggle="modal" data-target="#phanhoigopy'.$key.'" class="btn btn-danger">Chưa trả lời</button>';
                        }
                        else {
                            echo '<button type="button" data-toggle="modal" data-target="#phanhoigopy'.$key.'" class="btn btn-primary">Đã trả lời</button>';
                        }
                        ?>
                    </a></td>
                </tr>
                <?php $i++; endforeach ?>
            </form>
        </tbody>
    </table>
    <?php foreach($dataArr as $key => $value): ?>
        <form action="" method="post">
          <div class="modal fade" id="phanhoigopy<?php echo $key; ?>" role="dialog">
             <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <form name="frm" action="" method="post">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Trả lời góp ý về dịch vụ</h4>
                 </div>
                 <div class="modal-body">
                     <div class="form-group">
                         <label>Chủ đề góp ý:</label>
                         <input readonly="" type="text" name="txtChuDe" class="form-control" id="txtChuDe" value="<?php echo $value['gopysp_chude']; ?>" />
                     </div>
                     <div class="form-group">
                         <label>Nội dung góp ý:</label>
                         <textarea readonly="" name="txtNoiDung" rows="5" class="form-control"  id="txtNoiDung"><?php echo $value['gopysp_noidung']; ?></textarea>
                     </div>
                     <div class="form-group">
                         <label>Nội dung phản hồi:</label>
                         <textarea required="" name="txtNoiDung" rows="5" class="form-control"  id="txtNoiDung"></textarea>
                         <input type="hidden" name="txtNgay" class="form-control" id="txtNgay" value="<?php echo time(); ?>" />
                         <input type="hidden" name="txtgopyspid" class="form-control" id="txtgopydvid" value="<?php echo $dataArr[$key]['gopysp_id']; ?>" />
                     </div>
                 </div>
                 <div class="modal-footer">
                  <button type="submit" name="btnTLPhanHoiSP" class="btn btn-success">Gửi phản hồi</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
              </div></form>
          </div>
      </div>
  </div>
</div>
</form>
<?php endforeach ?>
<!-- end model -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
