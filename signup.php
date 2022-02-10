

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel='stylesheet' type='text/css' href='./css/contact.css'>
</head>
<body>

<?php 

include_once('header.php');
?>

        <main>
            <form  method="POST" name="signup-form" action="signup.php" >

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
<?php
require_once("connection.php");


if (isset($_POST['username-input']) && isset($_POST['password-input']) && isset($_POST["email-input"])){

    $username = $_POST['username-input'];
    $password = $_POST['password-input'];
    $email = $_POST['email-input'];

    $check_username_sql = "SELECT * FROM users WHERE username = '$username';";
    $result = mysql_query($check_username_sql, $conn);
    $data = mysql_fetch_array($result);
  
   
    if ( $data['username'] == $username) {
        echo "username exists";
    } else {
        $insert_sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email');";
        $result = mysql_query($insert_sql, $conn);

        if ($result) {
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
