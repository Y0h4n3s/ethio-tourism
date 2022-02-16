   <?php 
     require_once("connection.php");

     $all_places_sql = "SELECT * FROM places;";
     $all_places = mysqli_query($conn,$all_places_sql);
     $places = array();
     while($row = mysqli_fetch_assoc($all_places)) {
         array_push($places, $row);
     }
     echo json_encode($places);
     ?>