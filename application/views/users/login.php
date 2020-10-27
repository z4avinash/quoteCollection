<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER | LOGIN</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/users/login.css">
</head>

<body>
    <nav>Login</nav>
    <br><br>
    <form action="<?php base_url() ?>login" id="loginForm" method="post">
        <div class="login_email">
            <label>E-mail: </label><input type="text" value="<?php echo set_value('login_email') ?>" name="login_email" id="login_email" placeholder="email@example.com"><span class="error"><?php echo form_error('login_email') ?></span>
        </div><br>
        <div class="login_password">
            <label>Password : </label><input type="password" value="<?php echo set_value('login_password') ?>" name="login_password" id="login_password" placeholder="********"><span class="error"><?php echo form_error('login_password') ?></span>
        </div><br><br>
        <input type="submit" value="Log In" id="login">
    </form><br>
    <a href="<?php echo base_url() ?>index.php/Users/index"><button id="home">Home</button></a>
</body>

</html>