<?php
	session_start();
	require('../connection.php');
	if( empty($_SESSION['admin_id']) ){
	   header("location:access-denied.php");
	}
	$result=mysqli_query("SELECT * FROM tbPositions")
	or die("There are no records to display ... \n" . mysqli_error()); 
	if (mysqli_num_rows($result)<1){
	    $result = null;
	}
	?>
	<?php
	if (isset($_POST['Submit']))
	{
	$newPosition = addslashes( $_POST['position'] );
	$sql = mysql_query( "INSERT INTO tbPositions(position_name) VALUES ('$newPosition')" )
	        or die("Could not insert position at the moment". mysqli_error() );
	   header("Location: positions.php");
	}
?>
<?php
	 if (isset($_GET['id']))
	 {
	 $id = $_GET['id'];
	 $result = mysqli_query("DELETE FROM tbPositions WHERE position_id='$id'")
	 or die("The position does not exist ... \n"); 
	 header("Location: positions.php");
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
<body id="top">
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="fl_left">
      <h1><a href="index.php">ONLINE VOTING</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="positions.php">Home</a></li>
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
	<CAPTION><h3>ADD NEW POSITION</h3></CAPTION>
	<form name="fmPositions" id="fmPositions" action="positions.php" method="post" onsubmit="return positionValidate(this)">
	<tr>
	    <td bgcolor="#00ff80">Position Name</td>
	    <td bgcolor="#808080"><input type="text" name="position" /></td>
	    <td bgcolor="#00FF00"><input type="submit" name="Submit" value="Add" /></td>
	</tr>
	</table>

	<table border="0" width="420" align="center">
		<CAPTION><h3>AVAILABLE POSITIONS</h3></CAPTION>
		<tr>
		<th>Position ID</th>
		<th>Position Name</th>
		</tr>

		<?php
			while ($row=mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td>" . $row['position_id']."</td>";
			echo "<td>" . $row['position_name']."</td>";
			echo '<td><a href="positions.php?id=' . $row['position_id'] . '">Delete Position</a></td>';
			echo "</tr>";
			}
			mysqli_free_result($result);
			mysqliclose($link);
		?>
	</table>
	<hr>
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

