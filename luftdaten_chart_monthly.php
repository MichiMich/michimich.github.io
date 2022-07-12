
<!--**************************show weekly graph***********************************************************************************************************************************-->

<header>
							<h2>Monatsansicht</h2>
    <p>Feinstaub Bernau am Chiemsee - Feinstaubbelastung, Temperatur, Luftfeuchtigkeit</p>
						</header>
        
        
     <input onclick="ajax_monthly_data()" type="reset" value="Daten des ganzen Monats anzeigen" class="primary"/>
    
    
            <div id="Nodatawarning_month"></div>
<div id="chart_weatherdata_monthly" style="width:100%; height:400px; display:none;">
<div id="loadingmessage_monthly" style="width:100%; height:400px; display:none;">   
                           
            <img src='/images/Spinner.gif'/>
        </div>
    <div id="ErrorMessage" style="display: none">
    <h3>Oha, Daten nicht gefunden. Es tut mir Leid, schau später nochmal nach.</h3>
    </div>
</div>          
        <p></p>
        
            <!--get data from mysql db over php file with ajax -->
            <script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript">
    //at first define variables needed for graph
    var js_PM10_month = null;
    var js_PM25_month = null;
    var js_Temp_month = null;
    var js_Hum_month = null;
    var js_Timestamp_month = null;
    var js_Calendarmonth = null;
    var js_Nodatawarning_month = null;
    
  
    
function ajax_monthly_data() {
     document.getElementById('loadingmessage_monthly').style.display = 'block';
    $.ajax({
                type: "POST",
                url: "get_airdata_mysql_monthly_v2.php", //file we want to get our data from
                dataType: "json",
                error: function() {
                    $('#loadingmessage_monthly').hide(); // hide the loading message
                    $('#ErrorMessage').show(); // hide the loading message
                },
               success: function(weather_data_monthly){
                   js_PM10_month = weather_data_monthly.PM10Month;
                   js_PM25_month = weather_data_monthly.PM25Month;
                   js_Temp_month = weather_data_monthly.TemperatureMonth;
                   js_Hum_month = weather_data_monthly.HumidityMonth;
                   js_Timestamp_month = weather_data_monthly.TimestampMonth;
                   js_Graphdescription_month = weather_data_monthly.GraphdescriptionMonth;
                   js_Nodatawarning_month = weather_data_monthly.NodatawarningMonth;

                   if (js_Nodatawarning_month != null){
                   document.getElementById('Nodatawarning_month').innerHTML += js_Nodatawarning_month;
                   }
                   
                   //convert data to float for chart
                    for(var i=0; i<js_PM10_month.length; i++) { js_PM10_month[i] = parseFloat(js_PM10_month[i], 10); };
                    for(var i=0; i<js_PM25_month.length; i++) { js_PM25_month[i] = parseFloat(js_PM25_month[i], 10); };
                    for(var i=0; i<js_Temp_month.length; i++) { js_Temp_month[i] = parseFloat(js_Temp_month[i], 10); };
                    for(var i=0; i<js_Hum_month.length; i++) { js_Hum_month[i] = parseFloat(js_Hum_month[i], 10); };
                    //for(var i=0; i<js_Timestamp_week.length; i++) { js_Timestamp_week[i] = Date.parse(js_Timestamp_week[i], 10)/1000; }; //Timestamp don´t needs to be converted, highchart can work with that
                    
                  
                   /*
                   console.log(js_PM10_week);
                   console.log(js_PM25_week);
                   console.log(js_Temp_week);
                   console.log(js_Hum_week);
                   console.log(js_Timestamp_week);
                   */
/***************************lets fill chart with data and this displays the chart*************************************************************************************************************************************/ 
            // when button is clicked data from ajax request will be shown in graph myChart_weekly
            //this needs to be done because the graph does not show timestamp right (only shows the number of array->so arraysize not the content, i do not know why)
            //if the graph is loaded after the data is get from ajax request the timestamp is shown correctly

     var myChart_monthly = new Highcharts.chart('chart_weatherdata_monthly', {
        chart: {
            zoomType: 'x',
            backgroundColor: 'rgba(255,255,255,0.0)',
        },
        title: {
          style: {color: '#ffffff'},
            text: js_Graphdescription_month
        },
         colors: ['red', '#6EF78E', '#FFBC00'],
        xAxis: { 
            categories: js_Timestamp_month,
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
            data: js_Temp_month
        },{
            name: 'PM10[µg / m\xB3]',
            data: js_PM10_month
        },{
            name: 'PM2,5[µg / m\xB3]',
            data: js_PM25_month
        }]
    });
                   $('#loadingmessage_monthly').hide(); // hide the loading message
               }
    });
    
        //now display div of graph
        document.getElementById("chart_weatherdata_monthly").style.display = "block";
};
    
    
    
</script>

