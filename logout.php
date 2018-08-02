<?php
	session_start();
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
      <h1><a href="index.html">ONLINE VOTING</a></h1>
    </div>
        <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="index.php">Home</a></li>
      
      </ul>
    </nav>
    
  </header>
</div>

<div class="wrapper bgded overlay" style="background-color: green">
  <section id="testimonials" class="hoc container clear"> 
    <h2 class="font-x3 uppercase btmspace-80 underlined"> Online Voting</a></h2>
    <ul class="nospace group">
      <li class="one_half">
        <blockquote>

        		<div id="page">
					<div id="header">
					<h1>Logged Out Successfully </h1>
					<p align="center">&nbsp;</p>
					</div>
					<?php
						session_destroy();
					?>
					You have been successfully logged out.<br><br><br>
					Return to <a href="login.php">Login</a>

				</div>

        </blockquote>
      
      </li>
    </ul>
   
  </section>
</div>
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
 
    <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved -St Pauls University</a></p>
  </div>
</div>
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>

<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>

<script src="layout/scripts/jquery.placeholder.min.js"></script>
</body>
</html>








