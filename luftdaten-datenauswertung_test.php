<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
         <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108875685-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-108875685-2');
</script>
        
        
		<title>S.E.Frey Soft- und Hardwareentwicklung, SPS-Softwareentwicklung, SPS-Softwareentwicklung Bernau am Chiemsee, Elektrotechnik Bernau am Chiemsee</title>
        <link rel="icon" href="/favicon.ico"/>
        <link rel="shortcut icon" href="/favicon.ico"/>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <script src="assets/js/Chart.js"></script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
	</head>
	<body class="is-preload landing">
        
        <?php include("get_mysql_data_daily_conclusion.php"); ?>
        
        
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1 id="logo"><a href="index.php">S.E.Frey</a></h1>
					<nav id="nav">
						<!--##include menu (so menu can be changed for all in this file)################################################################################################################# -->
<?php include("menu.php"); ?>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header>
							<h2>S.E.Frey</h2>
							<p>Feinstaub Bernau am Chiemsee<br />
							Feinstaubbelastung, Temperatur, Luftfeuchtigkeit</p>
						</header>
						<span class="image"><img src="images/graph_background.jpg" alt="Erneuerung_Wasserkraftwerk_Ruhpolding" /></span>
					</div>
					<a href="#Tagesansicht" class="goto-next scrolly">Next</a>
				</section>

			

            <section>
            <div class="content" id="Tagesansicht">
                       <div class="container">
							<p></p>
									<header>
                                        <h2>Gute Luft in Bernau am Chiemsee</h2>
                                        <h3>Mittelwerte des ganzen Jahres <?php echo date("Y") ?></h3>
									</header>
                                    <!-- graph with all data -->
									<p><b><?php echo $no_data_warning ?></b></p>
                                
                                <p>Mit meiner Messstation wird die Emission von Feinstaub in der Chiemseestraße in Bernau am Chiemsee gemessen. Der verwendete Sensor misst dabei folgende 2 Feinstaubwerte:
                                <ul>
                                    <li>PM10: Partikel in der Luft mit einem Durchmesser kleiner als 10 µm</li>
                                    <li>PM2,5: Partikel in der Luft mit einem Durchmesser kleiner als 2,5 µm</li>
                                </ul>
                            </p>
                            <p>
                                Generell gilt je kleiner die Partikel die wir einatmen, desto schlechter ist das ganze für unseren Organismus. Die vorgegebenen Grenzwerte richten sich nach einem einzuhaltenden Tagesmittelwert.
                            </p>
                <table>
                    <tr>
                        <td><b>Vorgegebene Grenzwerte</b></td>
                        <td><b>Aktuelle Tagesmittelwerte</b></td>
                    </tr>
                    <tr>
                        <td>Grenzwert für PM10: 50 µg/m³</td>
                        <td>PM10: <?php echo round($PM10_Avg,2) ?> µg/m³</td>
                    </tr>
                    <tr>
                        <td>Grenzwert für PM2,5: 25 µg/m³</td>
                        <td>PM10: <?php echo round($PM25_Avg,2) ?> µg/m³</td>
                    </tr>
                
                
                </table>
                                
                          
                        <div id="chart_pm_temp_hum" style="width:100%; height:400px;"></div>
                                    
                                    <script>
    $(function () { 
    var myChart = Highcharts.chart('chart_pm_temp_hum', {
        chart: {
            type: 'line',
            zoomType: 'x',
            backgroundColor: 'rgba(255,255,255,0.0)',
        },
        title: {
            style: {color: '#ffffff'},
            text: 'Luftdaten Tagesmittelwerte <?php echo date("Y"); ?> - Bernau am Chiemsee (<?php echo count($a_Timestamp_daily); ?> Messpunkte)'
        },
         colors: ['#6EF78E', '#FFBC00'],
        xAxis: {
            categories: js_Timestamp_temp,
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
            name: 'PM10[µg / m\xB3]',
            data: js_PM10_Avg
        },{
            name: 'PM2,5[µg / m\xB3]',
            data: js_PM25_Avg
        }]
    });
});
                        </script>
                                  
                                    
                               
						
						
                            
					
				</div>
        <a href="#Temperaturwerte" class="goto-next scrolly">Next</a>
 </div>
</section>



        <div class="content" id="Temperaturwerte">
                       <div class="container">
							<p></p>
                           <div id="chart_temp_MaxMin" style="width:100%; height:400px;"></div>
                                    
                                    <script>
    $(function () { 
    var myChart = Highcharts.chart('chart_temp_MaxMin', {
        chart: {
            type: 'line',
            zoomType: 'x',
            backgroundColor: 'rgba(255,255,255,0.0)',
        },
        title: {
            style: {color: '#ffffff'},
            text: 'Max. Min. Temperaturen <?php echo date("Y"); ?> - Bernau am Chiemsee (<?php echo count($a_Timestamp_daily); ?> Messpunkte)'
        },
         colors: ['#FF6600', '#00CDFF'],
        xAxis: {
            categories: js_Timestamp_temp,
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
            name: 'Max. Temperatur [°C]',
            data: js_TempMax
        },{
            name: 'Min. Temperatur [°C]',
            data: js_TempMin
        }]
    });
});
                        </script>
                           
                        </div>
            <a href="#Luftfeuchtigkeitswerte" class="goto-next scrolly">Next</a>
        </div>
            
        
			<div class="content" id="Luftfeuchtigkeitswerte">
                       <div class="container">
							<p></p>
                           <div id="chart_Hum_MaxMin" style="width:100%; height:400px;"></div>
                                    
                                    <script>
    $(function () { 
    var myChart = Highcharts.chart('chart_Hum_MaxMin', {
        chart: {
            zoomType: 'x',
            backgroundColor: 'rgba(255,255,255,0.0)',
        },
        title: {
            style: {color: '#ffffff'},
            text: 'Luftfeuchtigkeit <?php echo date("Y"); ?> - Bernau am Chiemsee (<?php echo count($a_Timestamp_daily); ?> Messpunkte)'
        },
         colors: ['#261ff0', '#99CCFF'],
        xAxis: {
            categories: js_Timestamp_temp,
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
            name: 'Max. Luftfeuchtigkeit [%rel. Hum.]',
            data: js_HumMax
        },{
            name: 'Min. Luftfeuchtigkeit [%rel. Hum.]',
            data: js_HumMin
        }]
    });
});
                        </script>
                           
                        </div>
            <a href="#GenaueAuswertung" class="goto-next scrolly">Next</a>
        </div>
        
        
        <div class="content" id="GenaueAuswertung">
                       <div class="container">
							<p></p>
                           <header>
							<h2>Detaillierte Datenaufzeichnung</h2>
    <p>Wer´s genauer wissen will kann sich die einzelnen Messwerte ansehen.</p>
						</header>
                          <a class="button fit" href="luftdaten-datenauswertung_v2.php">Detaillierte Datenaufzeichnung</a>
                        </div>
            <a href="#contact" class="goto-next scrolly">Next</a>
        </div>

			
    
    

			<!-- Four -->
				<section id="contact" class="wrapper style1 special fade-up">
					<div class="container">
						<header class="major">
							<h2>Kontakt</h2>
						</header>
						<div class="box alt">
							<div class="row gtr-uniform">
								<section class="col-4 col-6-medium col-12-xsmall">
									
									<h3>S.E.Frey</h3>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall">
									<h3>B. Eng. Michael Frey</h3>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall">
									<h3>Chiemseestraße 12</h3>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall">
									<h3>83233 Bernau am Chiemsee</h3>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall">
									<h3>E-Mail: info@sefrey.de</h3>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall">
									<h3>Telefon: +49 1590 5423871</h3>
								</section>
							</div>
						</div>
						<footer class="major">
							<ul class="actions special">
								<li><a href="#banner" class="button">Zurück zum Anfang</a></li>
							</ul>
						</footer>
					</div>
				</section>

			
			<!-- Footer -->
				
					<?php include("share_footer.php"); ?>
					
				

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>