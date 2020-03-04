<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Update</title>
</head>
<body>
<?php 
require_once("connect.php");
$ID=$_REQUEST['id']; 
$sql="select * from sach where ID=".$ID;
$query=mysqli_query($conn,$sql);
$num=mysqli_fetch_array($query); 
?>
	
    <form method="post" enctype="multipart/form-data" >
    	<table align="center" width="800px" cellpadding="1" cellspacing="1" border="1px solid">
            <tr>
            	<td colspan="2" style="text-align:center">Cập nhật sách</td>
            </tr>
             <tr>
            
            	<td style="color:#F00">Tên đăng nhập:</td>
                <td><input type="text" name="txttendangnhap" value="<?php echo $num['Tendangnhap'];?>"/></td>
            </tr>
            <tr>
            
            	<td style="color:#F00">Tên sách</td>
                <td><input type="text" name="txttensach" value="<?php echo $num['Tensach'];?>"/></td>
            </tr>
              <tr>
            	<td  style="color:#F00">Giá tiền</td>
                <td><input type="text" name="txtgiatien" value="<?php echo $num['Giatien'];?>" /></td>
            </tr>
              
              <tr>
            	<td  style="color:#F00">Ảnh </td>
            	<td><img src="img/<?php echo $num['Anh']; ?> " height="100px" width="100px" ><input type="file" name="txtanh"></td>
            </tr>
              <tr>
              	<td colspan="2" style="text-align:center"  style="color:#F00"><a href="hienthi.php?id'<?php echo $num['ID'];?>'"><input type="submit" name="ok" value="Cập nhật sách"></a></td>
              </tr>
        </table>
    </form>
<?php 
	if(isset($_POST['ok'])){
	$tendangnhap=$_POST['txttendangnhap'];
	$tensach=$_POST['txttensach'];
	$giatien=$_POST['txtgiatien'];
	
	$anh=$_POST['txtanh'];
	
	$a=$_FILES['txtanh']['tmp_name'];
	$b=$_FILES['txtanh']['name'];
	$c= move_uploaded_file($a,'img/'.$b);
	$sql1="UPDATE sach SET Tendangnhap='$tendangnhap',Tensach='$tensach',Giatien='$giatien',Anh='$b' where ID='$ID' ";
	$query1=mysqli_query($conn,$sql1);
	if($query){
		header("location:hienthi.php");
	}
	else{echo"<script> alert('Ten tai khoan hoac mat khau khong dung')</script>";};
	}
?>
    
</body>
</html>