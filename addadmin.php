<!DOCTYPE html>
<html >
<head>
    <title>Admin</title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/form.css">
</head>
<body>

<?php include_once("pages/header.php")?>
<main>
        <div class="form_container">
        <h2> Add Admin </h2>
            <form  method="POST" name="signup-form" action="addadmin.php" >
           
           
            <div class = 'row'>
            <input name="username-input" />
            <label for="username-input">Username</label>
            </div>
            <div class = 'row'>   
            <input name="email-input" type="email" />
            <label for="email-input">Email</label>
            </div>
            <div class = 'row'>    
            <input name="phonenumber-input" />
            <label for="phonenumber-input">Phonenumber</label>
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

if (isset($_POST['username-input']) && isset($_POST['password-input']) && isset($_POST["email-input"])&& isset($_POST["phonenumber-input"])){
   
    
    $username = $_POST['username-input'];
    $password = $_POST['password-input'];
    $email = $_POST['email-input'];
    $phone_no = $_POST['phonenumber-input'];
    
    $check_username_sql = "SELECT * FROM admin WHERE username = '$username';";
    
    $result = mysqli_query($conn,$check_username_sql);
   
    $data = mysqli_fetch_array($result);
  
    if ( $data['username'] == $username) {
        echo "username exists";
    } else {
        $insert_sql = "INSERT INTO admin (username, password, email,phone_no) VALUES ('$username', '$password', '$email','$phone_no');";
        $result = mysqli_query($conn,$insert_sql);

        if ($result) {
            echo '<script type="text/javascript">
            window.onload = function () { alert("Admin is ADDED"); }
            </script>';
        } else { 
            echo "<p style='color: red;'>"."registration failed"."</p>";
        }
    }   
}
?>
        </main>

<?php include_once("footer.php")?>
    
</body>
</html>