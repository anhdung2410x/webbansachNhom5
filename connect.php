<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Connect</title>
</head>
<body>
<?php 
	$conn = mysqli_connect('localhost','root','','dangky') or die ("No connect");
	mysqli_query($conn,'setnames "utf8"');
?>
</body>
</html>