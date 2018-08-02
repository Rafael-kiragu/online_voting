
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
        <li class="active"><a href="checklogin.php">Home</a></li>
        
        <li><a class="drop" href="#">Voter Panel</a>
          <ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="registeracc.php">Registration</a></li>
           
          </ul>
        </li>
        
      </ul>
    </nav>
    </header>
<div class="wrapper bgded overlay" style="background-color:tan">
  <section id="testimonials" class="hoc container clear"> 
       <h2 class="font-x3 uppercase btmspace-80 underlined"> Online <a href="#">Voting</a></h2>
    <ul class="nospace group">
      <li class="one_half">
             	<div >
		<h1>Invalid Credentials Provided </h1>
		</div>
<div>
		<?php
			ini_set ("display_errors", "1");
			error_reporting(E_ALL);
			ob_start();
			session_start();
			//$mysqli->escape_string(
			require_once('connection.php');
			$myusername=isset($_POST['myusername']);
			$mypassword=isset($_POST['mypassword']);
			$encrypted_mypassword=md5($mypassword); 
			$myusername = stripslashes($myusername);
			$mypassword = stripslashes($mypassword);
			$myusername = isset($_POST['myusername']);
			$mypassword = isset($_POST['mypassword']);

			$sql="SELECT * FROM tbmembers WHERE email='$myusername' and password='$encrypted_mypassword'" or die(mysqli_error());
			//$mysqli->query($sql)
			$result= mysqli_query($link,$sql) or die(mysqli_error());
			
			$count=mysqli_num_rows($result);
						if($count==1){
						$user = mysqli_fetch_assoc($result);
				$_SESSION['member_id'] = $user['member_id'];
				header("location:voter.php");
			}
			else {
				echo "Wrong Username or Password<br><br>Return to <a href=\"login.php\">Login</a>";
			}
			ob_end_flush();
		?> 
		</div>
       </li>
    </ul>
  </section>
</div>
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
      <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved -St pauls University</a></p>
     </div>
</div>
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="layout/scripts/jquery.placeholder.min.js"></script>
</body>
</html>



