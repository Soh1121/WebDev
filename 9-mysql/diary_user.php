<?php
    session_start();
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
            <a class="navbar-brand" href="#">Diary Service</a>
            <span class="navbar-text">ようこそ、<?php echo $_SESSION['email']?> さん</span>
        </nav>
        
        <div class="container">
            <div class="row fix">
                <div class="col m-sm-2">
<!--                    1 of 2-->
                    <form method="post">
                        <div class="form-group">
                            <label for="inputTitle" class="m-sm-2">タイトル</label>
                            <input type="text" class="form-control" id="inputTitle" placeholder="タイトル">
                            <label for="inputDate" class="m-sm-2">日付</label>
                            <input type="text" class="form-control" id="inputDate" placeholder="2018年03月02日">
                            <label for="inputBody" class="m-sm-2">本文</label>
                            <textarea class="form-control" id="inputBody" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-primary my-1 mx-sm-2" name="post">投稿</button>
                    </form>
                </div>
                <div class="col m-sm-2">
                    <?php
                        echo $_SESSION['userid'];
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