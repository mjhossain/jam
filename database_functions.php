<?php

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '2369901297');
    define('DB_NAME', 'jam');

  // Function open database connection
    function open_connection() {
        global $con;
        $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS ,DB_NAME);

        if (!$con) {
          echo "Connection to database failed";
        }
      }

  // Function closes database connection
    function close_connection(){
      global $con;
      mysqli_close($con);
    }

    function mysql_query($sql){
        global $con;
        $result = mysqli_query($con, $sql);
    		confirm_query($result);
    		return $result;
	   }

    function confirm_query($result) {

    		global $con;

    		if (!$result) {
    			die("Database query failed: " . mysqli_error($con));
    		}
    	}

    function add_record($name, $address, $lat, $lng, $type) {

    	global $con;

    	 $name = $_POST["name"];
        $address = $_POST["address"];
        $lat = $_POST['lat'];
        $lng = $_POST['lng'];
        $type = $_POST['type'];


        $query  = "INSERT INTO markers (";
        $query .= "  name, address, lat, lng, type";
        $query .= ") VALUES (";
        $query .= "  '{$name}', '{$address}', '{$lat}', '{$lng}', '{$type}'";
        $query .= ")";
        $result = mysqli_query($con, $query);
      }


    function redirect($location) {
    	header ("Location: " . $location);
    	exit;
    }

    function mysql_prep($string) {
    	global $con ;
    	$sqlinj_defence = mysqli_real_escape_string($con, $string);
    	return $sqlinj_defence ;
    }

    // function confirm_query($result_set) {
    // 		if (!$result_set) {
    // 			die("Database query failed: " . mysql_error());
    // 		}
    // }



    function find_all_markers(){
    	//Function for finding markers
    	global $con ;

    	$query = "SELECT * FROM markers ";
    	$markers_set = mysqli_query($con, $query);
    	return $markers_set;
    }


    function selected_ids(){

    	global $selected_marker_id;

    	if (isset($_GET["marker"])) {
    		$selected_marker_id = $_GET["marker"];
    	} else {
    		$selected_marker_id = null;
    	}
    }

    function find_marker_by_id($marker_id) {
    	global $con ;

    	$safe_marker_id = mysqli_real_escape_string($con, $marker_id);

    	$query = "SELECT * FROM markers WHERE id = {$safe_marker_id} LIMIT 1";
    	$marker_set = mysqli_query($con, $query);

    	if ($marker = mysqli_fetch_assoc($marker_set)) {
    		return $marker;
    	} else {
    		return null;
    	}
    }

    function count_all() {

      global $con;

      $query = "SELECT COUNT(*) FROM markers";
      $result_set = mysqli_query($con, $query);
      $rows = mysqli_fetch_array($result_set);
      return $rows;
    }






    open_connection();





 ?>
