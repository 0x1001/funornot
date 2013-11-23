<!DOCTYPE html>
<html lang="en">
    <?php 
    include('includes/header.php');
    include('includes/database.php');
    include('config.php');

    if (isset($_GET["rank"]) && $_GET["rank"] > 0){
        $pic = get_pic($_GET["rank"]);
        $previous_rank = $_GET["rank"] - 1;
        $next_rank = $_GET["rank"] + 1;
        $rank = $_GET["rank"] + 1;
        if (count($pic) < 2) unset($next_rank);
    } else {
        $pic = get_pic(0);
        $next_rank = 1;
        $rank = 1;
    }
    ?>
    <body>
    <?php include('includes/nav.php'); nav(basename(__FILE__));?>
    <div class="main">
        <div class="hero-unit">
            <h1><img src='img/funornot_h1.png'> Fun or Not?</h1>
            <p>From the best to the worst.</p>
            <p>User ranking.</p>
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
            <p class="text-center">
                <img class="img-polaroid" src='<?php echo $gifs_path[$pic[0]->location]; ?>/<?php echo $pic[0]->name; ?>'>
            </p>
            <h2><p class="text-center">
                - <?php echo $rank; ?> -
            </p></h2>
            <hr>
            <?php include('includes/commercial.php'); ?>
        </div>
        <?php include('includes/footer.php'); ?>
    </div>
    </body>
    <?php include('includes/scripts.php'); ?>
</html>