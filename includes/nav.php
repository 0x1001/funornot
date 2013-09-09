<?php
function nav($page){
?>
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
      <a class="brand" href="index.php">Fun or noT?</a>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <li <?php if ($page == "index.php") echo 'class="active"';?>><a href="index.php">Home</a></li>
          <li <?php if ($page == "ranking.php") echo 'class="active"';?>><a href="ranking.php">Ranking</a></li>
          <li <?php if ($page == "about.php") echo 'class="active"';?>><a href="about.php">About</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>
<?php
}
?>