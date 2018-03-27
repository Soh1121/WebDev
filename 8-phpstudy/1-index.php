<?php

// $role = "admin";
$role = "guest";
if($role == "admin"){
    echo "<p>管理画面に進んでください。</p>";
} else {
    echo "<p>あなたは管理者ではないので、ここから先には進めません。</p>";
}

?>