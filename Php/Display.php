<?php
require('db.inc.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Leave</title>
</head>
<link rel="stylesheet" href="../css/Show.css">

<body>
   <nav class="topnav">
            <div class="logo">
         <img src="../images/logo.png" width="250px">
     </div>
      <div class="content">
        <a><?php echo $_SESSION['USER_REGNO']?></a>
        <a><?php echo $_SESSION['NAME']?></a>
        <a href="../index.html">Sign Out</a>
    </div>
    </nav>
    <form method="post">
        <table>
        <tr><th class='head'>DATE</th><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><th class='head'>REASON</th></tr>
    <?php
        $sql="Select date,reason from leave_app where regno='".$_SESSION['USER_REGNO']."'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
    //$_SESSION[]=array(); 
    while($row = $result->fetch_assoc()) {
        //$_SESSION['DATE']=$row['date'];
        //$_SESSION['REASON']=$row['reason'];
        echo "<tr>";
        echo "<td>" ;
        echo $row['date'] ;
        echo "</td>";
        echo "<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>";
        echo "<td>" ;
        echo $row['reason'] ;
        echo "</td>";
        echo "</tr>" ;
               }
           }
    ?> 
    </table>
</form>
</body>
</html>