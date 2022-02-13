
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="css/form.css">
</head>
<body>

<?php 

include_once('pages/header.php');
?>
    <main>
    <div class="form_container">
        <h2> WEL COME </h2>
        <form method="POST" name="login-form" action="login.php">
            <div class = 'row'>
            <input name="username-input"/>    
            <label for="username-input">Username</label>
            </div>
            <div class = 'row'>
            <input name="password-input" type="password"/>
            <label for="password-input">Password</label>
            </div>
            
            <input class="button" type="submit" value="Login"  >

            
<?php
require_once("connection.php");

if ($_POST['username-input']!=null &&$_POST['password-input']!=null){

    
    $username = $_POST['username-input'];
    $password = $_POST['password-input'];
     
    $check_username_and_password_sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password';";
    $result = mysqli_query($conn,$check_username_and_password_sql);
    $data = mysqli_fetch_assoc($result);
   
    if ( $data["username"] == $username && $data["password"] == $password) {
       header("location:index.php"); 
    } else {
        echo "<p style='color: red;'>"."incorrect username or password"."</p>";

    }
}
else{
   
   
}




?>
        </form>
    </main>
    
    <?php 

include_once('footer.php');
?>
</body>
</html>