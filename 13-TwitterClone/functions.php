<?php
  session_start();

  $link = mysqli_connect("localhost", "root", "root", "twitterclone");

  if(mysqli_connect_errno()){
    print_r(mysqli_connect_error());
    exit();
  }

  if(isset($_GET['fuction'])) {
    if($_GET['function'] == "logout") {
      session_unset();
    }
  }

  function time_since($since){
    $chunks = array(
      array(60 * 60 * 24 * 365, 'year'),
      array(60 * 60 * 24 * 30, 'month'),
      array(60 * 60 * 24 * 7, 'week'),
      array(60 * 60 * 24, 'day'),
      array(60 * 60, 'hour'),
      array(60, 'min'),
      array(1, 'sec')
    );

    for($i = 0, $j = count($chunks); $i < $j; $i++){
      $seconds = $chunks[$i][0];
      $name = $chunks[$i][1];
      if(($count = floor($since / $seconds)) != 0){
        break;
      }
    }

    # 1year 3monthsなど
    $print = ($count == 1) ? '1 '.$name : "$count{$name}s";
    return $print;
  }

  function displayTweets($type){
    global $link;
    if($type === 'public'){
      $whereClause = "";
    }

    $query = "SELECT * FROM tweets ".$whereClause." ORDER BY `datetime` DESC LIMIT 10";
    $result = mysqli_query($link, $query);
    if(mysqli_num_rows($result) == 0){
      echo "<p>There are no tweets to display.</p>";
    } else {
      while($row = mysqli_fetch_assoc($result)){
        $userQuery = "SELECT * FROM users WHERE id = ".mysqli_real_escape_string($link, $row['userid'])." LIMIT 1";
        $userQueryResult = mysqli_query($link, $userQuery);
        $user = mysqli_fetch_assoc($userQueryResult);

        echo "<div class='tweet'><p><a href='?page=publicprofiles&userid=".$user['id']."'>".$user['email']."</a> <span class='time'>".time_since(time() - strtotime($row['datetime']))."ago</span>:</p>";

        echo "<p>".$row['tweet']."</p>";

        echo "<p><a class='toggleFollow' data-userId='".$row['userid']."'>'";
        $isFollowingQuery = "SELECT * FROM `isFollowing` WHERE follower = ".mysqli_real_escape_string($link, $_SESSION['id'])." AND isFollowing = ".mysqli_real_escape_string($link, $row['userid'])." LIMIT 1";
        $isFollowingQueryResult = mysqli_query($link, $isFollowingQuery);
        if(mysqli_num_rows($isFollowingQueryResult) > 0){
          echo "Unfollow";
        }else{
          echo "Follow";
        }
        echo "</a></p></div>";
      }
    }
  }
?>
