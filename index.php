<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To watch</title>
</head>
<body>
      <?php 
        include (__DIR__.'/bdd/getco.php');
        $bdd = get_co();
        
        $video_url = $bdd->prepare ('SELECT(url) FROM vids WHERE id=:id');
        $video_url->execute(array(
            'id'=>$_POST['retrivedId']
        ));
        
        $video_url= $video_url->fetch();
        $video_url= $video_url["url"]; 

        echo ($video_url);
        echo('<br>');
        
      
        
  ?>
  </form>
      <iframe width="560" height="315" src=<?php echo('"'.'https://www.youtube.com/embed/'.$video_url.'"');?> frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        <?php echo('"'.'https://www.youtube.com/'.$video_url.'"');?>
      <form id='inputform' action='forms/addVid.php' method='POST'>
          <input name="insertVid" type='text' placeholder='Add your Videos here :)' />
          <input type='submit'>
      </form>
  <?php

      $bdd = get_co();

        // $vids_id_user = $bdd->query('SELECT id FROM users');
        // $vids= $bdd->query('SELECT * FROM vids WHERE user_id = $vids_id_user');

        $vids = $bdd->prepare('SELECT * FROM vids');
        $vids->execute();
        $vids = $vids->fetchAll();

        if (!empty($vids)) {
      foreach ($vids as $data) {
  ?>

  <form class='addDelUpdt' action='index.php' method='POST'>
    <input name='retrivedVid' type='text' value='<?php echo 'https://www.youtube.com/watch?v='.$data['url']; ?>'>
    <input name='retrivedId' type='text' value='<?php echo $data['id']; ?>'>
    <input type="submit">
  </form>
          
  <?php }} ?>
</body>


</html>