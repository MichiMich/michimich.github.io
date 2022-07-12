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
$table_name = "daily_conclusion";
//echo "dbname: " . $dbname . " tblname: " . $table_name . "\n";


//Get data of active year
    $active_year = date("Y");
    $active_month = date("m");
    $active_week = date("W");
    $active_day = date("d");


/************************************search for data in *************************************************************************/
//get active day
$result = db_query("SELECT * FROM $table_name;", $dbname, true);
$a_Timestamp_daily = [];
$a_PM10_Max = [];
$a_PM10_Avg = [];

$a_PM25_Max = [];
$a_PM25_Avg = [];

$a_TempMax = [];
$a_TempMin = [];

$a_HumMax = [];
$a_HumMin = [];
$a_Timestamp_temp = [];
$i = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $a_Timestamp_daily[$i] = $row['Timestamp'];
        $a_Timestamp_temp[$i] = date("d.m.Y", strtotime("$a_Timestamp_daily[$i]"));
        $a_PM10_Max[$i] = $row['PM10_Max'];
        $a_PM10_Avg[$i] = $row['PM10_Avg'];
        
        $a_PM25_Max[$i] = $row['PM25_Max'];
        $a_PM25_Avg[$i] = $row['PM25_Avg'];
        
        $a_TempMax[$i] = $row['Temp_Max'];
        $a_TempMin[$i] = $row['Temp_Min'];
        
        
        $a_HumMax[$i] = $row['Hum_Max'];
        $a_HumMin[$i] = $row['Hum_Min'];
        
        $i = $i +1;
         
        //print_r(a_Timestamp[i]);
    }
} else {
    //echo "0 results";
    console.log("0 results");
}
//only take day month and year from timestamp
//$a_Timestamp_daily = date("d", strtotime("$a_Timestamp_daily"));
?>


  <!-- parse mysql data to js, to use it in chartjs and highcharts -->
        <script type="text/javascript">
           
            
           
            
            //json_encode does the trick, array_values() is used to get an array and not objects, we receive objects because our array has holes (i think 0 is not set)
            
            var js_Timestamp_daily = JSON.parse( '<?php echo json_encode(($a_Timestamp_daily)); ?>');
            var js_PM10_Max = JSON.parse( '<?php echo json_encode(($a_PM10_Max)); ?>');
            var js_PM10_Avg = JSON.parse( '<?php echo json_encode(($a_PM10_Avg)); ?>');
            var js_Timestamp_temp = JSON.parse( '<?php echo json_encode(($a_Timestamp_temp)); ?>');
            var js_PM25_Max = JSON.parse( '<?php echo json_encode(($a_PM25_Max)); ?>');
             var js_PM25_Avg = JSON.parse( '<?php echo json_encode(($a_PM25_Avg)); ?>');
            
            var js_TempMax = JSON.parse( '<?php echo json_encode(($a_TempMax)); ?>');
            var js_TempMin = JSON.parse( '<?php echo json_encode(($a_TempMin)); ?>');
            
            var js_HumMax = JSON.parse( '<?php echo json_encode(($a_HumMax)); ?>');
            var js_HumMin = JSON.parse( '<?php echo json_encode(($a_HumMin)); ?>');
            
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
            for(var i=0; i<js_PM10_Max.length; i++) { js_PM10_Max[i] = parseFloat(js_PM10_Max[i], 10); };
            for(var i=0; i<js_PM10_Avg.length; i++) { js_PM10_Avg[i] = parseFloat(js_PM10_Avg[i], 10); };
            
            
            for(var i=0; i<js_PM25_Max.length; i++) { js_PM25_Max[i] = parseFloat(js_PM25_Max[i], 10); };
            for(var i=0; i<js_PM25_Avg.length; i++) { js_PM25_Avg[i] = parseFloat(js_PM25_Avg[i], 10); };
            
            
            for(var i=0; i<js_TempMax.length; i++) { js_TempMax[i] = parseFloat(js_TempMax[i], 10); };
            for(var i=0; i<js_TempMin.length; i++) { js_TempMin[i] = parseFloat(js_TempMin[i], 10); };
            
            for(var i=0; i<js_HumMax.length; i++) { js_HumMax[i] = parseFloat(js_HumMax[i], 10); };
            for(var i=0; i<js_HumMin.length; i++) { js_HumMin[i] = parseFloat(js_HumMin[i], 10); };
            
            
            console.log(js_Timestamp_daily);
            console.log(js_Timestamp_temp);
            console.log(js_PM10_Max);
            console.log(js_PM10_Avg);
            console.log(js_PM25_Max);
            console.log(js_PM25_Avg);
            console.log(js_TempMax);
            console.log(js_TempMin);
            console.log(js_HumMax);
            console.log(js_HumMin);
            
            
        </script>