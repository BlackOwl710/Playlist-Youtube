<?php
include (__DIR__.'/../bdd/getco.php');
session_start();
$getvid= substr($_POST['insertVid'], 32);
$api_key = api_key();
$bdd= get_co();
echo ("https://www.googleapis.com/youtube/v3/videos?part=id,snippet&id=$getvid&key=$api_key");
$title_tab = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=id,snippet&id=$getvid&key=$api_key");
$title_tab = json_decode($title_tab);
$title = $title_tab->items[0]->snippet->title;
var_dump($title);
$user_id= $_SESSION['id'];
$vidpush= $bdd->prepare('INSERT INTO vids(url, user_id, title) VALUES (:vids,:id, :title)');
$vidpush->execute(array(
    'vids'=>$getvid,
    'id'=>$user_id,    
    'title'=>$title
    
));



header('Location: ../index.php');

?>