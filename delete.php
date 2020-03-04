



<?php
	require_once("connect.php");
	$id= $_GET['id'];
	$sql= "delete from sach where ID = '$id'";
	$query=mysqli_query($conn,$sql);
	if($query){
		header('location:hienthi.php');
	}
	
?>