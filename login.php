<?php
session_start();
include "db_conn.php";
function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
$username = $_POST['username'];
$password = $_POST['password'];
/* Check If The Input Fields Are Empty */
$uname = validate($username);
$pass = validate($password);
if (empty($uname) && empty($pass)){
  $both_empty = "<center><h1 style='color:red;'>Username And Password Can't Be Empty</h1></center> <meta http-equiv='refresh' content='3; URL=/' />";
	    echo $both_empty;
}
else if (empty($uname)) {
		$uname_empty = "<center><h1 style='color:red;'>Username Can't Be Empty</h1></center> <meta http-equiv='refresh' content='3; URL=/' />";
	    echo $uname_empty;
	}else if(empty($pass)){
  $pass_empty = "<center><h1 style='color:red;'>Password Can't Be Empty</h1></center> <meta http-equiv='refresh' content='3; URL=/' />";
	    echo $pass_empty;
}
  /* Continue If They're Not Empty */
  else {
/* Get The Input Username And Password From The DataBase */
$sql = "SELECT * FROM users_table WHERE username='$username' AND password='$password'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['username'] == $username){
  
  if ($row['password'] == $password){
    $_SESSION['username'] = $row['username'];
    $_SESSION['nickname'] = $row['nickname'];
    $_SESSION['id'] = $row['id'];
    $_SESSION['profile_pic'] = $row['profile_pic'];
    header("Location: home.php");
    exit();
  }
    }
else{
  /* If The Username or Password Are Incorrect or The User Is Not Registered */
  $incorrect_user = "<center><h1 style='color:red;'>Incorrect Username or Password</h1></center> <meta http-equiv='refresh' content='3; URL=/' />";
  echo $incorrect_user;
}
}

?>