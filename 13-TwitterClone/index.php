<?php
  include("functions.php");
  include("views/header.php");

  if (isset($_GET['page'])) {
    if ($_GET['page'] === 'timeline') {
      include("views/timeline.php");
    } else if ($_GET['page'] === 'search') {
      include("views/search.php");
    } else {
      include("views/home.php");
    }
  } else if(isset($_SESSION['id'])) {
    include("views/home.php");
  }

  include("views/footer.php");
?>
