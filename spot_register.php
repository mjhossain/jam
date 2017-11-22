<?php require_once('database_functions.php'); ?>

<?php

    if (isset($_POST['submit'])) {

        // Code pasted for another file Below
        $spot_name = mysql_prep($_POST["spot_name"]);
        $lat = (float) $_POST["lat"];
        $lng = (float) $_POST["lng"];
        // be sure to escape the content
        $address = mysql_prep($_POST["address"]);
        $type = mysql_prep($_POST["type"]);

        $query  = "INSERT INTO markers (name, address, lat, lng, type) VALUES ('{$spot_name}', '{$address}', {$lat}, {$lng}, '{$type}')";

        $result = mysqli_query($con, $query);

        //Debug
        if ($result) {
              // Success
              echo "New Spot Created";
              // redirect("manage_content.php");
            } else {
              // Failure
              echo "Spot Registration failed";
            }


      } else {
              // Proceed with the form
      }




 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registration form</title>
  </head>
  <body>
        <form class="register_form" action="spot_register.php" method="post">
              <p>Spot Name: <input type="text" name="spot_name" value=""> </p> <br>
              <p>Latitude: <input type="text" name="lat" value=""> </p> <br>
              <p>Longitude: <input type="text" name="lng" value=""> </p> <br>
              <p>Address: <input type="text" name="address" value=""> </p> <br>
              <p>Spot Type: <input type="text" name="type" value=""> </p> <br>

              <br>
                  <input type="submit" name="submit" value="Submit">

        </form>
  </body>
</html>
