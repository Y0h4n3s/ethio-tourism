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
        echo('d8ds');

        if($result){
            echo('dds');

            echo '<script type="text/javascript">
            window.onload = function () { alert("Hotel is ADDED"); }
            </script>';
        }
        else{
            echo 'error occured try again';
        }
     }

?>