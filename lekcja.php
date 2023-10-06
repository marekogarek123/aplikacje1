<?php
    $myFile = fopen("nowypliczek.txt","w")
        or die("unablke to open file !");
    $txt="Johny Deep\n";
    fwrite($myFile,$txt);
    fclose($myFile);
?>