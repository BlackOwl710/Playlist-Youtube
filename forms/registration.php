<?php
include (__DIR__.'/../bdd/getco.php');

$get_name= $_POST['name'];
$get_sname= $_POST['sname'];
$get_log= $_POST['log'];
$get_pass= $_POST['pass'];
$get_rw_pass= $_POST['rw_pass'];

$bdd=get_co();
if ($get_pass === $get_rw_pass){
$user= $bdd->prepare('INSERT INTO users(user_name, user_surname, user_login, passwd) VALUES (:user_name, :user_sname, :user_login, :passwd)');
$user->execute(array(
    'user_name'=>$get_name, 
    'user_sname'=>$get_sname, 
    'user_login'=>$get_log,
    'passwd'=>$get_pass
));
}

}

header('Location: ../form.php');
?>