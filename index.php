<!DOCTYPE html>
<html lang="en">
<?php 
include('includes/header.php');
include('includes/database.php');
include('config.php');

if (isset($_POST["id_i"]) and isset($_POST["id_d"])){
    increment_pic($_POST["id_i"]);
    decrement_pic($_POST["id_d"]);
    
    header( 'Location: index.php' ) ;
}
$pics = get_random_pics();
?>
  <body>
    <?php include('includes/nav.php'); nav(basename(__FILE__));?>
    <div class="main" >
        <div class="hero-unit">
            <h1><img src='img/funornot_h1.png'> Fun or Not?</h1>
            <p>The funniest <a href="http://en.wikipedia.org/wiki/Graphics_Interchange_Format" rel='tooltip' data-toggle="tooltip" title="Graphics Interchange Format">GIFs</a> collection from various sites around the globe!</p>
            <p>You will see two random <a href="http://en.wikipedia.org/wiki/Graphics_Interchange_Format" rel='tooltip' data-toggle="tooltip" title="Graphics Interchange Format">GIFs</a> click on one you like the most.</p>
            <hr>
            <form action=index.php method=POST>
                <input type=hidden name=id_i value=-1>
                <input type=hidden name=id_d value=-1>
                <ul class="thumbnails">
                <li>
                    <p class="text-center">
                        <a href="javascript:choosePic(<?php echo $pics[0]->id; ?>,<?php echo $pics[1]->id; ?>);">
                            <span onmouseout="javascript:changeImageDefault()" onmouseover="javascript:changeImageGreater()" id="image1" ></span>
                        </a>
                    </p>
                </li>
                <li><p class="text-center"><img id="choose_img" src="img/funornot_80x75.png"></p></li>
                <li>
                    <p class="text-center">
                        <a  href="javascript:choosePic(<?php echo $pics[1]->id; ?>,<?php echo $pics[0]->id; ?>);">
                            <span onmouseout="javascript:changeImageDefault()" onmouseover="javascript:changeImageLesser()" id="image2" ></span>
                        </a>
                    </p>
                </li>
                </ul>
            </form>
            <div id="loading">
                <div class="progress progress-striped active">
                    <div class="bar" style="width: 100%;"></div>
                </div>
            </div>
            <hr>
            <?php include('includes/commercial.php'); ?>
        </div>
        <?php include('includes/footer.php'); ?>
    </div>
  </body>
 
  <?php include('includes/scripts.php'); ?>
  <script type="text/javascript">
    /*     borrowed some code from
        [url]http://letmehaveblog.blogspot.com/2006/08/simple-jquery-plugin-to-load-images.html[/url]
        adapted to work a with a more specific purpose
    */
    $.fn.addImage = function(src, fnBefore, fnAfter){ 
       return this.each(function(){
            var i = new Image();
            i.src = src;
            /*    if you want to make sure the loader displays correctly ,
                you could set CSS width/height here OR you could set a style
                as I have done.
            */
            $(this).css({"width":i.width, "height":i.height});
            $(i).fadeTo(0,0);
            fnBefore(i)
            $(i).bind("load", i, fnAfter); 
            this.appendChild(i);
       }); 
    }     

    function beforeLoad(el) {
        console.log("Before image load")
        $(el).fadeOut();
    }

    function afterLoad(e) {
        console.log("After image load")
        $(e.target).fadeTo(500,1)
         .parent().removeAttr("style");//can remove parent css here if you like
    }

    $(document).ready(function(){

        $("#image1").addImage(
            "<?php echo $gifs_path[$pics[0]->location]; ?>/<?php echo $pics[0]->name; ?>", 
            beforeLoad,
            afterLoad
        );

        $("#image2").addImage(    
            "<?php echo $gifs_path[$pics[1]->location]; ?>/<?php echo $pics[1]->name; ?>", 
            beforeLoad,
            afterLoad
        );
    });
</script>
<script language="javascript" type="text/javascript">
  $(window).load(function() {
    $('#loading').hide();
  });
</script>
</html>