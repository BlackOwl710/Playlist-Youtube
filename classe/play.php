<?php
    include (__DIR__.'/../bdd/getco.php');
    
    $bdd = get_co();
    
           $video_url = $bdd->prepare ('SELECT (url) FROM vids WHERE id=:id');
           $video_url->execute(array(
               'id'=>$_POST['retrivedId']
           ));
           var_dump($video_url);
           echo ('<br>');
           $video_url= $video_url->fetch();
           $video_url= $video_url["url"];

            $tab_id = $bdd->prepare ('SELECT (url) FROM vids');
            $tab_id->execute(array());
            echo($tab_id);
           
           
    header('Location: /../index.php');
?>
