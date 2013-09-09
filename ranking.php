<!DOCTYPE html>
<html lang="en">
    <?php 
    include('includes/header.php');
    include('includes/database.php');

    if (isset($_GET["rank"]) && $_GET["rank"] > 0){
        $pic = get_pic($_GET["rank"]);
        $previous_rank = $_GET["rank"] - 1;
        $next_rank = $_GET["rank"] + 1;
        if (count($pic) < 2) unset($next_rank);
    } else {
        $pic = get_pic(0);
        $next_rank = 1;
    }
    ?>
    <body>
    <?php include('includes/nav.php'); nav(basename(__FILE__));?>
    <div class="main">
        <div class="hero-unit">
            <h1>Fun or not?</h1>
            <p>Ranking.</p>
            <hr>
            <ul class="pager">
                <?php 
                    if (isset($previous_rank)) {
                        echo "<li><a href='ranking.php?rank=$previous_rank'>Previous</a></li>";
                    } else {
                        echo "<li class='disabled'><span>Previous</span></li>";
                    }
                    
                    if (isset($next_rank)) {
                        echo "<li><a href='ranking.php?rank=$next_rank'>Next</a></li>";
                    } else {
                        echo "<li class='disabled'><span>Next</span></li>";
                    }
                 ?>
                
            </ul>
            <p class="text-center"><img src='img/<?php echo $pic[0]->name; ?>'></p>
            <hr>
            <?php include('includes/commercial.php'); ?>
        </div>
        <?php include('includes/footer.php'); ?>
    </div>
    </body>
    <?php include('includes/scripts.php'); ?>
</html>