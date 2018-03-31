<?php
    $link = mysqli_connect("localhost", "root", "root", "memberapp");
    // サーバー名、データベースユーザー名、パスワード
    // mysqli_connect_error();

    if(mysqli_connect_error()){
        die("データベースへの接続に失敗しました。");
    }

    $name = "Rob O'Grady";
    $query = "SELECT * FROM users WHERE name = '".mysqli_real_escape_string($link,$name)."'";
    
    echo $query;
    echo "<p>";
        
    if($result = mysqli_query($link,$query)){
    //    echo "クエリの発行に成功しました。<br>";
    }
    while($row = mysqli_fetch_array($result)){
        print_r($row);
    }
//    print_r($row);
//     連想配列型：できればこっち（わかりやすいから）

//    echo "<p>あなたのメールアドレスは".$row["email"]."、パスワードは".$row["password"]."です。</p>";


/*   // 配列型
    echo "<p>あなたのメールアドレスは".$row[1]."、パスワードは".$row[2]."です。</p>";

    echo "<p>あなたのIDは".$row["id"]."です。</p>";
*/
?>