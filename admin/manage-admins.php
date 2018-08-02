<?php
				if(empty($_SESSION['admin_id'])){
				 	header("location:access-denied.php");
				}
				if (isset($_POST['submit']))
				{

					$myFirstName = addslashes( $_POST['firstname'] ); 
					$myLastName = addslashes( $_POST['lastname'] ); 
					$myEmail = $_POST['email'];
					$myPassword = $_POST['password'];
					$newpass = md5($myPassword);
					$sql = $mysqli->query( "INSERT INTO tbAdministrators(first_name, last_name, email, password) VALUES ('$myFirstName','$myLastName', '$myEmail', '$newpass')" )
					        or die( mysqli_error() );
					die( "A new administrator account has been created." );
				}
				if (isset($_GET['id']) && isset($_POST['update']))
				{
					$myId = addslashes( $_GET['id']);
					$myFirstName = addslashes( $_POST['firstname'] );
					$myLastName = addslashes( $_POST['lastname'] ); 
					$myEmail = $_POST['email'];
					$myPassword = $_POST['password'];
					$newpass = md5($myPassword); 
					$sql = $mysqli->query( "UPDATE tbAdministrators SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail', password='$newpass' WHERE admin_id = '$myId'" )
					        or die( mysqli_error() );
					die( "An administrator account has been updated." );
				}
			?>
