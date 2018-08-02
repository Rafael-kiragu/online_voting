<?php
    session_start();
    require('../connection.php');
    if(empty($_SESSION['admin_id'])){
      header("location:access-denied.php");
    } 
    $result= $mysqli->query("SELECT * FROM tbCandidates")
    or die("There are no records to display ... \n" . mysqli_error()); 
    if (mysqli_num_rows($result)<1){
        $result = null;
    }
?>
<?php
    $positions_retrieved= $mysqli->query("SELECT * FROM tbPositions")
    or die("There are no records to display ... \n" . mysqli_error()); 
?>
<?php
if (isset($_POST['Submit']))
{
    $newCandidateName = addslashes( $_POST['name'] );
    $newCandidatePosition = addslashes( $_POST['position'] ); 
    $sql = $mysqli->query( "INSERT INTO tbCandidates(candidate_name,candidate_position) VALUES ('$newCandidateName','$newCandidatePosition')" )
            or die("Could not insert candidate at the moment". mysqli_error() );
     header("Location: candidates.php");
    }
?>
<?php
  
     if (isset($_GET['id']))
     {
     $id = $_GET['id'];
     $result =  $mysqli->query("DELETE FROM tbCandidates WHERE candidate_id='$id'")
     or die("The candidate does not exist ... \n");
     header("Location: candidates.php");
     }
     else   
?>
<!DOCTYPE html>
<html>
<head>
<title>online voting</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<script language="JavaScript" src="js/user.js">
</script>
</head>
<body>
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="fl_left">
      <h1><a href="index.html">ONLINE VOTING</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="candidates.php">Home</a></li>
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
<table width="380" align="center">
<CAPTION><h3>ADD NEW CANDIDATE</h3></CAPTION>
<form name="fmCandidates" id="fmCandidates" action="candidates.php" method="post" onsubmit="return candidateValidate(this)">
<tr>
    <td bgcolor="#FAEBD7">Candidate Name</td>
    <td bgcolor="#FAEBD7"><input type="text" name="name" /></td>
</tr>

<tr>
    <td bgcolor="#7FFFD4">Candidate Position</td>
    
    <td bgcolor="#7FFFD4"><SELECT NAME="position" id="position">select
    <OPTION VALUE="select">select
    <?php
        while ($row= mysqli_fetch_array($positions_retrieved)){
          echo "<OPTION VALUE=$row[position_name]>$row[position_name]";
        }
    ?>
    </SELECT>
    </td>
</tr>
<tr>
    <td bgcolor="#BDB76B">&nbsp;</td>
    <td bgcolor="#BDB76B"><input type="submit" name="Submit" value="Add" /></td>
</tr>
</table>
<hr>
<table border="0" width="620" align="center">
<CAPTION><h3>AVAILABLE CANDIDATES</h3></CAPTION>
<tr>
<th>Candidate ID</th>
<th>Candidate Name</th>
<th>Candidate Position</th>
</tr>

<?php
    while ($row= mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['candidate_id']."</td>";
    echo "<td>" . $row['candidate_name']."</td>";
    echo "<td>" . $row['candidate_position']."</td>";
    echo '<td><a href="candidates.php?id=' . $row['candidate_id'] . '">Delete Candidate</a></td>';
    echo "</tr>";
    }
    mysqli_free_result($result);
    mysqli_close($mysqli);
?>
</table>
<hr>
</div>
<div class="wrapper row5">
  <div id="copyright" class="hoc clear">
    <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved - St pauls University</a></p>    
  </div>
</div>
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="layout/scripts/jquery.placeholder.min.js"></script>
</body>
</html>








