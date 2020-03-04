<!doctype html>
<?php
	session_start();
 ?>
<html>
<head>
<meta charset="utf-8">
<title>Dang Nhap</title>
</head>

<body>
	<?php include('connect.php'); ?>
    <form method="post">
    	<table bordercolor="#FF0000" align="center" bgcolor="#CC9999">
        	<tr>
            	<td colspan="2"align="center"><h2>Đăng nhập</h2></td>
            </tr>
            <tr>
            	<td>Tài Khoản:</td>
                <td><input type="text" name="txtusername"></td>
            </tr>
             <tr>
            	<td>Mật Khẩu:</td>
                <td><input type="password" name="txtpassword"></td>
            </tr>
            <tr > 		
            	<td height="40px" width="80px" align="center"><input type="submit" name="OK" value="Đăng Nhập"></td>

                <td height="40px" width="80px" align="center"><a href="dangki.php">Đăng Ký</a></td>
            </tr>
            
        </table>
    </form>
    <?php 
		if(isset($_POST['OK']))
		{	//*ganbien
			$username=$_POST['txtusername'];
			$password=$_POST['txtpassword'];
			
	
		 
		 if(empty($username) && empty($password))
		 {
			 echo "<script> alert('Bạn Chưa Nhập Tài Khoản hoặc Mật Khẩu mời Bạn Nhập tài Khoản và Mật Khẩu! ')</script>	";
			 exit;
			 }
			else
			{ 
	
			
			$sql1="SELECT Tendangnhap and Matkhau FROM sach WHERE Tendangnhap='$username' and Matkhau='$password'";
			$querysach1=mysqli_query($conn,$sql1); 
			$row=mysqli_num_rows($querysach1); 
			if($row == 1){ 
							$_SESSION['user']=$username;
							$_SESSION['pass']=$password;
							echo "<script> alert('Đăng Nhập Thành Công')</script>";
							header("location:hienthi.php");
			}
			else {echo"<script> alert('Tên Tài Khoản hoặc mật khẩu không đúng')</script>";};
			
			}
		}
		?>
</body>
</html>