<div id="page-wrapper">
<div class="container-fluid">
    	<div class="row">
        	<div></div>
			<div class="col-lg-6">
            <div class="col-lg-12">
                   <h1 class="page-header">
                     <small></small>
                   </h1>
                </div>
            	<div class="col-lg-12">
                   <h1 class="page-header">Hình ảnh sản phẩm
                     <small>Cập nhật</small>
                   </h1>
                </div>
                <div class="col-lg-12">
                <form action="" method="post" name="frmHinh" id="frmHinh">
                	<div class="form-group">
                	<label>Tên hình ảnh</label>
                    <input type="text" class="form-control" name="txtTenHinh" id="txtTenHinh"  />
                    </div>
                    <div class="form-group">
                	<label>Mô tả</label>
                    <input type="text" class="form-control" name="txtMoTaHinh" id="txtMoTaHinh" />
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Hủy</button>
                </form>
                </div>
            </div>
            <div class="col-lg-5">
            	<div class="col-lg-12">
                   <h1 class="page-header">
                     <small></small>
                   </h1>
                </div>
            	<div class="col-lg-12">
                   <h1 class="page-header">Hình ảnh đã tải lên
                     <small></small>
                   </h1>
                </div>
                <div class="col-lg-12">
                <div class="col-lg-6 img-thumbnail">
                	<a href="image/casio.jpg" target="_blank">
                    <img src="image/casio.jpg" style="width:100px;height:100px;"/>
                    <div class="caption">
                    	<h5>Mặt trước</h5>
                    </div>
                    </a>
                </div>
                <div class="col-lg-6">
                	<h3 style="display:inline"><a href="#" class="fa fa-trash-o ">  Xóa</a></h3>
                </div>
                </div>
                <div class="col-lg-12">
                <div class="col-lg-6 img-thumbnail">
                <a href="image/casio2.jpg" target="_blank">
                	<img src="image/casio2.jpg" style="width:100px;height:100px;"/>
                    <div class="caption">
                    	<h5>Mặt sau</h5>
                    </div>
                    </a>
                </div>
                <div class="col-lg-6">
                	<h3 style="display:inline"><a href="#" class="fa fa-trash-o ">  Xóa</a></h3>
                </div>
                </div>
            </div>        
        </div>
    </div>
</div>
    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

