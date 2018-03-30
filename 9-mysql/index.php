<?php
    $link = mysqli_connect("localhost", "root", "root", "memberapp");
    // サーバー名、データベースユーザー名、パスワード
    // mysqli_connect_error();

    if(mysqli_connect_error()){
        die("データベースへの接続に失敗しました。");
    }

/*
    $query = "INSERT INTO `users` (`email`, `password`) VALUES ('kirsten@gmail.com', 'thereisnopasswords')";
    if($result = mysqli_query($link, $query)){
        echo "INSERTクエリの発行に成功しました。<br>";
    }
*/

    $query = "UPDATE `users` SET `email`='satou.shg@yahoo.co.jp' WHERE `id`=1 LIMIT 1";
    if($result = mysqli_query($link, $query)){
        echo "UPDATEクエリの発行に成功しました。<br>";
    }

    $query = "SELECT * FROM users";
    if($result = mysqli_query($link, $query)){
    //    echo "クエリの発行に成功しました。<br>";
    }
    $row = mysqli_fetch_array($result);
    // print_r($row);
    // 連想配列型：できればこっち（わかりやすいから）
    echo "<p>あなたのメールアドレスは".$row["email"]."、パスワードは".$row["password"]."です。</p>";


/*   // 配列型
    echo "<p>あなたのメールアドレスは".$row[1]."、パスワードは".$row[2]."です。</p>";

    echo "<p>あなたのIDは".$row["id"]."です。</p>";
*/
?>