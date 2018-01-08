<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To watch</title>
</head>

<body>

    <form id='inputform' action='forms/addVid.php' method='POST'>
        <input name="insertVid" type='text' placeholder='Add your Videos here :)' />
        <input type='submit'>
    </form>

    <?php

include (__DIR__.'/bdd/getco.php');

$bdd = get_co();

// $vids_id_user = $bdd->query('SELECT id FROM users');
// $vids= $bdd->query('SELECT * FROM vids WHERE user_id = $vids_id_user');

$vids = $bdd->prepare ('SELECT * FROM vids');
$vids->execute();
$vids = $vids->fetchAll();

if (!empty($vids)) {
    foreach ($vids as $data) { ?>

        <form class='addDelUpdt' action='forms/updtVid.php' method='POST'>
            <input name='retrivedVid' type='text' value='<?php echo $data['url'];?>'>
            <input name='retrivedId' type='hidden' value='<?php echo $data['id'];?>'>
            <input type="submit">
        </form>
        <form action='forms/delVid.php' method='POST'>
            <input name='retrivedId' type='hidden' value='<?php echo $data['id'];?>'>
            <input type='submit' name='save' />
        </form>
        </div>
        <?php }
}
?>
</body>


</html>