<!doctype html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <style type="text/css">
            .jumbotron {
                background-image: url("background.jpeg");
            }
        </style>

        <title>Postal Code Servie</title>
    </head>
    <body>
        <div class="jumbotron">
            <h1 class="display-4">Post Code Service</h1>
            <p class="lead">これまで学んだGoogle Maps API(Geocoding)を使用して、以下のようなサイトを作ってみましょう。</p>
            <hr class="my-4">
            <p class="lead">Bootstrapベースのレイアウトであること。</p>
            <p class="lead">入力フォームを１つ持つこと。</p>
            <p>住所の一部を入力すると、該当するデータがあれば郵便番号を表示すること。</p>
            <div class="text-center">
                <form method="post" class="form-inline">
                    <input type="text" class="form-control my-1 mx-sm-2" id="placeName" placeholder="地名">
                    <button type="submit" class="btn btn-outline-primary my-1 mx-sm-2" id="search">検索</button>
                </form>
            </div>
        </div>
        
        <!-- jQuery Bootstrapで使ってそうだけどいるのかな…？ -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
        <script type="text/javascript">
            $("#search").click(function(){
                var place = $("#placeName").val();
//                alert(val);
                var query = "https://maps.googleapis.com/maps/api/geocode/json?address=" + place + "&key=AIzaSyAOem6fAHZZTguVJbLA34Lk2pFNOqS2-0s";
                alert(query);
            })
        </script>
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>