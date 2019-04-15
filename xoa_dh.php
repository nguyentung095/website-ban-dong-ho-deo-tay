<?php 
	include '../connection.php';
	$dh_id = $_GET['ma'];
	//thuc hien xoa donhang, 
	 $sql = "delete from donhang where dh_id =$dh_id";
	 $query = mysqli_query($conn, $sql);
	 //neu don hang dc xoa, thi tien hanh xoa don hang trong bang co chua fk
	 if($query) {
	 	//tien hanh xoa don hang trong bang sanphamdonhang
	 	$sql2 = "delete from sanphamdonhang where dh_id =$tt_id";
	 	header('location: index.php?page=danhsachdonhang');
	 }
 ?>