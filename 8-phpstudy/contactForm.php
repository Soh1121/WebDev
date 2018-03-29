<!doctype html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>Hello, world!</title>
    </head>
    <body>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <div class="container">
            <form method="post">
                <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 col-form-label">宛先</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="inputEmail" placeholder="宛先メールアドレス">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSubject" class="col-sm-2 col-form-label">タイトル</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputSubject">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputBody" class="col-sm-2 col-form-lable">本文</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputBody" placeholder="本文を入力してください。">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">送信</button>
            </form>
        </div>

        <?php
            $emailTo = "";
            $subject = "";
            $body = "";
            $headers = "";
            if(isset($_POST['inputEmail'])){
                $emailTo = $_POST['inputEmail'];
            }
            if(isset($_POST['inputSubject'])){
                $subject = $_POST['inputSubject'];
            }
            if(isset($_POST['inputBody'])){
            $body = $_POST['inputBody'];
            }
            if($emailTo == ""){
                echo "";
            } elseif(mail($emailTo, $subject, $body, $headers)){
                echo "<p>送信されました。</p><p>{$_POST['inputEmail']}宛にタイトル：{$_POST['inputSubject']}、本文：{$_POST['inputBody']}です。";
            } else {
                echo "<p>送信エラーです。</p>";
            }
        ?>
  </body>
</html>

