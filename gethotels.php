<?php 
     require_once("connection.php");

     $all_hotels_sql = "SELECT * FROM hotels;";
     $all_hotels = mysqli_query($conn,$all_hotels_sql);
     $hotels = array();
     while($row = mysqli_fetch_assoc($all_hotels)) {
         array_push($hotels, $row);
     }
     echo json_encode($hotels);
     ?>