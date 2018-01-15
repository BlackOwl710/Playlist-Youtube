<?php
include (__DIR__.'/../bdd/getco.php');

$getvid= substr($_POST['insertVid'], 32);
$api_key = api_key();
$bdd= get_co();
echo ("https://www.googleapis.com/youtube/v3/videos?part=id,snippet&id=$getvid&key=$api_key");
$title_tab = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=id,snippet&id=$getvid&key=$api_key");
$title_tab = json_decode($title_tab);
$title = $title_tab->items[0]->snippet->title;
;


$vidpush= $bdd->prepare('INSERT INTO vids(url, title) VALUES (:vids, :title)');
$vidpush->execute(array(
    'vids'=>$getvid,
    'title'=>$title
));



header('Location: ../index.php');

?>