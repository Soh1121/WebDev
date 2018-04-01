<?php

session_start();
if($_SESSION['email']){
    echo "あなたはログインしています。";
} else {
    header("Location: index.php");
}

/*
session_start();

// $_SESSION['username'] = "robpercival";

echo $_SESSION['username'];
*/

?>