<?php
require('db.inc.php');
$msg="";
if(isset($_POST['username']) && isset($_POST['password'])){
 $username=mysqli_real_escape_string($con,$_POST['username']);
 $password=mysqli_real_escape_string($con,$_POST['password']);
 $sql="SELECT * FROM new_table WHERE username='$username' AND password='$password'";
	$res=mysqli_query($con,$sql);
    $count=mysqli_num_rows($res);
 		if($count>0){
 			$row=mysqli_fetch_assoc($res);
 			$_SESSION['ROLE']=$row['role'];
 			$_SESSION['USER_NAME']=$row['username'];
 			$_SESSION['USER_PASSWORD']=$row['password'];
 			header('location: Select.php');
 			die();
 		}else{
 			$msg="Please enter correct login details!";
 		}
}
?>
<html>
	<head>
		<title> Leave Application</title>
	</head>
	<link rel="stylesheet" href="../css/Admin.css">
	<body>
	<a class="logo" href="https://www.staloysius.edu.in/" target="_blank"> 
	<img class="logo" src="../images/logo.png" alt="college logo"></a>
	<form  method="post">
	<table>
		<tr>
			<td class="rowtext">
				User Name:
			</td>
			<td colspan="2"  class="inputcol">
				<input type="text" name="username" id="username" required>
			</td>
		</tr>
		<tr>
			<td   class="rowtext">
				Password:
			</td>
			<td colspan="2"  class="inputcol">
				<input type="password" name="password" id="password" maxlength="6" required>
			</td>
		</tr>
		<tr>
			<td colspan="10">
				<input type="submit" value="SUBMIT" id="submit">
			</td>
			<td></td>
		</tr>
		<tr>
			<td  class="warning_msg" colspan="10"><?php echo $msg?></td>
			<td></td>
		</tr>
	</table>
	</form>
	</body>
</html>	