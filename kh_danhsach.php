<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
               		<div class="col-lg-12">
                        <h1 class="page-header">
                            <small></small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <h1 class="page-header">Thành viên
                            <small>Danh sách</small>
                        </h1>
                        <?php 
                            include '../connection.php';
                            $sql = "select * from khachhang";
                            $query = mysqli_query($conn, $sql);
                            $dataArr = array();
                            while($row=mysqli_fetch_assoc($query)) {
                                $dataArr[] = $row;
                            }
                                
                         ?>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>Tên đăng nhập</th>
                                <th>Tên hiển thị</th>
                                <th>Họ và tên</th>
                                <th>Ngày sinh</th>
                                <th>Giới tính</th>
                                <th>Địa chỉ</th>
                                <th>Sđt</th>
								<th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($dataArr as $key => $value): ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $key+1; ?></td>
                                <td style="text-align: left;"><?php echo $value['kh_tenhienthi']; ?></td>
                                <td style="text-align: left;"><?php echo $value['kh_tendangnhap']; ?></td>
                                <td style="text-align: left;"><?php echo $value['kh_ten']; ?></td>
                                <td style="text-align: left;"><?php
                                    $ngaysinh = $value['kh_ngaysinh'];
                                    $ngay = substr($ngaysinh, 9, 4);
                                    $thang = substr($ngaysinh, 5, 2); 
                                    $nam = substr($ngaysinh, 0, 4);
                                    echo $ngay.'/'.$thang.'/'.$nam; 

                                 ?></td>
                                <td style="text-align: left;"><?php
                                    if($value['kh_gioitinh']==0) {
                                        echo 'Nam';
                                    }
                                    else {
                                        echo 'Nữ';
                                    }
                                 ?></td>
                                <td style="text-align: left;"><?php echo $value['kh_diachi']; ?></td>
                                <td style="text-align: left;"><?php echo $value['kh_sdt']; ?></td>
                                <td style="text-align: left;"><?php echo $value['kh_email']; ?></td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
