<?php
    $link = mysqli_connect("localhost", "root", "root", "memberapp");
    // サーバー名、データベースユーザー名、パスワード
    // mysqli_connect_error();

    if(mysqli_connect_error()){
        die("データベースへの接続に失敗しました。");
    }

    $query = "SELECT * FROM users";
    if(mysqli_query($link, $query)){
        echo "クエリの発行に成功しました。";
    }

?>