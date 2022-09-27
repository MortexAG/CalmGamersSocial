<?php
include "db_conn.php";
function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
$username = $_POST['username'];
$password = $_POST['password'];
$nickname = $_POST['nickname'];
$profile_pic = $_POST['profile_pic'];
/* Check If The Input Fields Are Empty */
$uname = validate($username);
$pass = validate($password);
$niname = validate($nickname);
$pro_pic = validate($profile_pic);
if (empty($uname) && empty($pass) && empty($niname) && empty($pro_pic)){
  $both_empty = "<center><h1 style='color:red;'>You Can't Leave All The Fields Empty</h1></center> <meta http-equiv='refresh' content='3; URL=/register.php' />";
	    echo $both_empty;
}
else if (empty($uname)) {
		$uname_empty = "<center><h1 style='color:red;'>Username Can't Be Empty</h1></center> <meta http-equiv='refresh' content='3; URL=/register.php' />";
	    echo $uname_empty;
	}else if(empty($pass)){
  $pass_empty = "<center><h1 style='color:red;'>Password Can't Be Empty</h1></center> <meta http-equiv='refresh' content='3; URL=/register.php' />";
	    echo $pass_empty;
}
else if(empty($niname)){
  $niname_empty = "<center><h1 style='color:red;'>Nickname Can't Be Empty</h1></center> <meta http-equiv='refresh' content='3; URL=/register.php' />";
	    echo $niname_empty;
}
  else if(empty($pro_pic)){
  $pro_pic_empty = "<center><h1 style='color:red;'>Profile Picture Link Can't Be Empty</h1></center> <meta http-equiv='refresh' content='3; URL=/register.php' />";
	    echo $pro_pic_empty;
}
/* Continue If They're Not Empty */
  else {
  /* Get The Username and Password From Input */
$username = $_POST['username'];
$password = $_POST['password'];
$nickname = $_POST['nickname'];
$re_password = $_POST['re_password'];
$profile_pic = $_POST['profile_pic'];
 /* To Check For Normal User Accounts */   
$sqle = "SELECT * FROM `users_table` WHERE username='$username'";
$sqle_nickname = "SELECT * FROM `users_table` WHERE nickname='$nickname'";
/* Resulting Inputs */
$result = mysqli_query($con, $sqle);
$row = mysqli_fetch_assoc($result);
$result_nickname = mysqli_query($con, $sqle_nickname);
$row_nickname = mysqli_fetch_assoc($result_nickname);
 /* Checking Existing Users */   
if ($row['username'] == $username){
  $already_registered = "<center><h1 style='color:red;'>Username Is Already Registered</h1></center> <meta http-equiv='refresh' content='3; URL=/register.php' />";
  echo $already_registered;
  exit();
}
else if ($row_nickname['nickname'] == $nickname) {
  $already_registered_nickname = "<center><h1 style='color:red;'>Nickname Is Already Registered</h1></center> <meta http-equiv='refresh' content='3; URL=/register.php' />";
  echo $already_registered_nickname;
  exit();
}
/* Creat A Profile */  
else {
if ($password == $re_password){
  
$sql = "INSERT INTO `users_table` (id, username, password, nickname, profile_pic) VALUES (0, '$username', '$password', '$nickname', '$profile_pic')";

$rs = mysqli_query($con, $sql);
if($rs)
{
  /* Profile Created Successfully */
  $reg_success = "<center><h1 style='color:Green;'>Register Successful</h1><br><h2 style='color:green;'>Welcome Your Username is $username</h2><br><h2 style='color:green;'>Your Nickname is $nickname</h2><br><h3>Login Using Your Username And Password</h3></center> <meta http-equiv='refresh' content='3; URL=/' />";
 echo $reg_success;
}
else {
  /* Something Went Wrong While Creating */
  $error_register = "<center><h1 style='color:red;'>Something Went Wrong Try Again</h1></center> <meta http-equiv='refresh' content='3; URL=/register.php' />";
  echo $error_register;
}
}
else{
  /* Passwords Don't Match */
  $pass_no_match = "<center><h1 style='color:red;'>Passwords Don't Match</h1></center> <meta http-equiv='refresh' content='3; URL=/register.php' />";
  echo $pass_no_match;
}
}
  }
?>