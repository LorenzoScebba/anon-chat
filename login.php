<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <?php include 'model/css.php' ?>
</head>
<body>
<?php include 'view/view_nav.php' ?>
<main>
    <div class="login-clean">
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-navigate"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" /></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" /></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button></div><a href="#" class="forgot">Forgot your email or password?</a></form>
    </div>
</main>
<?php include 'view/view_footer.php' ?>

</body>
</html>