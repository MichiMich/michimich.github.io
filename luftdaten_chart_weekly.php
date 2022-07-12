
<!--**************************show weekly graph***********************************************************************************************************************************-->
<header>
							<h2>Wochenansicht</h2>
    <p>Feinstaub Bernau am Chiemsee - Feinstaubbelastung, Temperatur, Luftfeuchtigkeit</p>
						</header>
    
    
   <input onclick="ajax_weekly_data()" type="reset" value="Daten der ganzen Woche anzeigen" class="primary"/>

            <p></p>
    <div id="Nodatawarning_week"></div>
<div id="chart_weatherdata_weekly" style="width:100%; height:400px; display:none;">
<div id="loadingmessage_weekly" style="width:100%; height:400px; display:none;"> 
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
    var js_Timestamp_week = [];
    var js_PM10_week = null;
    var js_PM25_week = null;
    var js_Temp_week = null;
    var js_Hum_week = null;
    var js_Timestamp_week = null;
    var js_Calendarweek = null;
    var js_Nodatawarning = null;
    var js_nodatawarningConclusion = null;
    
  
    
function ajax_weekly_data() {
    document.getElementById('loadingmessage_weekly').style.display = 'block';
    $.ajax({
                type: "POST",
                url: "get_airdata_mysql_weekly_v11.php", //file we want to get our data from
                dataType: "json",
                error: function(xhr, status, error) {
                    $('#loadingmessage_weekly').hide(); // hide the loading message
                    $('#ErrorMessage').show(); // hide the loading message
                    alert(error);
                    alert(status);
                    console.warn(xhr.responseText);
                },
               success: function(weather_data_weekly){
                   js_PM10_week = weather_data_weekly.PM10;
                   js_PM25_week = weather_data_weekly.PM25;
                   js_Temp_week = weather_data_weekly.Temperature;
                   js_Hum_week = weather_data_weekly.Humidity;
                   js_Timestamp_week = weather_data_weekly.Timestamp;
                   js_Calendarweek = weather_data_weekly.Calendarweek;
                   js_Nodatawarning = weather_data_weekly.Nodatawarning;
                   js_nodatawarningConclusion = weather_data_weekly.NodatawarningConclusion;
                   
                   if (js_Nodatawarning != null){
                   document.getElementById('Nodatawarning_week').innerHTML += js_Nodatawarning;
                   }
                   //convert data to float for chart
                    for(var i=0; i<js_PM10_week.length; i++) { js_PM10_week[i] = parseFloat(js_PM10_week[i], 10); };
                    for(var i=0; i<js_PM25_week.length; i++) { js_PM25_week[i] = parseFloat(js_PM25_week[i], 10); };
                    for(var i=0; i<js_Temp_week.length; i++) { js_Temp_week[i] = parseFloat(js_Temp_week[i], 10); };
                    for(var i=0; i<js_Hum_week.length; i++) { js_Hum_week[i] = parseFloat(js_Hum_week[i], 10); };
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

     var myChart_weekly = new Highcharts.chart('chart_weatherdata_weekly', {
        chart: {
            zoomType: 'x',
            backgroundColor: 'rgba(255,255,255,0.0)',
        },
        title: {
          style: {color: '#ffffff'},
            text: js_Calendarweek
        },
         
         colors: ['red', '#6EF78E', '#FFBC00'],
        xAxis: { 
            categories: js_Timestamp_week,
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
            data: js_Temp_week
        },{
            name: 'PM10[µg / m\xB3]',
            data: js_PM10_week
        },{
            name: 'PM2,5[µg / m\xB3]',
            data: js_PM25_week
        }]
         
    });
                   $('#loadingmessage_weekly').hide(); // hide the loading message
               }
    });
    
        //now display div of graph
        document.getElementById("chart_weatherdata_weekly").style.display = "block";
};
    
    
    
</script>
