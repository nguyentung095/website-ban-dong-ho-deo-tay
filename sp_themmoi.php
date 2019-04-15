
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
                        <h1 class="page-header">Sản phẩm
                        <small>Thêm mới</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST" enctype="multipart/form-data" name="frmThemSP" id="frmThemSP">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control" name="txtTenSanPham" id="txtTenSanPham" placeholder="Vui lòng nhập tên sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Loại sản phẩm</label>
                                <select id="slLoaiSanPham" name="slLoaiSanPham" class="form-control">
                                	<option>Vui lòng chọn loại sản phẩm</option>
                                	<option value="1">Đồng hồ kim</option>
                                    <option value="2">Đồng hồ điện tử</option>
                                    <option value="3">Đồng hồ thông minh</option>
                                </select>
                            </div>
                            <div class="form-group">
                               <label>Nhà sản xuất</label>
                                <select id="slNhaSanXuat" name="slNhaSanXuat" class="form-control">
                                	<option>Vui lòng chọn nhà sản xuất</option>
                                	<option value="1">Casio</option>
                                    <option value="2">DW</option>
                                    <option value="3">Orient</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Khuyến mãi</label>
                                <select id="slKhuyenMai" name="slKhuyenMai" class="form-control">
                                	<option>Vui lòng chọn khuyến mãi</option>
                                	<option value="1">Không có khuyến mãi</option>
                                    <option value="2">Giảm 30%</option>
                                    <option value="3">Giảm 10%</option>
                                </select>
                            </div>
                             <div class="form-group">
                                <label>Sản phẩm giá</label>
                                <input type="number" class="form-control" name="txtGia" id="txtGia" placeholder="Vui lòng nhập giá cho sản phẩm" />
                            </div>
                             <div class="form-group">
                                <label>Mô tả ngắn</label>
                                <input type="text" class="form-control" name="txtMoTaNgan" id="txtMoTaNgan" placeholder="Vui lòng nhập mô tả ngắn cho sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Mô tả chi tiết</label>
                                <textarea name="txtMoTaChiTiet" id="txtMoTaChiTiet" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Người sử dụng</label><br>
                                <input type="radio" name="rdNguoiDung" id="Nam" value="Nam" class="radio-inline" checked/>Nam
                                <input type="radio" name="rdNguoiDung" id="Nu" value="Nu" class="radio-inline"/>Nữ
                                <input type="radio" name="rdNguoiDung" id="Khac" value="Khac" class="radio-inline"/>Khác
                            </div>
                            <div class="form-group">
                                <label>Màu</label>
                                <input type="text" class="form-control" name="txtMau" id="txtMau" placeholder="Vui lòng nhập màu cho sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Loại dây</label>
                                <input type="text" class="form-control" name="txtLoaiDay" id="txtLoaiDay" placeholder="Vui lòng nhập loại dây cho sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" name="txtHinh" id="txtHinh" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mô tả hình ảnh</label>
                                <input type="text" class="form-control" name="txtMoTaHinh" id="txtMoTaHinh" placeholder="Vui lòng nhập mô tả hình ảnh cho sản phẩm" />
                                </div>
                            <div class="form-group">
                                <label>Kích thước(mm)</label>
                                <input type="number" class="form-control" name="txtKichThuoc" id="txtKichThuoc" placeholder="Vui lòng nhập kích thước cho sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Thời gian bảo hành</label>
                                <input type="number" class="form-control" name="txtBaoHanh" id="txtBaoHanh" placeholder="Vui lòng nhập thời gian bảo hành cho sản phẩm" />
                            </div>
                            <button type="submit" class="btn btn-default">Thêm mới</button>
                            <button type="reset" class="btn btn-default">Hủy</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->