<!DOCTYPE html>
<html>

<head>
    <title>Add Packages</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/style.css">


</head>

<body>

    <?php

    include_once('./pages/adminheader.php');
    include_once('./connection.php');

    $package_name = $_POST['name-input'];
      
    $package_hotel = urldecode($_POST['hotel-input']);
    $package_destination = $_POST['place-input'];
    $package_price = $_POST['price-input'];
    
    $check_package_sql = "SELECT * FROM packages WHERE name = '$package_name';";
    $package_result = mysqli_query($conn,$check_package_sql);
    
    $data = mysqli_fetch_array($package_result);
    
    
    if($data != null && $data['name']==$package_name){
        echo("Package already exists");
    }
   else{
       
      $insert_sql = "INSERT INTO packages (name, hotel,  place, price) VALUES ('$package_name', '$package_hotel', $package_destination,$package_price);";
      echo "$insert_sql";
      $result = mysqli_query($conn,$insert_sql);
      

      if($result){
          

          echo '<script type="text/javascript">
          window.onload = function () { alert("Package is ADDED"); }
          </script>';
      }
      else{
          echo 'error occured try again';
      }
   }

    ?>
    <main>
        <div class="form_container">
            <h2> ADD Package </h2>
            <form method="POST" name="addpackage-form" id="addpackage-form" action="addpackage.php">

                <div class='row'>
                    <input name="name-input" />
                    <label for="name-input">Name</label>
                </div>

                <div id="hotel-input-row" class='row'>
                </div>


                <div id="places-input-row" class='row'>
                   
                </div>



                <div id="price-input-row" class='row'>
                    <label for="price-input">Price</label>
                    <input type="number" name="price-input"/>
                </div>





                <input class="button" type="submit" value="Add Package">
            </form>
        </div>
        <script>
            function createElementFromHTML(htmlString) {
                let div = document.createElement('div');
                div.innerHTML = htmlString.trim();
                return div.firstChild;
            }
            (async () => {
                let places = await (await fetch(window.origin + "/getplaces.php")).json();
                let hotels = await (await fetch(window.origin + "/gethotels.php")).json();
                console.log(places, hotels);

                const hotelsSelect = `
                <div>
                <p>Hotels</p>
                <select form="addpackage-form" id="hotels-input-select" name='hotel-input'>${
                    hotels.map(hotel => `<option value=${encodeURI(hotel.name)}>${hotel.name}</option>`).reduce((acc, nxt) => acc + nxt)
                }</select>
                </div>`
                const hotelInputRow = document.getElementById("hotel-input-row");
                hotelInputRow.appendChild(
                    createElementFromHTML(hotelsSelect)
                )


                const placesSelect = `
                <div> 
                <p >Places</p>
                <select form="addpackage-form" id="places-input-select" name='place-input'>
                ${
                    places.map(place => `<option value=${place.id}>${place.name}</option>`).reduce((acc, nxt) => acc + nxt)
                }
                </select>
                </div>`
                const placeInputRow = document.getElementById("places-input-row");
                placeInputRow.appendChild(
                    createElementFromHTML(placesSelect)
                )
            })()
        </script>
    </main>

    <?php

    include_once('footer.php');
    ?>
</body>

</html>