<!DOCTYPE html>
<html >
<head>
    <title>Places</title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/place.css">


</head>
<body>
  

    <?php 

include_once('pages/header.php');
?>
    <main>
    

<?php 
    
     require_once("connection.php");
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