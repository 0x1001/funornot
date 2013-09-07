<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Fun or not!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <style>
        body {
        padding-top: 60px;
        padding-bottom: 20px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 70%;
        height: 100%;
        overflow: auto;
      }
    </style>
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
  </head>

  <body>
    <?php
    include('includes/database.php');
    include('includes/display.php');

    if (isset($_POST["id_i"]) and isset($_POST["id_d"])){
        increment_pic($_POST["id_i"]);
        decrement_pic($_POST["id_d"]);
        
        header( 'Location: index.php' ) ;
    }
    $pics = get_random_pics();
    
    ?>
    <?php include('includes/nav.php'); ?>
    
    <div class="container-narrow">
        <div class="hero-unit">
            <h1>Fun or not?</h1>
            <p>The funniest GIFs collection from various sites around the globe!</p>
            <p>You will always see two random GIFs click on one you like the most.</p>
            <hr>
            <form action=index.php method=POST>
                <input type=hidden name=id_i value=-1>
                <input type=hidden name=id_d value=-1>
                <ul class="thumbnails">
                <li>
                    <p class="text-center">
                        <a rel='tooltip' data-html="true" data-toggle="tooltip" title="<h2>Fun?</h2>" href="javascript:choosePic(<?php echo $pics[0]->id; ?>,<?php echo $pics[1]->id; ?>);"><img class="img-polaroid" src="img/<?php echo $pics[0]->name; ?>"></a>
                    </p>
                </li>
                <li>
                    <p class="text-center">
                        <a rel='tooltip' data-html="true" data-toggle="tooltip" title="<h2>Fun?</h2>" href="javascript:choosePic(<?php echo $pics[1]->id; ?>,<?php echo $pics[0]->id; ?>);"><img class="img-polaroid" src="img/<?php echo $pics[1]->name; ?>"></a>
                    </p>
                </li>
                </ul>
            </form>
            <hr>
            <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Commertial
            </div>
        </div>
        <?php include('includes/footer.php'); ?>
    </div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script>
    function choosePic(id_i,id_d)
    {
      document.forms[0].id_i.value = id_i;
      document.forms[0].id_d.value = id_d;
      document.forms[0].submit();
    }
    </script>
    <script type="text/javascript">
    $(function () {
        $("[rel='tooltip']").tooltip();
    });
    </script>
  </body>
</html>
