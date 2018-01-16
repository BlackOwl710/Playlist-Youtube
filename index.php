<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
    <link rel="stylesheet" href="styles.css" type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <title>To watch</title>
</head>
<body>
    
<nav>
    <div class='navbar'>
        <a href='index.php'><i class='fas fa-home'></i></a>
        <?php 
            if (!empty($_SESSION['id'])){echo 
                "<a href='#'><div id='user'>Vous êtes connectés ".$_SESSION['log']."</div></a>
                <form method='POST' action='forms/delog.php'><button type='submit'><i class='fa fa-times'></i> Log out</button>";}
            else if(empty($_SESSION['id'])) { echo 
                "<a href='log.php'><i class='fa fa-user' aria-hidden='true'></i>Log In</a>
                 <a href='form.php'><i class='fa fa-address-card'></i>Register</a>";}
        ?>
        
            
        <form class='flex1' action='forms/addVid.php' method='POST'>
            <input class='add'name='insertVid' type='text' class="form-control" placeholder="Add your video Here" aria-label="" aria-describedby="basic-addon1">
            <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-plus"></i></button>
        </form>
    </div>   
</nav>
<?php
include __DIR__ . '/bdd/getco.php';
$bdd = get_co();

// $video_url = $bdd->prepare('SELECT(url) FROM vids WHERE id=:id');
// $video_url->execute(array(
//     'id' => $_POST['retrivedId'],
// ));

// $video_url = $video_url->fetch();
// $video_url = $video_url["url"];

// echo ($video_url);
// echo ('<br>');

$tab_id = $bdd->prepare('SELECT * FROM vids');
$tab_id->execute(array());
$tab_id = $tab_id->fetchAll(PDO::FETCH_COLUMN, 1);
$tab_id = json_encode($tab_id);

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

<div class="container-fluid">
        <div class="row">
        <div class="col-sm-7">
                <!--player YT -->
                
                <div id="player"></div>
            </div>
            <div class="col-sm-5 playlist">
                <?php

$bdd = get_co();

// $vids_id_user = $bdd->query('SELECT id FROM users');
// $vids= $bdd->query('SELECT * FROM vids WHERE user_id = $vids_id_user');
$user_id= $_SESSION['id'];
$vids = $bdd->prepare('SELECT * FROM vids');
$vids->execute(array(
    'id'=> $user_id
));
$vids = $vids->fetchAll();
if (!empty($vids)) {
    foreach ($vids as $data) {
        if($user_id === $data['user_id']){ ?>
                            <div class='flex2'>
                                <img src=<?php echo 'http://img.youtube.com/vi/' . $data['url'].'/3.jpg';?> alt="">
                                <p class='retrivedVid'><?php echo $data['title']; ?></p>
                                <p class='retrivedId'><?php echo $data['id']; ?></p>
                                <form name='play' action= 'classe/play.php'method= 'POST'>
                                   <button type="submit"><i class="fa fa-play"></i></button>
                                </form>
                            </div>




                <?php }}}?>
            </div>
        </div>
</div>
<footer class='footer'>
<div class="container_foot">
    <div class='icons'><i class="fab fa-linkedin fa-2x"></i></div>
    <div class='icons'><i class="fab fa-facebook-square fa-2x"></i></div>
    <div class='icons'><i class="fab fa-google-plus-square fa-2x"></i></div>
</div>
</footer>
<script src='./JS/yt_api.js'></script>
</body>


</html>