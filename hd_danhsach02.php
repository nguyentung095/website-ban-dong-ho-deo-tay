
<?php 
    include '../connection.php';

    $sql = "select * 
            from donhang dh join sanphamdonhang sp_dh on dh.dh_id = sp_dh.dh_id
            join sanpham sp on sp.sp_id = sp_dh.sp_id
            join khachhang kh on kh.kh_id = dh.kh_id     
            ";
    $query = mysqli_query($conn, $sql);

    $dataArr = array();
    while($dataArrTamp=mysqli_fetch_assoc($query)){
        $dataArr[] = $dataArrTamp; 
    }



        
 ?>


<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
               		<div class="col-lg-12">
                        <h1 class="page-header">
                            <small></small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <h1 class="page-header">Hóa đơn
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <?php 
                        echo '<pre>';
                        print_r($dataArr);
                        echo '</pre>';
                        $newDataArr = array();
                        foreach($dataArr as $key => $value) {
                            if($dataArr[$key]['dh_id'] == $dataArr[$key+1]['dh_id']) {
                                $newDataArr[$key][]= $dataArr[$key]['dh_id'];
                                $newDataArr[$key][]= $dataArr[$key+1]['dh_id'];

                            }
                            else {
                                $newDataArr[$key][]= $dataArr[$key]['dh_id'];
                            }

                           
                        }
                         /*echo '<pre>';
                            print_r($newDataArr);
                            echo '</pre>';*/
                     ?>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Mã hóa đơn</th>
                                <th>Tên khách hàng</th>
                                <th>Ngày lập</th>
                                <th>Ngày giao</th>
                                <th>Nơi giao</th>
                                <th>Tên người nhận</th>
                                <th>Tên sản phẩm</th>
                                <th>Tổng tiền</th>
								<th>Trạng thái thanh toán</th>
                                <th>Xem chi tiết</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($dataArr as $key => $value): 
                                  
                                ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $value['dh_id']; ?></td>
                                <td><?php echo $value['kh_ten']; ?></td>
                                <td><?php echo $value['dh_ngaynhap']; ?></td>
                                <td><?php echo $value['dh_ngaygiaohang']; ?></td>
                                <td><?php echo $value['dh_noigiaohang'] ?></td>
                                <td><?php echo $value['dh_tennguoinhan']; ?></td>
                                <td><?php echo $value['sp_ten']; ?></td>
                                <td><?php echo $total_price = $value['spdh_soluong']*$value['sp_gia']; ?> VNĐ</td>
                                <td>
                                    <?php 
                                        if($value['httt_id'] == 1) {
                                            echo 'Đã thanh toán';
                                        }
                                        else {
                                            echo 'Chưa thanh toán';
                                        }
                                     ?>
                                </td>
                                
                                <td><a href="#"><button type="button" data-toggle="modal" data-target="#chitiethoadon_0<?php echo $key; ?>" class="btn btn-primary">Xem chi tiết</button></a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Xóa</a></td>
                            </tr>



                            
                        <?php endforeach ?>
                        </tbody>
                    </table>
                    <?php foreach($dataArr as $key => $value): ?>
                        <div class="modal fade" id="chitiethoadon_0<?php echo $key; ?>" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                <form name="frm" action="" method="post">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Chi tiết hóa đơn</h4>
                                </div>
                                <!-- body 01-->
                                <div class="modal-body">
                                            <h4>Cửa hàng đồng hồ đeo tay <strong>Perfect Choisce</strong></h4>
                                            <p>Địa chỉ: Phường An Khánh, Quận Ninh Kiều, Thành phố Cần Thơ </p>
                                            <small><strong>Mã hóa đơn: 001HD</strong></small>
                                            <small>Ngày lập hóa đơn: 20/02/2019</small>
                                </div>
                                <!-- end body o1 -->
                               <!--  body 02 -->
                                <div class="modal-body">
                                            <label>Tên khách hàng:</label>  <?php echo $value['kh_ten']; ?><br />
                                            <label>Số điện thoại:</label>  <?php echo $value['dh_sdt']; ?><br />
                                            <label>Địa chỉ nhận hàng: </label><?php echo $value['dh_noigiaohang']; ?><br />
                                            <label>Tên người nhận:  </label> <?php echo $value['dh_tennguoinhan']; ?><br />
                                            <label>Trạng thái thanh toán:  </label> 
                                            <?php 
                                                if($value['httt_id'] == 1) {
                                                    echo 'Đã thanh toán';
                                                }
                                                else {
                                                    echo 'Chưa thanh toán';
                                                }
                                            ?>
                                            <br />
                                            <label>Danh sách sản phẩm:</label><br />
                                            <table class="table table-hover">
                                                <thead>
                                                    <th>STT</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Hình sản phẩm</th>
                                                    <th>Giá</th>
                                                </thead>
                                                <tbody>
                                                    
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Casio TG230</td>
                                                        <td><img src="image/casio2.jpg" style="height:100px;width:100px;" /></td>
                                                        <td>1.500.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>DW 1200</td>
                                                        <td><img src="image/dw.png" style="height:100px;width:100px;" /></td>
                                                        <td>1.500.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" style="text-align:left;color:red;"><strong>Tổng tiền:</strong></td>
                                                        <td>3.000.000</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            
                                            
                                </div>

                               <!--  end body 02 -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">In hóa đơn</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            </div>
                            <!-- end footer -->
                        </form>
                       <!--  end form -->
                        </div>
                        <!-- end header -->
                    </div>
                    <!-- end content -->
                </div>
               <!--  end modal-dialog -->
                </div>
               <!--  end modal -->
                    <?php endforeach ?>    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

</html>