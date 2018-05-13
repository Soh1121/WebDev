<?php
  session_start();
  session_unset();

  $link = mysqli_connect("localhost", "root", "root", "twitterclone");

  if(mysqli_connect_errno()){
    print_r(mysqli_connect_error());
    exit();
  }
/*
  if(isset($_GET['fuction'])) {
    if($_GET['function'] == "logout") {
      session_unset();
    }
  }
*/
?>
