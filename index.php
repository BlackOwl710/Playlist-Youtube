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
    include (__DIR__ . '/bdd/getco.php');
    $bdd = get_co();

    $video_url = $bdd->prepare('SELECT(url) FROM vids WHERE id=:id');
    $video_url->execute(array(
        'id' => $_POST['retrivedId'],
    ));

    $video_url = $video_url->fetch();
    $video_url = $video_url["url"];

    echo ($video_url);
    echo ('<br>');

    $tab_id = $bdd->prepare ('SELECT * FROM vids');
    $tab_id->execute(array());
    $tab_id= $tab_id->fetchAll(PDO::FETCH_COLUMN, 1);
    $tab_id= json_encode($tab_id);

?>
<script>
    var tab_id= <?php echo $tab_id ?>;
    console.log(tab_id);
    // 2. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;
console.log(tab_id[0]); 
function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '360',
        width: '640',
        videoId: tab_id[0],
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
}
console.log(tab_id[0]);
// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
    event.target.playVideo();
}

// 5. The API calls this function when the player's state changes.
//    The function indicates that when playing a video (state=1),
//    the player should play for six seconds and then stop.
var done = false;
var i = 0;

function onPlayerStateChange(event) {

    if (event.data === YT.PlayerState.ENDED) {
        i++;
        player.loadVideoById(tab_id[i]);
        console.log(i);
    }
}

function stopVideo() {
    player.stopVideo();
}
</script>

      <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
      <div id="player"></div>

<form action='forms/addVid.php' method='POST'>
    <input name='insertVid' type='text' >
    <input type="submit">
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
    </form>
  <form name='play' action= 'classe/play.php'method= 'POST'>
    <input type="submit">
  </form>
  

  <?php }}?>
  <script src='./JS/yt_api.js'></script>
</body>


</html>