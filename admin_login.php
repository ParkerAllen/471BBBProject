<?php
	include_once 'dbhinc.php';
	
	if(isset($_POST["login"])){
		$name = $_POST['adminname'];
		$pin = $_POST['pin'];
		
		if($name != "" && $pin != "")
		{
			$sql = "Select count(*) From BBB_admin Where admin_name like '{$name}' and pin = {$pin};";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
			
			if($row[0] > 0)
			{
				header("Location:admin_tasks.php");
				exit();
			}
		}
	}
?>
<!DOCTYPE HTML>
<head>
<title>Admin Login</title>
</head>

<body>
<table align="center" style="border:2px solid blue;">
		<form action="" method="post" id="adminlogin_screen">
		<tr>
			<td align="right">
				Adminname<span style="color:red">*</span>:
			</td>
			<td align="left">
				<input type="text" name="adminname" id="adminname">
			</td>
			<td align="right">
				<input type="submit" name="login" id="login" value="Login">
			</td>
		</tr>
		<tr>
			<td align="right">
				PIN<span style="color:red">*</span>:
			</td>
			<td align="left">
				<input type="password" name="pin" id="pin">
			</td>
			</form>
			<form action="index.php" method="post" id="login_screen">
			<td align="right">
				<input type="submit" name="cancel" id="cancel" value="Cancel">
			</td>
			</form>
		</tr>
	</table>
</body>

</html>
