<?php 
session_start();
include "db_conn.php";
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
  ?>
<html>
 <head>
  
  <meta name=viewport content="width=device-width, initial-scale=1, user-scalable=yes">
  
  <link rel="icon" href="https://i.ibb.co/g4XPcNq/592781.jpg">
  <link rel="stylesheet" href="assets/styles-main.css">
	<title><?php echo $_SESSION['nickname']; ?></title>

 </head>
<body>
<form action='create_post.php' method='post' class='form-container'>
  <center>
    <h1>Create Post</h1>

    <label for='Post Text'><h3>Post Text</h3></label>
    <br>
    
    <input type='text' placeholder='Post Text' name='post_text' id='post_text'></input>
<br>
    <label for='Image Link'><h3>Image Link</h3></label>
    <br>
    <input type='text' placeholder='Image Link' name='post_image' id='post_image'></input>
<br>
    <br>
    <button type='submit'>Submit</button>
  </form>
    <br>
    <br>
    

  </center>
  <center>
        <a href="https://postimage.org" target="_blank"><button>Click Here To Go Uplaod The Image And Paste The Direct Link Here </button></a>
    <br>
    <br>
    <a href="home.php"><button>Go Back</button></a>
  </center>
</body>
</html>
  <?php 
} else { header("Location: index.php");
     exit();
       }
?>