<?php require_once('database_functions.php'); ?>
<html>


    <head>
        <title>Cash Me Parking</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='css/style.css' rel='stylesheet' type='text/css'>
    </head>




<body>

<!-- Side Nav =igation Finction and Style Starts Here -->
<!--  Disabled Side Nav
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>

<div id="main">
  <h2>Sidenav Push Example</h2>
  <p>Click on the element below to open the side navigation menu, and push this content to the right. Notice that we add a black see-through background-color to body when the sidenav is opened.</p>

  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
</div> -->


<!-- <script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
}
</script> -->


<!-- Side Navigation Function and Style Ends Here -->



                <div class="container mx-auto col-md-8">

                    <h1>JAM Parking App<!--<a href="http://bootstrapious.com">Bootstrapious.com</a>--></h1>
                    <p class="lead">This web-application is created with the intention to help New York residents who goes through tough time finding public parking spots</p>
                    <!--<p>What this does.</p>
                    <p><strong>Parking Spot</strong>The purpose of this is for me to find out whats going on.<em>next thing</em> lol <code>lll</code>, whaat <a href="#">Ut felis.</p>  -->

                </div>

        <br /><br />

        <div class="container mx-auto col-md-8" id="map"></div>

        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbmQSmcoYw8gdndISRXwyZMvGEqCNPv3w"></script>
     <!--    <script src="main.js"></script> -->

        <br />
        <br />
        <br />
        <br />
        <br />

    </body>

      <?php

       require_once('js_function.php');
       // require_once('main.ph');

       ?>


</html>
<?php close_connection(); ?>
