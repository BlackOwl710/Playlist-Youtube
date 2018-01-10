<?php
include (__DIR__.'/../bdd/getco.php');

$getvid= substr($_POST['insertVid'], 32);
$bdd= get_co();

$todos= $bdd->prepare('INSERT INTO vids(url) VALUES (:vids)');
$todos->execute(array(
    'vids'=>$getvid
));

$api_key = api_key();
$vid_info = json_decode(file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=id,snippet&id=$getvid&key=$api_key"));
var_dump($vid_info);
// header('Location: ../index.php');

?>