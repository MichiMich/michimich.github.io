<?php


/*************************************************functions for mysql connect and readout*****************************************************************************************************************/

/*get actual date for query data*/
//compensate time zone because received data does not have one
date_default_timezone_set('Europe/Berlin');

$SelectedYear = $_POST['data']; //get choosed year from select tag

//echo $SelectedYear;

$dbname = "´" . $SelectedYear . "´";

//$dbname = "´" . date('Y') . "´";
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
$a_Timestamp = [];
$a_PM10 = [];
$a_PM25 = [];
$a_Temperature = [];
$a_Humidity = [];



//Get data of active year
    $active_year = $SelectedYear;//date("Y");
    $active_month = date("m");
    $active_week = date("W") - 1; //mysql weeks are from 0..53, php weeks get data from 1..54
    $active_day = date("d");


/************************************search for data in *************************************************************************/
//get data from active year
$i = 0; //needs to be 0 otherwise json.parse does not work and we get only objects back
for ($counter = 1; $counter <=12; $counter++)
{ //get content of table 1..12 ->all months
    $table_name = "´" . $counter . "´"; //search in table ´1´(january) up to ´12´ (december)
    $result = db_query("SELECT * FROM $table_name WHERE (YEAR(Timestamp) = $active_year)", $dbname);
    /*
    $a_Timestamp = [];
    $a_PM10 = [];
    $a_PM25 = [];
    $a_Temperature = [];
    $a_Humidity = [];
    $i = 0;*/
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
     
    }
}

if (count($a_Timestamp) === 0){
    $no_data_warning_yearly = "Noch keine Daten für dieses Jahr verfügbar - Versuche es später noch einmal"; //show warning that there is no data for chart
}
else{
    $no_data_warning_yearly = NULL; //show no warning on page because there is data in graph
}


$Graph_description_year = "Luftdaten Jahr " . $active_year . " - Bernau am Chiemsee (" . count($a_Timestamp) . " Messpunkte)";
//generate object which contains all data who should be send to page with ajax
$weather_data_yearly = array();
  $weather_data_yearly_temp = array(
    "PM10Year"              => $a_PM10,
    "PM25Year"              => $a_PM25,
    "TemperatureYear"       => $a_Temperature,
    "HumidityYear"          => $a_Humidity,
    "TimestampYear"         => $a_Timestamp,
    "GraphdescriptionYear"         => $Graph_description_year,
    "NodatawarningYear"   => $no_data_warning_yearly,
    
  );
  $weather_data_yearly = $weather_data_yearly_temp;


//send data with json format to ajax ->could be read by js(ajax) from calling page
echo json_encode($weather_data_yearly);


?>