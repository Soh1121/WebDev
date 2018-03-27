<?php

$role = "admin";
// $role = "guest";

// $position = "director";
$position = "manager";

// if($role == "admin"){
// if($role == "admin" && $position == "director"){
if($role == "admin" || $position == "director"){
    echo "<p>管理画面に進んでください。</p>";
} else {
    echo "<p>あなたは管理者ではないので、ここから先には進めません。</p>";
}

?>