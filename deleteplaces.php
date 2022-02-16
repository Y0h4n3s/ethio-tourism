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

    
    if (isset($_POST['place-name'])) {
        $deleted_place = urldecode($_POST['place-name']);
        $delete_sql = "DELETE FROM places WHERE name='". "$deleted_place" . "';";
        $result = mysqli_query($conn,$delete_sql);
        
        if ($result) {
       header("location:destination.php"); 
        }
    } 
     $filter = false ; 
     
    
     $all_places_sql = "SELECT * FROM places;";
     $all_places = mysqli_query($conn,$all_places_sql);
     echo("<div class ='container'>");
     while ($row = mysqli_fetch_assoc($all_places)) {
        $name=$row['name'];
        $desc=$row['description'];
        $location=$row['location'];
        $photo =$row['photo'];
       
        echo(" <div class='card'>");
        echo("<img src='$photo' alt='' style = 'width:100%'>");
        echo("<h1>"."$name"."</h1>");
        echo("<p class='location'>"."$location"."</p>");
        echo("<p>"."$desc"."</p>");
        echo("<form method='POST' name='delete-place-form' action='deleteplaces.php'>."."<input type='hidden' name='place-name' value=".urlencode($name).">"); 

        echo("<input type='submit' class='button' value='Delete Destination'>"."</form>");
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