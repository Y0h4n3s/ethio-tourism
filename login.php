
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
        <form method="GET" name="login-form" action="login.php">
            <label for="username-input">Username</label>
            <input name="username-input"/>
            <br>
            <label for="password-input">Password</label>
            <input name="password-input" type="password" />
            <br>
            <input class="button" type="submit" value="Login"  >

            
<?php


if (isset($_GET['username-input']) && isset($_GET['password-input'])){
    echo $_GET['username-input']."<br><br>";
    echo $_GET['password-input']."<br><br>";
}




?>
        </form>
    </main>
    
    <?php 

include_once('footer.php');
?>
</body>
</html>