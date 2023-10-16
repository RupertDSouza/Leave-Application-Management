<?php
require('db.inc.php');
$msg="";
if(isset($_POST['name']) && isset($_POST['regno'])){
 $name=mysqli_real_escape_string($con,$_POST['name']);
 $regno=mysqli_real_escape_string($con,$_POST['regno']);
 $sql="Select * from student where name='$name' and regno='$regno'";
 	$res=mysqli_query($con,$sql);
 	$count=mysqli_num_rows($res);
 		if($count>0){
 			$row=mysqli_fetch_assoc($res);
 			$_SESSION['ROLE']=$row['Role'];
 			$_SESSION['NAME']=$row['name'];
 			$_SESSION['USER_REGNO']=$row['regno'];
 			header('location:leavereg.php');
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
	<link rel="stylesheet" href="../css/Login.css">
	<body>
	<a class="logo" href="https://www.staloysius.edu.in/" target="_blank"> 
	<img class="logo" src="../images/logo.png" alt="college logo"></a>
	<form  method="post">
	<table>
		<tr>
			<td class="rowtext">
				Full Name:
			</td>
			<td colspan="2"  class="inputcol">
				<input type="text" name="name" id="name" required>
			</td>
		</tr>
		<tr>
			<td class="rowtext">
				Reg No:
			</td>
			<td colspan="2">
				<input type="number" name="regno" id="regno" maxlength="6" required>
			</td>
		</tr>
		<tr>
			<td colspan="10">
				<input type="submit" value="SUBMIT" id="submit">
			</td>
			<td></td>
		</tr>
		<tr>
			<td  colspan="10" class="warning_msg" ><?php echo $msg?></td>
			<td></td>
		</tr>
	</table>
	</form>
	</body>
</html>	