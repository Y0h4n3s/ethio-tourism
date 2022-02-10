<!DOCTYPE html>
<html >
<head>
    <title>Contact</title>
    <link rel='stylesheet' type='text/css' href='./css/contact.css'>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    
<?php 

include_once('header.php');
?>
    <main>
        <form>
            <h2>Contact us</h2>
            <label for='name'>Name</label><br>
            <input class='textfield' type='text' name='name'><br>
            <label for='email'>Email</label><br>
            <input class='textfield' type='email' name='email'><br>
            <label for='message'>Message</label><br>
            <textarea name='message'></textarea><br>
            <input class='button' type='submit' value='Send Message'>
        </form>

    </main>
        
    <?php 

include_once('footer.php');
?>
</body>
</html>