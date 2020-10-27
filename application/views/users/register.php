<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER | REGISTER</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/users/register.css">
</head>

<body>
    <nav>Register</nav>
    <br><br>
    <form action="<?php echo base_url() ?>index.php/Users/login" id="registerForm" method="post">
        <div class="full_name">
            <label>Full Name: </label><input value="<?php echo set_value('full_name') ?>" type="text" name="full_name" id="full_name" placeholder="Avinash Kumar"><span class="error"><?php echo form_error('full_name') ?></span>
        </div><br>
        <div class="email">
            <label>E-mail: </label><input type="text" value="<?php echo set_value('email') ?>" name="email" id="email" placeholder="email@example.com"><span class="error"><?php echo form_error('email') ?></span>
        </div><br>
        <div class="password">
            <label>Password: </label><input type="password" value="<?php echo set_value('password') ?>" name="password" id="password" placeholder="********"><span class="error"><?php echo form_error('password') ?></span>
        </div><br><br>
        <input type="submit" value="Register" id="register">
    </form><br>
    <a href="<?php echo base_url() ?>index.php/Users/index"><button id="home">Home</button></a>
</body>

</html>