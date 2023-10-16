<?php
require('db.inc.php');
if(isset($_POST['course']) && isset($_POST['year']) && isset($_POST['batch'])){
 $course=mysqli_real_escape_string($con,$_POST['course']);
 $year=mysqli_real_escape_string($con,$_POST['year']);
 $batch=mysqli_real_escape_string($con,$_POST['batch']);
 	$res=mysqli_query($con,"select * from student where course='".$course."' && year='".$year."' && batch='$batch'");
    while($row=mysqli_fetch_array($res)){
 			$_SESSION['COURSE']=$row['course'];
 			$_SESSION['YEAR']=$row['year'];
 			$_SESSION['BATCH']=$row['batch'];
 			header('location:Search.php'); //here
 			die();
 		}
 	}
?>
<html>
	<head>
		<title> Leave Application</title>
	</head>
<link rel="stylesheet" href="../css/select.css">
	<body>
        <nav class="topnav">
            <img src="../images/logo.png" >
        <a href='../index.html'>Sign out</a>
        <a><?php echo $_SESSION['USER_NAME']; ?></a>
        </nav>
        <form method="post">
    <table>
        <tr>
            <th class="cap" colspan="5">Select Respectice Class</th>
        </tr>
        <td></td><td></td>
    <tr>
        <td class="rowtext">COURSE</td>
        <td ><select name="course" id="course" style="font-family: Bell MT;" required>
                <option disabled selected ><i>_Select_</i></option>       
                <option value="BCA">BCA</option>
                <option value="BCOM">BCOM</option>
                <option value="BBA">BBA</option>
                <option value="BA">BA</option>
                <option value="BSC">BSC</option>
                <option value="BVOC">BVOC</option>
            </select>
        </td>
    </tr>
    <tr>
        <td class="rowtext">YEAR</td>
        <td>
            <select name="year" id="year" style="font-family: Bell MT;" required>
                <option disabled selected ><i>_Select_</i></option>       
                <option value="I">I</option>
                <option value="II">II</option>
                <option value="III">III</option>
            </select>
        </td>
    </tr>
    <tr>
        <td class="rowtext">BATCH</td>
        <td>
            <input type="text" name="batch" id="batch" style="text-transform:uppercase" required>
        </td>
    </tr>

                <tr>
                    <td></td>
                    <td colspan="40">
                        <input type="submit" value="SUBMIT" id="submit">
                    </td>
                    <td></td>
                </tr>
            </table>
        </form>
	</body>
</html>	