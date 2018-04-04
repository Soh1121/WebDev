<?php
    session_start();
    function display_(){
        $link = mysqli_connect("localhost", "root", "root", "diaryapp");
        if(mysqli_connect_error()){
            die("データベースへの接続に失敗しました。");
        }
        $query = "SELECT * FROM articles WHERE userid='".mysqli_real_escape_string($link,$_SESSION['userid'])."' ORDER BY `articleid` DESC";
        $result = mysqli_query($link,$query);
        echo '<script>var articleZone = document.getElementById("articles");articleZone.innerHTML = "";</script>';
        if(mysqli_num_rows($result) > 0){
//            echo "<p>記事あり</p>";
            while($row = mysqli_fetch_array($result)){
                echo "<h2>".$row['title']."</h2>";
                echo "<p>".$row['date']."</p>";
                echo "<p>".$row['body']."</p>";
                echo "<hr>";
                array_push($_SESSION['displayed'], $row['articleid']);
            }
        } else {
            echo '<script type="text/javascript">alert("表示できる記事がありません。");</script>';
        };
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
        
        <style type="text/css">
            .fix {
                position: sticky;
            }
        </style>
        
        <title>Diary Service</title>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-primary">
            <a class="navbar-brand" href="diary.php">Diary Service</a>
            <span class="navbar-text">ようこそ、<?php echo $_SESSION['email']?> さん</span>
        </nav>
        
        <div class="container">
            <div class="row fix">
                <div class="col m-sm-2">
<!--                    1 of 2-->
                    <form method="post">
                        <div class="form-group">
                            <label for="inputTitle" class="m-sm-2">タイトル</label>
                            <input type="text" class="form-control" name="inputTitle" placeholder="タイトル">
                            <label for="inputDate" class="m-sm-2">日付</label>
                            <input type="text" class="form-control" name="inputDate" placeholder="2018年03月02日">
                            <label for="inputBody" class="m-sm-2">本文</label>
                            <textarea class="form-control" name="inputBody" rows="5"></textarea>
                        </div>                  
                        <button type="submit" class="btn btn-outline-primary my-1 mx-sm-2" name="postdiary">投稿</button>
                    </form>
                </div>
                <div class="col m-sm-2" id="articles">
                    <?php
//                        echo $_SESSION['userid'];
                        $link = mysqli_connect("localhost", "root", "root", "diaryapp");
                
                        if(mysqli_connect_error()){
                            die("データベースへの接続に失敗しました。");
                        }
//                        echo "<p>データベースの接続に成功しました。</p>";
                        // ログインしたユーザーの記事があるかどうか確認
                        $query = "SELECT * FROM articles WHERE userid='".mysqli_real_escape_string($link,$_SESSION['userid'])."'";
                        $result = mysqli_query($link,$query);
                        if(mysqli_num_rows($result) > 0){
                            $query = "SELECT * FROM articles WHERE userid='".mysqli_real_escape_string($link,$_SESSION['userid'])."' ORDER BY `articleid` DESC";
                            $result = mysqli_query($link,$query);
                            $_SESSION['displayed'] = [];
                            if(mysqli_num_rows($result) > 0){
//                                echo "<p>記事あり</p>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<h2>".$row['title']."</h2>";
                                    echo "<p>".$row['date']."</p>";
                                    echo "<p>".$row['body']."</p>";
                                    echo "<hr>";
                                    array_push($_SESSION['displayed'], $row['articleid']);
                                }
                            }
                        } else {
                            echo '<script type="text/javascript">alert("表示できる記事がありません。");</script>';
                        };
                        
                        // 投稿ボタンが押されたとき
                        if(isset($_POST['postdiary'])){
                            if(array_key_exists('inputTitle',$_POST) OR array_key_exists('inputDate',$_POST) OR array_key_exists('inputBody',$_POST)){
                                if($_POST['inputTitle'] === ''){
                                    echo '<script type="text/javascript">alert("タイトルを入力してください。");</script>';
                                } elseif($_POST['inputDate'] === ''){
                                    echo '<script type="text/javascript">alert("日付を入力してください。");</script>';
                                } elseif($_POST['inputBody'] === ''){
                                    echo '<script type="text/javascript">alert("本文を入力してください。");</script>';
                                } else {
                                    $userid = (int)$_SESSION['userid'];
                                    $query = "INSERT INTO `articles` (`userid`,`date`,`title`,`body`) VALUES ($userid,'".mysqli_real_escape_string($link,$_POST['inputDate'])."','".mysqli_real_escape_string($link,$_POST['inputTitle'])."','".mysqli_real_escape_string($link,$_POST['inputBody'])."')";
                                    if($result = mysqli_query($link,$query)){
                                        display_();
                                    }
                                }
                            }
                        }
                    ?>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    </body>
</html>