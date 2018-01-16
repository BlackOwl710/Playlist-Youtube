<?php
include __DIR__ . '/../bdd/getco.php';


$bdd= get_co();

$log_client= $_POST['log'];
$passwd_client= $_POST['passwd'];


$check_user = $bdd->prepare('SELECT id FROM users WHERE user_login = :pseudo AND passwd = :pass');
$check_user->execute(array(
    'pseudo' => $log_client,
    'pass' => $passwd_client
));
$check_user = $check_user->fetch();
$check_user= $check_user['id'];

if (!empty($check_user)){
    session_start();
    $_SESSION['id']= $check_user['id'];
    $_SESSION['log']= $log_client;  
    header('Location: ../index.php');
      
}
else{
header('Location: ../log.php');    
}


var_dump($check_user);
?>