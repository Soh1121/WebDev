<?php
    function alert_($line){
        
    }
    session_start();
    date_default_timezone_set('Asia/Tokyo');
    $link = mysqli_connect("localhost", "root", "root", "diaryapp");

        if(mysqli_connect_error()){
            die("データベースへの接続に失敗しました。");
        }

//        echo "<p>データベースへの接続に成功しました。</p>";
        // 登録ボタンが押されたとき
        if(isset($_POST['regist'])){
            if(array_key_exists('registerEmail',$_POST) OR array_key_exists('registerPassword',$_POST)){
//                echo "<p>Keyは存在します。</p>";
                if($_POST['registerEmail'] === ''){
                    echo '<script type="text/javascript">alert("登録メールアドレスを入力してください。");</script>';
                } elseif($_POST['registerPassword'] === ''){
                    echo '<script type="text/javascript">alert("登録パスワードを入力してください。");</script>';
                } else {
                    $query = "SELECT `userid` FROM `users` WHERE email='".mysqli_real_escape_string($link,$_POST['registerEmail'])."'";
                    $result = mysqli_query($link,$query);
                    if(mysqli_num_rows($result) > 0){   // メールアドレスがすでに登録済みだった場合
                        echo '<script type="text/javascript">alert("このメールアドレスはすでに使用されています。");</script>';
                    } else {    // メールアドレスが未登録の場合
                        // usersテーブルにemailを登録
                        $query = "INSERT INTO `users` (`email`) VALUES('".mysqli_real_escape_string($link,$_POST['registerEmail'])."')";
                        $result = mysqli_query($link,$query);
                        // 登録したemailのidを取得
                        $query = "SELECT `userid` FROM `users` WHERE email='".mysqli_real_escape_string($link,$_POST['registerEmail'])."'";
                        $result = mysqli_query($link,$query);
                        $row = mysqli_fetch_array($result);
                        // パスワードを暗号化して保存
                        $query = "UPDATE `users` SET password='".mysqli_real_escape_string($link,md5(md5($row['userid']).$_POST['registerPassword']))."' WHERE email='".mysqli_real_escape_string($link,$_POST['registerEmail'])."' LIMIT 1";
                        $result = mysqli_query($link, $query);
                        // 初期記事の仕込み
                        $userid = $row['userid'];
                        $date = date('Y年m月d日');
                        $query = "INSERT INTO `articles` (`userid`,`date`,`title`,`body`) VALUES($userid,'".$date."','ようこそ！Diary Serviceへ！','ようこそ！Diary Serviceへ！早速、最初の記事を投稿してみましょう。')";
                        $result = mysqli_query($link, $query);
                        // ユーザー画面へ移行
                        $url = "diary_user.php";
                        // 記事を探すためのuserid、ログイン情報を表示するためのemailをセッションに記憶
                        $_SESSION["userid"] = $userid;
                        $_SESSION["email"] = $_POST['registerEmail'];
                        // ユーザーページへ移動
                        header('Location: '. $url, true, 301);
                        exit();
//                        echo '<script type="text/javascript">alert("登録に成功しました。");</script>';
                    }
                }
            }
        }
        
        // ログインボタンが押されたとき
        if(isset($_POST['login'])){
//            echo "<p>ログインボタンが押されました。</p>";
            if(array_key_exists('loginEmail', $_POST) OR array_key_exists('loginPassword', $_POST)){
                 if($_POST['loginEmail'] === ''){   // ログインメールアドレスが入力されていなかった場合
                    echo '<script type="text/javascript">alert("ログインメールアドレスを入力してください。");</script>';
                 } elseif($_POST['loginPassword'] === ''){  // ログインパスワードが入力されていなかった場合
                    echo '<script type="text/javascript">alert("ログインパスワードを入力してください。");</script>';
                 } else {   // ログイン情報が正常に入力されていた場合
                     $query = "SELECT * FROM `users` WHERE email='".mysqli_real_escape_string($link,$_POST['loginEmail'])."'";
                     $result = mysqli_query($link,$query);
                     if(mysqli_num_rows($result) === 0){    // メールアドレスが見つからなかった場合
                         echo '<script type="text/javascript">alert("メールアドレスもしくはパスワードが誤っています。");</script>';
                     } else if(mysqli_num_rows($result) === 1){ // メールアドレスがひとつだけ見つかった場合
//                             echo "一致するメールアドレスが発見されました。</p>";
                         $row = mysqli_fetch_array($result);
                         if(md5(md5($row['userid']).$_POST['loginPassword']) === $row['password']){ // パスワードが一致した場合
//                            echo "<p>パスワードが一致しました。</p>";
                             // ユーザー画面へ移行
                             $url = "diary_user.php";
                             // 記事を探すためのuserid、ログイン情報を表示するためのemailをセッションに記憶
                             $_SESSION["userid"] = $row['userid'];
                             $_SESSION["email"] = $_POST['loginEmail'];
                             // ユーザーページへ移動
                             header('Location: '. $url, true, 301);
                             exit();
                         } else {
                             echo '<script type="text/javascript">alert("メールアドレスもしくはパスワードが誤っています。");</script>';
                         }
                     } else {
                         echo '<script type="text/javascript">alert("エラー");</script>';
                     }
                 }
            }
        }
?>

<!doctype html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <title>Diary Service</title>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-primary">
            <a class="navbar-brand" href="#">Diary Service</a>
            <form method="post" class="form-inline">
                <div class="form-group row">
                    <input type="email" class="form-control my-1 mx-sm-2" name="loginEmail" placeholder="メールアドレス">
                    <input type="password" class="form-control my-1 mx-sm-2" name="loginPassword" placeholder="パスワード">
                    <button type="submit" class="btn btn-outline-light my-1 mx-sm-2" name="login">ログイン</button>
                </div>
            </form>
        </nav>
        
        <div class="jumbotron">
            <h1 class="display-4">Diary Service</h1>
            <p class="lead">ユーザー登録をして、日記を投稿するサイトを作ってみましょう。</p>
            <p class="lead">各ユーザーは自分の投稿した日記だけを参照することができます。</p>
            <p class="lead">ユーザーはメールアドレスとパスワードでサイトに登録をします。</p>
            <hr class="my-4">
            <p>ユーザー登録がまだの方はメールアドレスとパスワードを登録ください。</p>
            <div class="text-center">
                <form method="post" class="form-inline">
                    <input type="email" class="form-control my-1 mx-sm-2" name="registerEmail" placeholder="メールアドレス">
                    <input type="password" class="form-control my-1 mx-sm-2" name="registerPassword" placeholder="パスワード">
                    <button type="submit" class="btn btn-outline-primary my-1 mx-sm-2" name="regist">登録</button>
                </form>
            </div>
        </div>
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>