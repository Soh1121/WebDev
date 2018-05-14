<div class="container mainContainer">
  <div class="row">
    <h2>Recent tweets</h2>
  </div>
  <div class="row">
    <div class="col-md-8">
      <?php displayTweets('public'); ?>
    </div>
    <div class="col-md-4">
      <?php displaySearch(); ?>
      <hr>
      <?php displayTweetBox(); ?>
    </div>
  </div>
</div>
