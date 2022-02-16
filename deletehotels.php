<!DOCTYPE html>
<html >
<head>
    <title>Hotels</title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/hotel.css">
    <link rel="stylesheet" href="./css/style.css">


</head>
<body>
  

    <?php 

include_once('pages/header.php');
?>
    <main>
    

<?php 
     require_once("connection.php");

    
    if (isset($_POST['hotel-name'])) {
        $deleted_hotel = urldecode($_POST['hotel-name']);
        $delete_sql = "DELETE FROM hotels WHERE name='". "$deleted_hotel" . "';";
        $result = mysqli_query($conn,$delete_sql);
        echo "<h1>". "$result" . "</h1>";
        
        if ($result) {
       header("location:hotels.php"); 
        }
    } 
     $filter = false ; 

     $get_hotels_sql = "SELECT * FROM hotels WHERE 1;";
     $all_hotels = mysqli_query($conn,$get_hotels_sql);
     echo("<div class ='container'>");
     while ($row = mysqli_fetch_assoc($all_hotels)) {
        $name=$row['name'];
        $link=$row['link'];
        $desc=$row['description'];
        $location=$row['location'];
        $photo =$row['photo'];
       
        echo(" <div class='card'>");
        echo("<img src='$photo' alt='' style = 'width:100%'>");
        echo("<h1>"."$name"."</h1>");   
        echo("<p class='location'>"."$location"."</p>");
        echo("<p>"."$desc"."</p>");
        echo("<form method='POST' name='delete-hotel-form' action='deletehotels.php'>."."<input type='hidden' name='hotel-name' value=".urlencode($name).">"); 

        echo("<input type='submit' class='button' value='Delete Hotel'>"."</form>");
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