<?php 
	//header('location: index.php?page=danhsachtintuc');
	include '../connection.php';
	$tt_id = $_GET['ma'];

	 $sql = "delete from tintuc where tt_id =$tt_id";
	 $query = mysqli_query($conn, $sql);
	 if($query) {
	 	header('location: index.php?page=danhsachtintuc');
	 }

 ?>