<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

<?php
include (__DIR__.'/bdd/getco.php');
$bdd= get_co();

    $tab_id = $bdd->prepare ('SELECT * FROM vids');
    $tab_id->execute(array());
    $tab_id= $tab_id->fetchAll(PDO::FETCH_COLUMN, 1);
    $tab_id= json_encode($tab_id);
    echo($tab_id);
    ?>
    <script src = '/JS/yt_api.js'></script>
    
    </body>
</html>
