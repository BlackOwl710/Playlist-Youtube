<?php

    include_once (__DIR__.'/../bdd/getco.php');
    
    $bdd = get_co();
    
           $video_url = $bdd->prepare ('SELECT (url) FROM vids WHERE id=:id');
           $video_url->execute(array(
               'id'=>$_POST['retrivedId']
           ));
           var_dump($video_url);
           echo ('<br>');
           $video_url= $video_url->fetch();
           $video_url= $video_url["url"];
           
    header('Location: ../index.php');

?>
