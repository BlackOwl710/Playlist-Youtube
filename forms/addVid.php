<?php
include (__DIR__.'/../bdd/getco.php');

$getvid= $_POST['insertVid'];
$bdd=get_co();
$todos= $bdd->prepare('INSERT INTO vids(url) VALUES (:vids)');
$todos->execute(array(
    'vids'=>$getvid
));
header('Location: ../index.php');

?>