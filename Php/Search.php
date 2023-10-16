<?php
require('db.inc.php');
		if(isset($_POST['regno'])){
 		$regno=mysqli_real_escape_string($con,$_POST['regno']);
		$sql = "select * from leave_app where regno='$regno'
					&& course='{$_SESSION['COURSE']}' && year='{$_SESSION['YEAR']}'&& batch='{$_SESSION['BATCH']}'";
 		$res=mysqli_query($con,$sql);
 		$count=mysqli_num_rows($res);
 		if($count>0){
 			$row=mysqli_fetch_assoc($res);
 			$_SESSION['NAME']=$row['name'];
 			$_SESSION['USER_REGNO']=$row['regno'];
 			header('location:Display.php');
 			die();
 		}
}
?>
<html>
	<head>
		<title>Names</title>
		<link rel="stylesheet" href="../css/search.css">
	</head>
	<body>
    <nav class="topnav">
        <img src="../images/logo.png" width="250px">
        <a href='../index.html'>Sign out</a>
        <a><?php echo $_SESSION['USER_NAME']; ?></a>
    </nav>
    <div class="head" style="padding: 10px; width: 300px; display: inline-block;margin-left: 470px;">
		<h2><?php echo $_SESSION['YEAR'] ?>
			<?php echo $_SESSION['COURSE'] ?>
			<?php echo $_SESSION['BATCH'] ?></h2>
	</div>

<div style="padding: 10px; display: inline-block; float: right;">
<form  method="post">
		<input style="background-color: transparent;border: 2px solid white;
    			font-size: 25px;color:white;width: 200px;height: 50px;
    			"type="number" name="regno" id="regno" maxlength="6" required>
		<input style="width: 200px;height: 50px;" type="submit" value="Search" id="submit">
</form>
</div>
<br>
	<table>
		<tr>
			<td class="cap">REGNO</td>
			<td class="cap">NAME</td>
			<td class="cap">DATE</td>
			<td class="cap">REASONS</td>
		</tr>
<?php
			$sql = "SELECT le.name, le.regno, le.date, le.reason 
			FROM leave_app le
			INNER JOIN student st ON st.regno=le.regno
			WHERE le.course='{$_SESSION['COURSE']}' && le.year='{$_SESSION['YEAR']}' && le.batch='{$_SESSION['BATCH']}'";
			$result =$con->query($sql);
			if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" ;
        //$_SESSION['REG_NO']=$row["student_regno"]; 
        echo $row["regno"];
        echo "</td>";
        echo "<td>";
        //$_SESSION['S_NAME']=$row["student_name"];
        echo $row["name"];
        echo "</td>";
        echo "<td>"; 
        echo $row["date"];
        echo "</td>";
        echo "<td>";
        echo $row["reason"];
        echo "</td>";
        echo "</tr>";
               }
           }
           else {
    echo "<th colspan=10> 0 results </th>";
	}
?> 
	</table>
	</body>
</html>