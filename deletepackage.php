<!DOCTYPE html>
<html >
<head>
    <title>Hotels</title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/hotel.css">


</head>
<body>
  

    <?php 

include_once('pages/header.php');
?>
    <main>
    

<?php 
     require_once("connection.php");

    
    if (isset($_POST['package-name'])) {
        $deleted_package = urldecode($_POST['package-name']);
        $delete_sql = "DELETE FROM packages WHERE name='". "$deleted_package" . "';";
        $result = mysqli_query($conn,$delete_sql);
        echo "<h1>". "$result" . "</h1>";
        
        if ($result) {
       header("location:index.php"); 
        }
    } 
     $filter = false ; 

    
     $get_hotels_sql = "SELECT * FROM packages ;";
     $all_hotels = mysqli_query($conn,$get_hotels_sql);
     echo("<div class ='container'>");
     while ($row = mysqli_fetch_assoc($all_hotels)) {
        $name=$row['name'];
        $hotel=$row['hotel'];
        $price =$row['price'];
       
        echo(" <div class='card'>");
        echo("<h1>"."$name"."</h1>");   
        echo("<p class='location'>"."$hotel"."</p>");
        echo("<p>Price: "."$price"."</p>");
        echo("<form method='POST' name='delete-hotel-form' action='deletepackage.php'>."."<input type='hidden' name='package-name' value=".urlencode($name).">"); 

        echo("<input type='submit' class='button' value='Delete Package'>"."</form>");
        echo("</div>");      

    }
    echo("</div");

  

?>
    </main>

    
    <?php 

include_once('footer.php');
?>
   

</body>
</html>