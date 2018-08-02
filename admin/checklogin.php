<!DOCTYPE html>
<html>
<body ><!--<style="background-color:maroon;">-->
<?php
ini_set ("display_errors", "1");
//error_reporting(E_ALL);
ob_start();
session_start();
require('../connection.php');
$tbl_name="tbAdministrators"; 
$myusername=isset($_POST['myusername']);
$mypassword=isset($_POST['mypassword']);
//$encrypted_mypassword=md5($mypassword);
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = isset($_POST['myusername']);
//$myusername = $mysqli->escape_string(isset($_POST['myusername']));
$mypassword = isset($_POST['mypassword']);
$sql="SELECT * FROM $tbl_name WHERE email='$myusername' and password='$mypassword'" or die(mysql_error());

//$result= $mysqli->query($sql);
$result= mysqli_query($link, $sql);
$count=mysqli_num_rows($result);
if($count==1)
{
                if(isset($_POST['remember']))
                {
                    setcookie('$email',isset($_POST['myusername']), time()+30*24*60*60); 
                    setcookie('$pass', isset($_POST['mypassword']),time()+30*24*60*60); 
                    $_SESSION['curname']=$myusername;
                    $_SESSION['curpass']=$mypassword;
                    $user = $result->fetch_assoc();
     				$_SESSION['admin_id'] = $user['admin_id'];
                    header("Location:admin.php");
                    exit();
                }
                else
                {
                    $log1=11;
                    $_SESSION['log1'] = $log1;
                    $_SESSION['curname']=$myusername;
                    $_SESSION['curpass']=$mypassword;

                    $user = $result->fetch_assoc();
     				$_SESSION['admin_id'] = $user['admin_id'];

                    header("Location:admin.php");
                    exit();
                }
}
else {
    echo "<br> <br> <br> ";
    echo "<center> <h3>Wrong Username or Password<br><br>Return to <a href=\"index.php\">login</a> </h3></center>";
}

ob_end_flush();

?> 
</body>
</html>
