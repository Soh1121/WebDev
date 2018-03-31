<!doctype html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>データ登録フォーム</title>
    </head>

    <body>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      
        <?php
            $link = mysqli_connect("localhost", "root", "root", "memberapp");
            // サーバー名、データベースユーザー名、パスワード
            // mysqli_connect_error();

            if(mysqli_connect_error()){
                die("データベースへの接続に失敗しました。");
            }

            $name = "Rob O'Grady";
            $query = "SELECT * FROM users WHERE name = '".mysqli_real_escape_string($link,$name)."'";
    
            /*
            1. Eメールとパスワードの入力フォーム、「登録する」ボタンを設置する ：　済み
            2. データが入力されているかどうかチェックする
            3. メールアドレスが既に使用されていないかチェックする
            4.メールアドレスが重複がなければユーザー登録（データベーステーブルに追加する）を実行する
            5.ユーザー登録に成功しました、というメッセージを表示する
            */
        ?>
        
        <div class="container">
            <!-- Content here -->
            <p></p>
            <form method="post">
                <div class="form-group">
                    <label for="inputEmail">Emailアドレス</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Emailアドレスを入力してください">
                </div>
                <div class="form-group">
                    <label for=inputPassword>パスワード</label>
                    <input type="password" class="form-control" id="inputPassword" name="password">
                </div>
                <button type="submit" class="btn btn-primary" name="submit" value="登録">登録</button>
            </form>
        </div>
        
        <?php
            if(isset($_POST['submit']) && $_POST['submit'] === "登録"){
                $email = $_POST['email'];
                $password = $_POST['password'];
                if($email === ""){
                    echo "<p>Emailアドレスが入力されていません。</p>";
                }
                if($password === ""){
                    echo "<p>パスワードが入力されていません。</p>";
                }
            }
            /*
            if(isset($_POST['email'])){
                echo $email = $_POST['email'];
            } else {
                $email = "";
            }
            
            if(isset($_POST['password'])){
                echo $password = $_POST['password'];
                echo "パスワードは入力されました。";
            } else {
                $password = "";
            }
            if($email == "" || $password == ""){
                alert("Eailアドレスかパスワードが入力されていません。");
            }*/

        ?>
        
    </body>
</html>