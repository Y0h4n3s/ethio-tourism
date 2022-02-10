
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
        <form method="POST" name="login-form" action="login.php">
            <label for="username-input">Username</label>
            <input name="username-input"/>
            <br>
            <label for="password-input">Password</label>
            <input name="password-input" type="password" />
            <br>
            <input class="button" type="submit" value="Login"  >

            
<?php
require_once("connection.php");

if (isset($_POST['username-input']) && isset($_POST['password-input'])){

    $username = $_POST['username-input'];
    $password = $_POST['password-input'];

    $check_username_and_password_sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password';";
    $result = mysql_query($check_username_and_password_sql, $conn);
    $data = mysql_fetch_array($result);
  
   
    if ( $data['username'] == $username && $data['password'] == $password) {
       header("location:index.php"); 
    } else {
        echo "<p style='color: red;'>"."incorrect username or password"."</p>";

    }
}




?>
        </form>
    </main>
    
    <?php 

include_once('footer.php');
?>
</body>
</html>