<?php
require_once('../connection.php');
if (isset($_POST['Submit'])){   

  $position = addslashes( $_POST['position'] );
  
    $results = $mysqli->query("SELECT * FROM tbCandidates where candidate_position='$position'");

    $row1 = mysqli_fetch_array($results); 
    $row2 = mysqli_fetch_array($results);
      if ($row1){
      $candidate_name_1=$row1['candidate_name']; 
      $candidate_1=$row1['candidate_cvotes'];
      }

      if ($row2){
      $candidate_name_2=$row2['candidate_name']; 
      $candidate_2=$row2['candidate_cvotes'];
      }
}
    else  
?> 
<?php
$positions= mysqli_query($link,"SELECT * FROM tbPositions")
or die("There are no records to display ... \n" .mysqli_error($link,$sql)); 
?>
<?php
session_start();
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
?>
<?php if(isset($_POST['Submit'])){$totalvotes=$candidate_1+$candidate_2;} ?>
<!DOCTYPE html>
<html>
<head>
<title>online voting</title>
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<script language="JavaScript" src="js/admin.js">
</script>
</head>
<body id="top">
<div class="wrapper row1">
  <header id="header" class="hoc clear">
    <div id="logo" class="fl_left">
      <h1><a href="index.html">ONLINE VOTING</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="refresh.php">Home</a></li>
        <li><a class="drop" href="#">Admin Panel Pages</a>
          <ul>
            <li><a href="manage-admins.php">Manage Admin</a></li>
            <li><a href="positions.php">Manage Positions</a></li>
            <li><a href="candidates.php">Manage Candidates</a></li>
            <li><a href="refresh.php">Results</a></li>
          </ul>
        </li>
        <li><a href="http://localhost/online_voting/index.php">Voter Panel</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
</div>
<div >
  <div >
    <table width="420" align="center">
    <form name="fmNames" id="fmNames" method="post" action="refresh.php" onSubmit="return positionValidate(this)">
    <tr>
        <td style="color:#000000";>Choose Position</td>
        <td><SELECT NAME="position" id="position">
        <OPTION  VALUE="select"><p style="color:black";>select</p>
        <?php 
        while ($row= mysqli_fetch_array($positions)){
          echo "<OPTION VALUE=$row[position_name]>$row[position_name]"; 
        }
        ?>
        </SELECT></td>
        <td style="color:black";><input type="submit" name="Submit" value="See Results" /></td>
    </tr>
    <tr>
    </tr>
    </form> 
    </table>
    <?php if(isset($_POST['Submit'])){echo $candidate_name_1;} ?>:<br>
    <img src="images/candidate-1.gif"
    width='<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_1/($candidate_2+$candidate_1),2));}} ?>'
    height='10'>
    <?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_1/($candidate_2+$candidate_1),2));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes
    <br>votes <?php if(isset($_POST['Submit'])){ echo $candidate_1;} ?>
    <br>
    <br>
    <?php if(isset($_POST['Submit'])){ echo $candidate_name_2;} ?>:<br>
    <img src="images/candidate-2.gif"
    width='<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_2/($candidate_2+$candidate_1),2));}} ?>'
    height='10'>
    <?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_2/($candidate_2+$candidate_1),2));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes
    <br>votes <?php if(isset($_POST['Submit'])){ echo $candidate_2;} ?>
  
  </div>

</div>
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
   
    <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved - St Pauls University</a></p>
  </div>
</div>
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="layout/scripts/jquery.placeholder.min.js"></script>
</body>
</html>

