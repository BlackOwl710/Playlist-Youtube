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

    <title>Purp'tube</title>

</head>

<body>
<nav>
    <div class='navbar'>
        <a href='index.php'><i class='fas fa-home'></i></a>
        <?php 
            if (!empty($_SESSION['id'])){echo "<a href='#'><div id='user'>Vous êtes connectés ".$_SESSION['log']."</div></a><a href='index.php'><i class='fa fa-times'></i> Log out</a>";}
            else if(empty($_SESSION['id'])) { echo "<a href='log.php'><i class='fa fa-user' aria-hidden='true'></i>Log In</a><a href='form.php'><i class='fa fa-address-card'></i>Register</a>";}
        ?>
    </div>
<nav>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                One of three columns
            </div>
            <div class="col-sm">
                <form class='addDelUpdt' action='forms/registration.php' method='POST'>
                    <label>Nom</label>
                    <input name='name'class="form-control" name='name' type='text'>
                    <label>Prénom</label>
                    <input name='sname'class="form-control" name='surname' type='text'>
                    <label>Login</label>
                    <input name='log'class="form-control" name='login' type='text'>
                    <label>Password</label>
                    <input name='pass'class="form-control" name='passwd' type='password'>
                    <label>Rewrite Your Password</label>
                    <input name='rw_pass'class="form-control" name='passwd_check' type='password'>
                    <input type="submit">
                </form>
            </div>
            <div class="col-sm">
                One of three columns
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>


</html>