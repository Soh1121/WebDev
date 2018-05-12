<!doctype html>
<html lang="jp">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="http://localhost/13-TwitterClone/styles.css">

    <title>Twitter Clone</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="http://localhost/13-TwitterClone/">Twitter</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="?page=timeline">Your timeline</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=yourtweets">Your tweets</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=publicprofiles">Public Profiles</a>
          </li>
        </ul>
      </div>
      <div class="form-inline pull-xs-right">
        <?php if($_SESSION['id']){ ?>
          <a class="btn btn-outline-success" href="?function=logout">Logout</a>
        <?php } else { ?>
          <button class="btn btn-outline-success" data-toggle="modal" data-target="#myModal">Login/Signup</button>
        <?php } ?>
      </div>
    </nav>
