<!doctype html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <title>Diary Service</title>
        <style>
            .inputForm {
                margin: 0px 10px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-primary">
            <a class="navbar-brand" href="#">Diary Service</a>
            <form method="post" class="form-inline">
                <div class="form-group row">
                    <input type="email" class="form-control my-1 mx-sm-2" placeholder="メールアドレス">
                    <input type="password" class="form-control my-1 mx-sm-2" placeholder="パスワード">
                    <button type="submit" class="btn btn-outline-light my-1 mx-sm-2">ログイン</button>
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
                    <input type="email" class="form-control my-1 mx-sm-2" placeholder="メールアドレス">
                    <input type="password" class="form-control my-1 mx-sm-2" placeholder="パスワード">
                    <button type="submit" class="btn btn-outline-primary my-1 mx-sm-2">登録</button>
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