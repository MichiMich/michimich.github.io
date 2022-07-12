<?php

function db_connect($dbname, $new_connection) {

    // Define connection as a static variable, to avoid connecting more than once 
    static $connection;
    //echo "connect to db with name: "  . $dbname;
    // Try and connect to the database, if a connection has not been established yet
    if(!isset($connection)) {
         // Load configuration as an array. Use the actual location of your configuration file
        $config = parse_ini_file('config.ini'); 
        $connection = mysqli_connect($config['address'],$config['username'],$config['password'], $dbname, 8457);
    }
    else{
        $config = parse_ini_file('config.ini'); 
        $connection = mysqli_connect($config['address'],$config['username'],$config['password'], $dbname, 8457, true);
    }

    // If connection was not successful, handle the error
    if($connection === false) {
        // Handle error - notify administrator, log to a file, show an error screen, etc.
        $error = mysqli_connect_error();
        //echo $error;
        return mysqli_connect_error(); 
    }
    
    return $connection;
}

function db_query($query, $dbname, $new_connection) {
    // Connect to the database
    $connection = db_connect($dbname, $new_connection);

    // Query the database
    $result = mysqli_query($connection,$query);
    return $result;
}

function db_error() {
    $connection = db_connec();
    return mysqli_error($connection);
}

/*************************************************connect to new db*****************************************************************************************************************/



/*************************************************get actual values*****************************************************************************************************************/
//get todays values
$result = db_query("SELECT * FROM daily WHERE id=0", "Luftdaten_db", false);

//print_r("ergebnis: " . $tata[0]->MAX(id));
$i = 0;
if ($result->num_rows > 0) {
     $no_data_warning = NULL; //show no warning on page because there is data in graph
    // output data of each row
    while($row = $result->fetch_assoc()) {      
        //echo "Time: " . $row["Timestamp"]. " - PM10: " . $row["PM10"]. " PM2,5" . $row["PM25"]. " Temp:" . $row["Temperature"]. " Humidity: " . $row["Humidity"]. "<br>"; 
        //add 1 hour for correct date and time information
        $Temp_Actual = $row['Temp_Actual'];
        $Temp_Max = $row['Temp_Max'];
        $Temp_Min = $row['Temp_Min'];
        
        $Hum_Actual = $row['Hum_Actual'];
        $Hum_Max = $row['Hum_Max'];
        $Hum_Min = $row['Hum_Min'];
        
        $PM10_Actual = $row['PM10_Actual'];
        $PM10_Max = $row['PM10_Max'];
        $PM10_Avg = $row['PM10_Avg'];
        
        $PM25_Actual = $row['PM25_Actual'];
        $PM25_Max = $row['PM25_Max'];
        $PM25_Avg = $row['PM25_Avg'];
        
        $Timestamp_Actual = $row['Timestamp'];
        
        //print_r(a_Timestamp[i]);
    }
} else {
    $no_data_warning = "Noch keine Daten für diese Woche verfügbar - Versuche es später noch einmal"; //show warning that there is no data for chart
    //echo("0 results");
}


/*get actual date for query data*/
//compensate time zone because received data does not have one
date_default_timezone_set('Europe/Berlin');

$dbname = "´" . date('Y') . "´";
$table_name = "´" . date('n') . "´";
//echo "dbname: " . $dbname . " tblname: " . $table_name . "\n";


//Get data of active year
    $active_year = date("Y");
    $active_month = date("m");
    $active_week = date("W");
    $active_day = date("d");


/************************************search for data in *************************************************************************/
//get active day
$result = db_query("SELECT * FROM $table_name WHERE (DAY(Timestamp) = $active_day)", $dbname, true);
$a_Timestamp = [];
$a_PM10 = [];
$a_PM25 = [];
$a_Temperature = [];
$a_Humidity = [];
$i = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $a_Timestamp[$i] = $row['Timestamp'];
        $a_PM10[$i] = $row['PM10'];
        $a_PM25[$i] = $row['PM25'];
        $a_Temperature[$i] = $row['Temperature'];
        $a_Humidity[$i] = $row['Humidity'];
        $i = $i +1;
         
        //print_r(a_Timestamp[i]);
    }
} else {
    //echo "0 results";
    console.log("0 results");
}


?>


  <!-- parse mysql data to js, to use it in chartjs and highcharts -->
        <script type="text/javascript">
           
            //json_encode does the trick, array_values() is used to get an array and not objects, we receive objects because our array has holes (i think 0 is not set)
            var js_Timestamp = JSON.parse( '<?php echo json_encode(($a_Timestamp)); ?>');
            var js_PM10 = JSON.parse( '<?php echo json_encode(($a_PM10)); ?>');
            var js_PM25 = JSON.parse( '<?php echo json_encode(($a_PM25)); ?>');
            var js_Temperature = JSON.parse( '<?php echo json_encode(($a_Temperature)); ?>');
            var js_Humidity = JSON.parse( '<?php echo json_encode(($a_Humidity)); ?>');
            //console.log(js_Timestamp + js_PM10 + js_PM25 + js_Temperature + js_Humidity);
            /*
            alert(typeof(js_PM10));
            alert(typeof(js_Timestamp));
            alert(typeof(js_PM25));
            alert(typeof(js_Temperature));
            alert(typeof(js_Humidity));*/
            /*
            for (var i in js_Timestamp) 
{
   console.log("row " + i);
   for (var j in js_Timestamp[i]) 
     {
      console.log(" " + js_Timestamp[i][j]);
     }
}*/
                           
            //for highcharts we have to insert numbers at axis not string (only xAxis works with strings) so we convert our string array to float array
            for(var i=0; i<js_PM10.length; i++) { js_PM10[i] = parseFloat(js_PM10[i], 10); };
            for(var i=0; i<js_PM25.length; i++) { js_PM25[i] = parseFloat(js_PM25[i], 10); };
            for(var i=0; i<js_Temperature.length; i++) { js_Temperature[i] = parseFloat(js_Temperature[i], 10); };
            for(var i=0; i<js_Humidity.length; i++) { js_Humidity[i] = parseFloat(js_Humidity[i], 10); };
            
            console.log(js_PM10);
            console.log(js_Timestamp);
            console.log(js_PM10);
            console.log(js_PM25);
            console.log(js_Temperature);
            console.log(js_Humidity);
        </script>