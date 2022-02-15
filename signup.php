
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
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
            <form  method="POST" name="signup-form" action="signup.php" >
            <div class = 'row'>
            <input name="firstname-input" type="firstname" />
            <label for="email-input">Firstname</label>
            </div>
            <div class = 'row'>
            <input name="lastname-input" />
            <label for="lastname-input">Lastname</label>
            </div>
            <div class = 'row'>   
            <input name="email-input" type="email" />
            <label for="email-input">Email</label>
            </div>
            <div class = 'row'>    
            <input name="phonenumber-input" />
            <label for="phonenumberinput">Phonenumber</label>
            </div>
            <div class = 'row'>   
            <input name="password-input" type="password" />
            <label for="password-input">Passwsord</label>
            </div>    
                
            <input class='button' type="submit" value="Signup">
            </form>
</div>
<?php
require_once("connection.php");

if (isset($_POST['username-input']) && isset($_POST['password-input']) && isset($_POST["email-input"])){
   
    
    $username = $_POST['username-input'];
    $password = $_POST['password-input'];
    $email = $_POST['email-input'];
    
    $check_username_sql = "SELECT * FROM users WHERE username = '$username';";
    
    $result = mysqli_query($conn,$check_username_sql);
   
    $data = mysqli_fetch_array($result);
  
    if ( $data['username'] == $username) {
        echo "username exists";
    } else {
        $insert_sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email');";
        $result = mysqli_query($conn,$insert_sql);

        if ($result) {
        $_SESSION["account-type"] = "user";  
       header("location:index.php"); 
        } else { 
            echo "<p style='color: red;'>"."registration failed"."</p>";
        }
    }   
}
?>
        </main>

    
        <?php 

include_once('footer.php');


?>
    </body>
</html>
