<?php

function get_co(){
$user = 'root';
$passwd = '85433420DeV';
$host = 'localhost';
$db_name = 'yt_play';
$bdd = new PDO ('mysql:host='.$host.';dbname='.$db_name.';charset=utf8', $user, $passwd);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $bdd;
}
function api_key(){
$api_key = 'AIzaSyAU4XxPFIZl7x4LfZuIDZVUVOsyzEewns0';
return $api_key;
}
?>