<?php
include (__DIR__.'/../bdd/getco.php');

$getvid= substr($_POST['insertVid'], 32);
$bdd= get_co();
$todos= $bdd->prepare('INSERT INTO vids(url) VALUES (:vids)');
$todos->execute(array(
    'vids'=>$getvid
));
header('Location: ../index.php');

?>