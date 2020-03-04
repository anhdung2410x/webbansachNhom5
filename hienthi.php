<!DOCTYPE HTML>
<?php 
	 session_start();
	 require("connect.php");
	 $us=$_SESSION['user'];
	 $sqlimg="select * from sach where Tendangnhap='$us'";
	 $queryimg=mysqli_query($conn,$sqlimg);
	 $reimg = array();
	 while($rowimg = mysqli_fetch_assoc($queryimg)){
		 array_push($reimg,$rowimg);
	 }
?>

<html>
<head>
<meta charset="utf-8">
<title>Hien thi</title>
<style>td{border:1px solid;}</style>
</head>

<body>
<?php 
	echo "Xin chào ".$us
?><a href="dangxuat.php">Thoát</a>
<div class='contimg'>
	<?php foreach($reimg as $i){?>
	<img class="img" height="100px" width="100px"src="img/<?php echo $i['Anh']?>"/> <?php }?>
</div>
<h1 style="text-align:center">Danh sách sản phẩm</h1>

<form method="get">

	<table style="border:1px solid" cellpadding="1" cellspacing="1" align="center">
    <tr style="border:1px solid;text-align:center">
    	<td  style="color:#F00">Mã</td>
        <td  style="color:#F00">Tên đăng nhập</td>
        <td  style="color:#F00">Tên sách</td>
        <td  style="color:#F00">Giá tiền</td>
        <td  style="color:#F00">Ảnh</td>
        <td colspan="2"  style="color:#F00">Chức năng</td>
       </tr>
       <?php 
	   	include('connect.php');
		$sql="select * from sach";
		$query=mysqli_query($conn,$sql);
		while($item=mysqli_fetch_array($query))
	   {?>


<tr>
	<td style="text-align:center"><?php echo $item['ID']?></td>
	<td style="text-align:center"><?php echo $item['Tendangnhap']?></td>
    <td style="text-align:center"><?php echo $item['Tensach']?></td>
    <td style="text-align:center"><?php echo $item['Giatien']?></td>
     <td><img src="img/<?php echo $item['Anh']; ?>" width="50" height="50"></td>
    <td style="text-align:center"><a href="update.php?id=<?php echo $item['ID'] ?>">Sửa</a></td>
    <td style="text-align:center"><a href="delete.php?id=<?php echo $item['ID']?>"onclick="if(confirm('Bạn có chắc chắn muốn xóa?'))return true;
    else return false;">Xóa</a></td> 
</tr>
<?php } ?>
</table>
</form>     
	
      
</body>
</html>