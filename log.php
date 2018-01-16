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
    <a href='form.php'><i class='fa fa-address-card'></i>Register</a>
</div>  
</nav>
    <div class="container">
        <div class="row">
            <div class="col-sm">

            </div>
            <div class="col-sm">
                <form class='addDelUpdt' action='forms/login.php' method='POST'>
                    <label>Log in</label>
                    <input name='log'class="form-control" type='text'>
                    <label>Password</label>
                    <input name='passwd'class="form-control" type='password'>
                    <input type="submit">
                </form>
            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>


</html>