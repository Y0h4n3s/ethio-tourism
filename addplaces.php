
<!DOCTYPE html>
<html>

<head>
    <title>Add places</title>
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
            <h2> ADD PLACE </h2>
            <form method="POST" name="addplaces-form" action="addplaces.php">

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

            
            <input class="button" type="submit" value="Add Place">
            </form>
           </div>
           <?php
require_once("connection.php");
      
      $place_name = $_POST['name-input'];
      
      $place_location = $_POST['location-input'];
      $image_link = $_POST['image-input'];
      
      $description = $_POST['description-input'];
      $check_place_sql = "SELECT * FROM places WHERE name = '$place_name';";
      $place_result = mysqli_query($conn,$check_place_sql);
      
      $data = mysqli_fetch_array($place_result);
      
      
      if($data != null && $data['name']==$place_name){
          echo("Place already exists");
      }
     else{
         
        $insert_sql = "INSERT INTO places (name, location,  photo, description) VALUES ('$place_name', '$place_location', '$image_link','$description');";
        $result = mysqli_query($conn,$insert_sql);
        

        if($result){
            

            echo '<script type="text/javascript">
            window.onload = function () { alert("Place is ADDED"); }
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