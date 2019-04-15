<script src="bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
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

<?php 
    include '../connection.php';
    $sql = "select * from tintuc";
    $query = mysqli_query($conn, $sql);

    $dataArr = array();
    while ($dataArrTamp = mysqli_fetch_assoc($query)) {
        $dataArr[] = $dataArrTamp; 
    }
 ?>
<div id="page-wrapper">
            <div class="container-fluid">
                <?php 
                    // echo '<pre>';
                    // print_r($dataArr);
                    // echo '</pre>';
                 ?>
                <div class="row">
               		<div class="col-lg-12">
                        <h1 class="page-header">
                            <small></small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin tức
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th style="width:150px;">Tên tin tức</th>
                                <th>Nội dung</th>
								<th>Hình ảnh</th>
                                <th style="width:40px;">Xóa</th>
                                <th style="width:40px;">Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($dataArr as $key => $value): ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $value['tt_id']; ?></td>
                                <td style="text-align: left"><?php echo $value['tt_chude']; ?></td>
                                <td style="text-align: left;"><p><?php echo $value['tt_noidung']; ?></p></td>
                                <td><img src="image/<?php echo $value['tt_hinhanh']; ?>" style="height:100px;width:100px;" /></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return deleteConfirm()" href="xoa_tt.php?ma=<?php echo $value['tt_id']; ?>"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="index.php?page=suatintuc&ma=<?php echo $value['tt_id']; ?>">Sửa</a></td>
                            </tr>
                        <?php endforeach ?>
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
