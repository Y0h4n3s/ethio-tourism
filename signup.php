<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel='stylesheet' type='text/css' href='./css/contact.css'>
</head>
<body>

<?php 

include_once('header.php');
?>

        <main>
            <form>

                <label for="email-input">Email</label>
                <input name="email-input" type="email" />
                <br>
                <label for="username-input">Username</label>
                <input name="username-input" />
                <br>
                <label for="password-input">Password</label>
                <input name="password-input" type="password" />
                <br>
                <input class='button' type="submit" value="Signup">
            </form>
        </main>

    
        <?php 

include_once('footer.php');
?>
    </body>
</html>