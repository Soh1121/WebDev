<?php
    $link = mysqli_connect("localhost", "root", "root", "memberapp");
    // サーバー名、データベースユーザ名、パスワード

    if(mysqli_connect_error()){
        die("データベースの接続に失敗しました。");
    }

//    $query = "SELECT * FROM users WHERE name = '".mysqli_real_escape_string($link, $name)."'";

    if(array_key_exists('email',$_POST) OR array_key_exists('password',$_POST)){
        // print_r($_POST);
        if($_POST['email'] == ''){
            echo "Eメールアドレスを入力してください";
        } else if($_POST['password'] == '') {
            echo "パスワードを入力してください";
        } else {
            $query = "SELECT `id` FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
            $result = mysqli_query($link,$query);
            if(mysqli_num_rows($result) > 0){
                echo "既にそのメールアドレスは使用されています。";
            } else {
                // 未使用の場合の処理を記述
                $query = "INSERT INTO `users` (`email`,`password`) VALUES ('".mysqli_real_escape_string($link,$_POST['email'])."','".mysqli_real_escape_string($link,$_POST['password'])."')";
                if(mysqli_query($link,$query)){
                    echo "登録されました！";
                } else {
                    echo "登録に失敗しました。";
                }
            }
        }
    }

?>

<form method="post">
    <input name="email" type="text" placeholder="Eメール">
    <input name="password" type="password" placeholder="パスワード">
    <input type="submit" value="登録する">
</form>