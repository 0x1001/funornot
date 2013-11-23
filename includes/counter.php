<?php
$file = "counts.txt";
$cookie_name='funornotcounter-456';

if (file_exists($file)) {
    $count = (int)file_get_contents($file);
} else {
    $count = 0;
}

if (!isset($_COOKIE[$cookie_name])) {
    file_put_contents($file,(string)++$count);
    setcookie($cookie_name,"Checked",time()+60*60);
}
?>