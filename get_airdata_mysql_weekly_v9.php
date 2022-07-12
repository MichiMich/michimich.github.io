<?php


/*************************************************functions for mysql connect and readout*****************************************************************************************************************/



/*************************************************functions for mysql connect and readout*****************************************************************************************************************/

/*get actual date for query data*/
//compensate time zone because received data does not have one
date_default_timezone_set('Europe/Berlin');

$dbname = "´" . date('Y') . "´";
//search for data of current week in month
$table_name = "´" . date('n') . "´";
//echo "dbname: " . $dbname . " tblname: " . $table_name . "\n";

function db_connect($dbname) {

    // Define connection as a static variable, to avoid connecting more than once 
    static $connection;
    //echo "connect to db with name: "  . $dbname;
    // Try and connect to the database, if a connection has not been established yet
    if(!isset($connection)) {
         // Load configuration as an array. Use the actual location of your configuration file
        $config = parse_ini_file('config.ini'); 
        $connection = mysqli_connect($config['address'],$config['username'],$config['password'],$dbname, 8457);
    }

    // If connection was not successful, handle the error
    if($connection === false) {
        // Handle error - notify administrator, log to a file, show an error screen, etc.
        $error = mysqli_connect_error();
        console.log($error); 
        //echo $error;
        return mysqli_connect_error(); 
    }
    
    return $connection;
}

function db_query($query, $dbname) {
    // Connect to the database
    $connection = db_connect($dbname);

    // Query the database
    $result = mysqli_query($connection,$query);

    return $result;
}

function db_error() {
    $connection = db_connect();
    return mysqli_error($connection);
}

/*************************************************get actual values*****************************************************************************************************************/




//Get data of active year
    $active_year = date("Y");
    $active_month = date("m");
    $active_week = date("W") - 1; //mysql weeks are from 0..51, php weeks get data from 1..52
    $active_day = date("d");
    $calendar_week = $active_week + 1;
    

/************************************search for data in *************************************************************************/
//get data from active month
$a_Timestamp = [];
$a_PM10 = array();
$a_PM25 = [];
$a_Temperature = [];
$a_Humidity = [];
$i = 0;

for ($counter = 1; $counter <=2; $counter++){
    //default table and db = actual year and actual month
    $dbname = "´" . date('Y') . "´";
    //search for data of current week in month
    $table_name = "´" . date('n') . "´";
/*********get data from last week in last month******************************************************************************************/
    if ($counter === 1){
        //get week data from last month
        if (date('n') != 1){
            //last month = actual - 1, actual month is not 01 (january)
            $table_name = "´" . (date('n') - 1) . "´";
            //echo "last month tablename: " . $table_name . " dbname: " . $dbname;
        }
        else{
            //simple solution in new year, data from last z
            $table_name = "´1´";
            $dbname = "´" . (date('Y')) . "´";
            $active_week = 0; //last week of the year
            /* week can get from last year to new one so data needs to be joined
            $table_name = "´12´";
            $dbname = "´" . (date('Y') - 1) . "´";
            $active_week = 52; //last week of the year
            //echo "last year tablename: " . $table_name . " dbname: " . $dbname;*/
        }
        $result = db_query("SELECT * FROM $table_name WHERE (WEEK(Timestamp) = $active_week)", $dbname);
    }
    else{
        $result = db_query("SELECT * FROM $table_name WHERE (WEEK(Timestamp) = $active_week)", $dbname);
    }
    
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
    
}
    
}

if (count($a_Timestamp) === 0){
    $no_data_warning_weekly = "Noch keine Daten für diese Woche verfügbar - Versuche es später noch einmal"; //show warning that there is no data for chart
}
else{
    $no_data_warning_weekly = NULL; //show no warning on page because there is data in graph
}

$calendar_week = "Luftdaten Woche " . $calendar_week . ", " . $active_year . " - Bernau am Chiemsee (" . count($a_Timestamp) . " Messpunkte)";

/*************************************************get actual values*****************************************************************************************************************/
//get last values of table
$result = db_query("SELECT * FROM daily WHERE id=0", "Luftdaten_db");
//print_r("ergebnis: " . $tata[0]->MAX(id));
$i = 0;
if ($result->num_rows > 0) {
    $no_data_warning_conclusion = NULL; //show no warning on page because there is data in graph
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
        
        
        
        //print_r(a_Timestamp[i]);
    }
} else {
    $no_data_warning_conclusion = "Noch keine Daten für diese Woche verfügbar - Versuche es später noch einmal"; //show warning that there is no data for chart
    //echo "0 results";
}


//generate object which contains all data who should be send to page with ajax
$weather_data_weekly = array();
  $weather_data_weekly_temp = array(
    "PM10"              => $a_PM10,
    "PM25"              => $a_PM25,
    "Temperature"       => $a_Temperature,
    "Humidity"          => $a_Humidity,
    "Timestamp"         => $a_Timestamp,
    "Calendarweek"      => $calendar_week,
    "Nodatawarning"   => $no_data_warning_weekly,
    "NodatawarningConclusion" => $no_data_warning_conclusion,
    
  );
  $weather_data_weekly = $weather_data_weekly_temp;


//send data with json format to ajax ->could be read by js(ajax) from calling page
echo json_encode($weather_data_weekly);








?>