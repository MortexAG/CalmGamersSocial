<?php
include "db_conn.php";
include "post.php";
function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
$post_text = $_POST['post_text'];
$post_image = $_POST['post_image'];
$nickname = $_SESSION['nickname'];
$user_pic = $_SESSION['profile_pic'];
/* Check If The Input Fields Are Empty */
$post_txt = validate($post_text);
$post_img = validate($post_image);
if (empty($post_txt) && empty($post_img)){
  $both_empty = "<center><h1 style='color:red;'>You Can't Leave All The Fields Empty</h1></center> <meta http-equiv='refresh' content='3; URL=/post.php' />";
	    echo $both_empty;
}
else{

$sql = "INSERT INTO `posts` (id, nickname, user_pic, post_text, post_image) VALUES (0, '$nickname', '$user_pic', '$post_text', '$post_image')";

$rs = mysqli_query($con, $sql);

}

if($rs)
{
  /* Post Created Successfully */
  $post_success = "<center><h1 style='color:Green;'>Your Post Was Created Go To The Home Page And Refresh To See IT</h1></center> <meta http-equiv='refresh' content='3; URL=home.php' />";
 echo $post_success;
}

?>