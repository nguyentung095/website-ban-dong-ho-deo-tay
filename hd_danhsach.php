
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
    //
    //
    
    $sql_dh = "select * from donhangchitiet order by dh_id desc";
    $query_dh = mysqli_query($conn, $sql_dh);
    $dataArr_dh=array();
    while($row=mysqli_fetch_assoc($query_dh)){
        $dataArr_dh[]=$row;
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
                        <h1 class="page-header">Hóa đơn sửa
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <?php 
                        
                        /*echo '<pre>';
                        print_r($dataArr_dh);
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
                            <?php foreach($dataArr_dh as $key => $value): 
                                  
                                ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $key+1; ?></td>
                                <td><?php echo $value['kh_ten']; ?></td>
                                <td><?php
                                 $ngaynhap =  $value['ngaynhap']; 
                                 $dh_ngaygiao_ngay = substr($ngaynhap, 8, 2);
                                 $dh_ngaygiao_thang = substr($ngaynhap, 5, 2);
                                 $dh_ngaygiao_nam = substr($ngaynhap, 0, 4);

                                 echo $ngaygiao = $dh_ngaygiao_ngay.'/'.$dh_ngaygiao_thang.'/'.$dh_ngaygiao_nam;
                                 ?></td>
                                <td><?php
                                 $ngaygiao =  $value['ngaygiao']; 
                                 $dh_ngaygiao_ngay = substr($ngaygiao, 8, 2);
                                 $dh_ngaygiao_thang = substr($ngaygiao, 5, 2);
                                 $dh_ngaygiao_nam = substr($ngaygiao, 0, 4);

                                 echo $ngaygiao = $dh_ngaygiao_ngay.'/'.$dh_ngaygiao_thang.'/'.$dh_ngaygiao_nam;
                                 ?></td>
                                <td style="text-align: left;"><?php echo $value['diachigiao'] ?></td>
                                <td style="text-align: left;"><?php echo $value['nguoinhan']; ?></td>
                                <td><?php
                                    $sanpham = json_decode($value['sp_info'], true);
                                        /*echo '<pre>';
                                        print_r($sanpham);
                                        echo '</pre>';*/
                                    foreach($sanpham as $key => $value_sp){
                                        if(count($sanpham)>1) {
                                            echo $value_sp['sp_ten'].',... ';
                                            break;
                                        }
                                        else if(count($sanpham)==1) {
                                            echo $value_sp['sp_ten'];
                                        }
                                        
                                    } 
                                ?></td>
                                <td><?php
                                $total=0;
                                    foreach($sanpham as $key => $value_sp){
                                        $total += $value_sp['sp_gia']*$value_sp['sp_sl'];
                                        
                                    }
                                    $total1 = substr($total, 0, 3);
                                    $total1_7 = substr($total, 0, 1);
                                    $total1_8 = substr($total, 0, 2);
                                    $total2 = substr($total, 3, 3);
                                    $total2_7 = substr($total, 1, 3);
                                    $total2_8 = substr($total, 2, 3);
                            //$gia3 = substr($gia, 6, 3);
                                    $total3_7 = substr($total, 4, 3);
                                    $total3_8 = substr($total, 5, 3);
                                    if(strlen($total)<7){
                                        echo $total1.'.'.$total2.'đ';
                                    }
                                    else if(strlen($total)==7) {
                                        echo $total1_7.'.'.$total2_7.'.'.$total3_7.'đ';
                                    }
                                    else if(strlen($total)==8) {
                                        echo $total1_8.'.'.$total2_8.'.'.$total3_8.'đ';
                                    }
                                ?> </td>
                                <td>
                                    <?php 
                                        if($value['httt']==0) {
                                            echo '<span  style="color: red;">Chưa thanh toán</span>';
                                        }
                                        else {
                                            echo 'Đã thanh toán';
                                        } 
                                        
                                     ?>
                                </td>
                                
                                <td><a href="#"><button type="button" data-toggle="modal" data-target="#chitiethoadon_0<?php echo $value['dh_id']; ?>" class="btn btn-primary">Xem chi tiết</button></a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Xóa</a></td>
                            </tr>



                            
                        <?php endforeach ?>
                        </tbody>
                    </table>
                    <!-- phan xem chi tiet hoa don -->
                    <?php foreach($dataArr_dh as $key => $value_modal): ?>
                        <div class="modal fade" id="chitiethoadon_0<?php echo $value_modal['dh_id']; ?>" role="dialog">
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
                                            <p>Địa chỉ: <?php echo $value_modal['diachigiao']; ?> </p>
                                            <small><strong>Mã hóa đơn:</strong> <?php echo $value_modal['dh_id']; ?></small>
                                            <p>
                                               <strong> Ngày lập hóa đơn</strong>:<small> <?php echo $ngaygiao; ?></small>
                                            </p>
                                </div>
                                <!-- end body o1 -->
                               <!--  body 02 -->
                                <div class="modal-body">
                                            <label>Tên khách hàng:</label>  <?php echo $value_modal['kh_ten']; ?><br />
                                            <label>Số điện thoại:</label>  <?php echo $value_modal['kh_sdt']; ?><br />
                                            <label>Địa chỉ nhận hàng: </label><?php echo $value_modal['diachigiao']; ?><br />
                                            <label>Tên người nhận:  </label> <?php echo $value_modal['nguoinhan']; ?><br />
                                            <label>Trạng thái thanh toán:  </label> 
                                            <?php 
                                                if($value_modal['httt'] == 1) {
                                                    echo 'Đã thanh toán';
                                                }
                                                else {
                                                    echo '<span style="color:red">Chưa thanh toán</span>';
                                                }
                                            ?>
                                            <br />
                                            <label>Danh sách sản phẩm:</label><br />
                                            <table class="table table-hover">
                                                <thead>
                                                    <th>STT</th>
                                                    <th style="text-align: center;">Tên sản phẩm</th>
                                                    <th style="text-align: center;">Số lượng sản phẩm</th>
                                                    <th>Hình sản phẩm</th>
                                                    <th>Giá</th>
                                                </thead>
                                                <tbody>

                                                    <?php $total_price=0; $i=1; foreach(json_decode($value_modal['sp_info'], true) as $key => $value_spinfo): ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td style="text-align: center;"><?php echo $value_spinfo['sp_ten']; ?></td>
                                                        <td style="text-align: center;"><?php echo $value_spinfo['sp_sl']; ?></td>
                                                        <td><img src="image/<?php echo $value_spinfo['sp_hh']; ?>" style="height:100px;width:100px;" /></td>
                                                        <td><?php
                                                            $gia=$value_spinfo['sp_gia']*$value_spinfo['sp_sl'];
                                    
                                    $total_price+=$gia;

                                    $gia1 = substr($gia, 0, 3);
                                    $gia1_7 = substr($gia, 0, 1);
                                    $gia1_8 = substr($gia, 0, 2);
                                    $gia2 = substr($gia, 3, 3);
                                    $gia2_7 = substr($gia, 1, 3);
                                    $gia2_8 = substr($gia, 2, 3);
                            //$gia3 = substr($gia, 6, 3);
                                    $gia3_7 = substr($gia, 4, 3);
                                    $gia3_8 = substr($gia, 5, 3);
                                    if(strlen($gia)<7){
                                        $gia2 = $gia1.'.'.$gia2.'đ';
                                    }
                                    else if(strlen($gia)==7) {
                                        $gia2 = $gia1_7.'.'.$gia2_7.'.'.$gia3_7.'đ';
                                    }
                                    else if(strlen($gia)==8) {
                                        $gia2 = $gia1_8.'.'.$gia2_8.'.'.$gia3_8.'đ';
                                    } 

                                    echo $gia2;

                                                         ?></td>
                                                    </tr>
                                                <?php $i++; endforeach ?>
                                                <tr>
                                                        <td colspan="4" style="text-align:left;"><strong>Tổng tiền:</strong></td>
                                                        <td style="color:red;">
                                                    <?php 
                                                        //echo $total_price;
                                                        $gia1 = substr($total_price, 0, 3);
                                    $gia1_7 = substr($total_price, 0, 1);
                                    $gia1_8 = substr($total_price, 0, 2);
                                    $gia2 = substr($total_price, 3, 3);
                                    $gia2_7 = substr($total_price, 1, 3);
                                    $gia2_8 = substr($total_price, 2, 3);
                            //$gia3 = substr($gia, 6, 3);
                                    $gia3_7 = substr($total_price, 4, 3);
                                    $gia3_8 = substr($total_price, 5, 3);
                                    if(strlen($total_price)<7){
                                        $gia2 = $gia1.'.'.$gia2.'đ';
                                    }
                                    else if(strlen($total_price)==7) {
                                        $gia2 = $gia1_7.'.'.$gia2_7.'.'.$gia3_7.'đ';
                                    }
                                    else if(strlen($total_price)==8) {
                                        $gia2 = $gia1_8.'.'.$gia2_8.'.'.$gia3_8.'đ';
                                    }
                                    echo $gia2;
                                                     ?>
                                                        </td>
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