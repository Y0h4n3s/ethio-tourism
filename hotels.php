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
        echo("<p>."."<a href='$link' target='_blank'>"."<button>"."Hotel Link"."</button>"."</a>"."</p>"); 
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