<?php
require('db.inc.php');
    if(isset($_POST['course']) && isset($_POST['year']) && isset($_POST['batch'])){
    $course=mysqli_real_escape_string($con,$_POST['course']);
    $year=mysqli_real_escape_string($con,$_POST['year']);
    $batch=mysqli_real_escape_string($con,$_POST['batch']);
    $date=mysqli_real_escape_string($con,$_POST['date']);
    $reason=mysqli_real_escape_string($con,$_POST['reason']);
    $res=mysqli_query($con,"Insert into leave_app (name,regno,course,year,batch,date,reason) 
        values ('{$_SESSION['NAME']}','{$_SESSION['USER_REGNO']}','".strtoupper($course)."','".$year."','".strtoupper($batch)."','$date','$reason')");
            header('location:Display.php');
            die();
        }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="../css/leaveregno.css">
        <title>Report</title>
    </head>
    <body>
        <nav class="topnav">
            <div class="logo">
            <img src="../images/logo.png" >
            </div>
            <div class="content">
            <a><?php echo $_SESSION['USER_REGNO']; ?></a>
            <a><?php echo $_SESSION['NAME']; ?></a>
            </div>
        </nav>
        <form method="post">
            <table>
                <th class="head" colspan="2">LEAVE APPLICATION</th>
                <tr>
                    <td class="sub">COURSE</td>
                    <td ><input type="text" name="course" id="course" style="text-transform:uppercase" required></td>
                </tr>
                <tr>
                    <td class="sub">YEAR</td>
                    <td>
                    <select name="year" id="year" style="font-family: Bell MT;" required>
                        <option disabled selected>_Select_</option>       
                        <option value="I">I</option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                    </select>
                    </td>
                    
                </tr>
                <tr>
                    <td class="sub" >BATCH</td>
                     <td>
                        <input type="text" name="batch" id="batch" style="text-transform:uppercase" required></td>
                </tr>
                <tr>
                    <td class="sub" >DATE</td>
                    <td ><input type="date" name="date" id="date" required></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="sub" >REASON OF LEAVE</td>
                    <td ><textarea cols=40 rows=13 name="reason" id="reason" required></textarea></td>
                     <td></td>
                </tr>
                <tr>
                    <td colspan="2">
                    <input type="submit" value="SUBMIT" id="submit">
                    </td>
                </tr>
             </table>
        </form>
    </body>
</html>