
<!--**************************show weekly graph***********************************************************************************************************************************-->

<header>
							<h2>Jahresansicht</h2>
    <p>Feinstaub Bernau am Chiemsee - Feinstaubbelastung, Temperatur, Luftfeuchtigkeit</p>
						</header>
        
        
    
     <input onclick="ajax_yearly_data()" type="reset" value="Daten des ganzen Jahres anzeigen" />
    
   
            <div id="Nodatawarning_year"></div>
<div id="chart_weatherdata_yearly" style="width:100%; height:400px; display:none;">
<div id="loadingmessage" style="width:100%; height:400px; display:none;">   
                           
            <img src='/images/Spinner.gif'/>
        </div>
</div>          
        <p></p>
        
            <!--get data from mysql db over php file with ajax -->
            <script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript">
    //at first define variables needed for graph
    var js_PM10_year = null;
    var js_PM25_year = null;
    var js_Temp_year = null;
    var js_Hum_year = null;
    var js_Timestamp_year = null;
    var js_Nodatawarning_year = null;
    js_Graphdescription_year = null;
  
    
function ajax_yearly_data() {
    document.getElementById('loadingmessage').style.display = 'block';
    $.ajax({
                type: "POST",
                url: "get_airdata_mysql_yearly_v2.php", //file we want to get our data from
                dataType: "json",
               success: function(weather_data_yearly){
                   js_PM10_year = weather_data_yearly.PM10Year;
                   js_PM25_year = weather_data_yearly.PM25Year;
                   js_Temp_year = weather_data_yearly.TemperatureYear;
                   js_Hum_year = weather_data_yearly.HumidityYear;
                   js_Timestamp_year = weather_data_yearly.TimestampYear;
                   js_Graphdescription_year = weather_data_yearly.GraphdescriptionYear;
                   js_Nodatawarning_year = weather_data_yearly.NodatawarningYear;

                   if (js_Nodatawarning_year != null){
                   document.getElementById('Nodatawarning_year').innerHTML += js_Nodatawarning_year;
                   }
                   //convert data to float for chart
                    for(var i=0; i<js_PM10_year.length; i++) { js_PM10_year[i] = parseFloat(js_PM10_year[i], 10); };
                    for(var i=0; i<js_PM25_year.length; i++) { js_PM25_year[i] = parseFloat(js_PM25_year[i], 10); };
                    for(var i=0; i<js_Temp_year.length; i++) { js_Temp_year[i] = parseFloat(js_Temp_year[i], 10); };
                    for(var i=0; i<js_Hum_year.length; i++) { js_Hum_year[i] = parseFloat(js_Hum_year[i], 10); };
                    //for(var i=0; i<js_Timestamp_week.length; i++) { js_Timestamp_week[i] = Date.parse(js_Timestamp_week[i], 10)/1000; }; //Timestamp don´t needs to be converted, highchart can work with that
                    
                  /*
                   console.log(js_Timestamp_year);
                   console.log(js_PM10_year);
                   console.log(js_PM25_year);
                   console.log(js_Temp_year);
                   console.log(js_Hum_week);
                   console.log(js_Hum_year);
                   console.log(js_Nodatawarning_year);*/
/***************************lets fill chart with data and this displays the chart*************************************************************************************************************************************/ 
            // when button is clicked data from ajax request will be shown in graph myChart_weekly
            //this needs to be done because the graph does not show timestamp right (only shows the number of array->so arraysize not the content, i do not know why)
            //if the graph is loaded after the data is get from ajax request the timestamp is shown correctly

     var myChart_yearly = new Highcharts.chart('chart_weatherdata_yearly', {
        chart: {
            zoomType: 'x',
            backgroundColor: 'rgba(255,255,255,0.0)',
        },
        title: {
          style: {color: '#ffffff'},
            text: js_Graphdescription_year
        },
         colors: ['red', '#00CDFF', '#6EF78E', '#FFBC00'],
        xAxis: { 
            categories: js_Timestamp_year,
            labels: {
            style: {
                color: '#ffffff'
            }
            }
        },
        yAxis: {
            title: {
                text: ''
            }
        },
        series: [{
            name: 'Temperatur[°C]',
            data: js_Temp_year
        },{
            name: 'Luftfeuchtigkeit[%rel. Hum.]',
            data: js_Hum_year
        },{
            name: 'PM10[µg / m\xB3]',
            data: js_PM10_year
        },{
            name: 'PM2,5[µg / m\xB3]',
            data: js_PM25_year
        }]
    });
                   $('#loadingmessage').hide(); // hide the loading message
               }
    });
    
        //now display div of graph
        document.getElementById("chart_weatherdata_yearly").style.display = "block";
};
    
    
    
</script>
