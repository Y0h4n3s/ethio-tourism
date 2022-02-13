
<!DOCTYPE html>
<html>

<head>
    <title>Add hotel</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/style.css">
   

</head>
<body>

<?php 

include_once('./pages/adminheader.php');
?>
    <main>
        <div class="form_container">
            <h2> ADD HOTEL </h2>
            <form method="POST" name="addhotel-form" action="addhotels.php">

            <div class = 'row'>
            <input name="name-input"/>
            <label for="name-input">Name</label>
            </div>

            <div class = 'row'>
            <input name="location-input" />
            <label for="location-input">Location</label>       
            </div>

            

            <div class = 'row'>
            <input name="image-input" />
            <label for="image-input">Image Link</label> 
            </div>

            <div class = 'row'>
            <textarea rows="5" cols="60" name="description-input" placeholder="Descrption"></textarea>
            
            </div>

            <div class = 'row'>
            <input name="link-input" />
            <label for="link-input">Hotel Link</label>    
            </div>

            
            <input class="button" type="submit" value="Add Hotel">
            </form>
           </div>
           <?php
require_once("connection.php");
      
      $hotel_name = $_POST['name-input'];
      
      $hotel_location = $_POST['location-input'];
      $image_link = $_POST['image-input'];
      
      $description = $_POST['description-input'];
      $hotel_link = $_POST['link-input'];
      $check_hotel_sql = "SELECT * FROM hotels WHERE name = '$hotel_name';";
      $hotel_result = mysqli_query($conn,$check_hotel_sql);
      
      $data = mysqli_fetch_array($hotel_result);
      
      if($data['name']==$hotel_name){
          echo("Hotel already exists");
      }
     else{
         
        $insert_sql = "INSERT INTO hotels (name, location, link, photo, description) VALUES ('$hotel_name', '$hotel_location', '$hotel_link','$image_link','$description');";
        
        $result = mysqli_query($conn,$insert_sql);
        

        if($result){
            

            echo '<script type="text/javascript">
            window.onload = function () { alert("Hotel is ADDED"); }
            </script>';
        }
        else{
            echo 'error occured try again';
        }
     }

?>

         </main> 
    
    <?php 

include_once('footer.php');
?>
</body>
</html>