<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dang ki</title>
</head>

<body>
<?php include('connect.php'); ?>
	<form method="post" enctype="multipart/form-data">
    	<table align="center" width="800px">
        	<span style="color:#930">
         
            <tr>
            	<td colspan="2" style="color:#063;background-color:#C93" >Đăng ký</td>
            </tr>
               <tr>
            	<td>(Nhập Đủ dữ liệu vào phần chữ màu đỏ!)</td>
            </tr>
            <tr>
            	<td style="color:#F00"> Tên Đăng Nhập</td>
                <td ><input type="text" name="txttendangnhap" style="width:200px" ></td>
            </tr>
               <tr>
            	<td style="color:#F00">Mật Khẩu</td>
                <td><input type="password" name="txtmatkhau" style="width:200px"></td>
            </tr>
               <tr>
            	<td style="color:#F00">Nhắc Lại Mật Khẩu</td>
                <td><input type="password" name="txtnhaplaimatkhau" style="width:200px"></td>
            </tr>
            <tr>
            	<td style="color:#F00">Tên sách</td>
                <td><input type="text" name="txttensach" style="width:200px"></td>
            </tr>
            <tr>
            	<td style="color:#F00">Giá tiền</td>
                <td><input type="text" name="txtgiatien" style="width:200px"></td>
            </tr>
               <tr>
            	<td>Ảnh</td>
            	<td><input type="file" name="txtanh"value="Chọn tệp" ></td>
            </tr>
          
           
            <tr>
            	<td rowspan="2" align="center" ><input type="submit" value="Đăng Kí tham gia" name="OK"></td>
                <td><a href="dangnhap.php">Đăng nhập</a></td>
            </tr>
            
        </table>
    </form>
    
    <?php 
		if(isset($_POST['OK']))
			{
				$tendangnhap=$_POST['txttendangnhap'];
				$matkhau=$_POST['txtmatkhau'];
				$nhaclaimatkhau=$_POST['txtnhaplaimatkhau'];
				$tensach=$_POST['txttensach'];
				$giatien=$_POST['txtgiatien'];
				
				
				$a=$_FILES['txtanh']['tmp_name'];
				$b=$_FILES['txtanh']['name'];
				$c= move_uploaded_file($a,'img/'.$b);
				
				if($matkhau != $nhaclaimatkhau)
			{
				echo "<script> alert('Hai mật Khẩu không giống nhau ! Mời Bạn Nhập Lại')</script>";	
				exit;
			}
			     if (!$tensach || !$giatien  || !$tendangnhap || !$matkhau || !$nhaclaimatkhau  )
    {
        echo "<script> alert('Mời Bạn Nhập Đủ Thông Tin ! ')</script>";	
				exit;
    }
	$sql="SELECT Tendangnhap FROM sach WHERE Tendangnhap='$tendangnhap'";
	$querysach1=mysqli_query($conn,$sql);

	if (mysqli_num_rows($querysach1)>0)
	{
        echo "<script> alert('Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác')</script>";
        exit;
    }
   $dinhdang = "/^[A-Za-z0-9_\.]/";
   if(!preg_match($dinhdang ,$tendangnhap))
   {echo  "<script> alert('Tên tài khoản nhập sai mời bạn nhập lại')</script> ";
   exit;}


		
	
	$sqlsach = "insert into sach(Tendangnhap,Matkhau,Nhaclaimatkhau,Tensach,Giatien,Anh) values('$tendangnhap','$matkhau','$nhaclaimatkhau','$tensach','$giatien','$b')";
			$querysach=mysqli_query($conn,$sqlsach);	
	//*duathongbaochonguoidung
		if($querysach) echo "<script> alert('Bạn Đã tạo Tài Khoản Thành Công!')</script>";
		else echo "<script> alert('Bạn Chưa tạo được tài khoản! Xin mời Tạo Lại!')</script>";
	
			
				
			}
	?>
</body>
</html>