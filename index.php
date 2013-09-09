<!DOCTYPE html>
<html lang="en">
<?php 
include('includes/header.php');
include('includes/database.php');

if (isset($_POST["id_i"]) and isset($_POST["id_d"])){
    increment_pic($_POST["id_i"]);
    decrement_pic($_POST["id_d"]);
    
    header( 'Location: index.php' ) ;
}
$pics = get_random_pics();
?>
  <body>
    <?php include('includes/nav.php'); nav(basename(__FILE__));?>
    <div class="main">
        <div class="hero-unit">
            <h1>Fun or noT?</h1>
            <p>The funniest <a href="http://en.wikipedia.org/wiki/Graphics_Interchange_Format" rel='tooltip' data-toggle="tooltip" title="Graphics Interchange Format">GIFs</a> collection from various sites around the globe!</p>
            <p>You will always see two random <a href="http://en.wikipedia.org/wiki/Graphics_Interchange_Format" rel='tooltip' data-toggle="tooltip" title="Graphics Interchange Format">GIFs</a> click on one you like the most.</p>
            <hr>
            <form action=index.php method=POST>
                <input type=hidden name=id_i value=-1>
                <input type=hidden name=id_d value=-1>
                <ul class="thumbnails">
                <li>
                    <p class="text-center">
                        <a href="javascript:choosePic(<?php echo $pics[0]->id; ?>,<?php echo $pics[1]->id; ?>);"><img class="img-polaroid" src="img/<?php echo $pics[0]->name; ?>"></a>
                    </p>
                </li>
                <li>
                    <p class="text-center">
                        <a href="javascript:choosePic(<?php echo $pics[1]->id; ?>,<?php echo $pics[0]->id; ?>);"><img class="img-polaroid" src="img/<?php echo $pics[1]->name; ?>"></a>
                    </p>
                </li>
                </ul>
            </form>
            <hr>
            <?php include('includes/commercial.php'); ?>
        </div>
        <?php include('includes/footer.php'); ?>
    </div>
  </body>
  <?php include('includes/scripts.php'); ?>
</html>
