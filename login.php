<?php
session_start();
?>
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
            <div class = 'row'>
            
            
            </div>
            <input name="account-type" type="radio" value="admin"/>
            <label for="admin" class='radio'> Admin </label> 
            <input name="account-type" type="radio" value="user"/>
            <label for="user" class='radio'> User</label>
            <input class="button" type="submit" value="Login"  >

            
<?php
echo "<h1>checking</h1>";
require_once("connection.php");
include_once("pages/model.php");


if ($_POST['username-input']!=null &&$_POST['password-input']!=null){

    
    $username = $_POST['username-input'];
    $password = $_POST['password-input'];
    $type =$_POST['account-type'];
    $check_username_and_password_sql="";
    if($type=="admin"){
        $check_username_and_password_sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password';";
    }
    else if($type=="user"){
        $check_username_and_password_sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password';";
    }
    else{

        header("location:login.php"); 
    }
  
    $result = mysqli_query($conn,$check_username_and_password_sql);
    $data = mysqli_fetch_assoc($result);
   
    if ( $data["username"] == $username && $data["password"] == $password) {
       $_SESSION['account-type']=$type;
        
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