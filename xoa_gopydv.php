<?php 
	//header('location: index.php?page=danhsachtintuc');
	include '../connection.php';
	$tt_id = $_GET['ma'];

	 $sql = "delete from gopydichvu where gopydv_id =$tt_id";
	 $query = mysqli_query($conn, $sql);
	 if($query) {
	 	$sql2 = "delete from phanhoidichvu where gopydv_id =$tt_id";
	 	mysqli_query($conn, $sql2);
	 	header('location: index.php?page=danhsachgopydv');
	 }

 ?>