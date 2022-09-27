<?php 
session_start();
include "db_conn.php";
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
  include "db_conn.php";
  $sql_users = "SELECT id, username, nickname, profile_pic FROM users_list";
$result_users = mysqli_query($con, $sql_users);
 /* $sql_post = */
  $sql_posts = "SELECT nickname, user_pic, post_text, post_image FROM posts";
  $result_posts = mysqli_query($con, $sql_posts);
  $niname = $_SESSION['nickname'];
  $pro_pic = $_SESSION['profile_pic'];
 ?>
<!DOCTYPE html>
<html>
<head>
  <!--
  <meta name=viewport content="width=device-width, initial-scale=1, user-scalable=yes">
  !-->
  <link rel="icon" href="https://i.ibb.co/g4XPcNq/592781.jpg">
  <link rel="stylesheet" href="assets/styles-main.css">
	<title><?php echo $_SESSION['nickname']; ?></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <center>
     <h1>Hello, <?php echo $_SESSION['nickname']; ?></h1>
  </center>
  <br><center><a href="../logout.php"><button>Logout</button></a>
  </center>
<br>
<?php 
  echo "<div class='master-frame'>
<fieldset class='main-frame'>
<div class='post'>
<div class='post_maker'>
<img class='user_image' src='$pro_pic'>
</div> <div class='post_maker'><h2 class='post_username'>$niname</h2></div>
      
    </div>
    <div class='post_content'><h2 style='text-align:left;'>Welcome To Calm Gamers Social Site</h2>
        </div><a href='post.php'><button>Create A Post</button></a>

  </fieldset>
</div>
<br>
<div class='master-frame'>";
  
  if (mysqli_num_rows($result_posts) > 0) {
   
  // output data of each row
  while($row = mysqli_fetch_assoc($result_posts)) {
  $nickname = $row["nickname"];
  $user_pic = $row["user_pic"];
  $post_text = $row["post_text"];
  $post_image = $row["post_image"];
  if($post_image){
   $page = "
  
    
  <fieldset class='main-frame'>
    <div class='post'><div class='post_maker'>
    <img class='user_image' src='$user_pic'></div> <div class='post_maker'><h2 class='post_username'>$nickname</h2></div>
      
    </div>
    <div class='post_content'><p style='text-align:left;font-size:20px;'>$post_text</p>
        <br>
      <a href='$post_image' target='_blank'><img src='$post_image' width='99.98%' height='99.99%'></a></div>
  </fieldset>
      <br>
   ";
   echo $page;
  }
  else {
     $page_no_img = "
  
    
  <fieldset class='main-frame'>
    <div class='post'><div class='post_maker'>
    <img class='user_image' src='$user_pic'></div> <div class='post_maker'><h2 class='post_username'>$nickname</h2></div>
      
    </div>
    <div class='post_content'><p style='text-align:left;font-size:22px;'>$post_text</p>
      </div>
  </fieldset>
      <br>
   ";
   echo $page_no_img;
  }
 }
    echo "</div>";
  }
  
   ?>
     <br>
     </body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>