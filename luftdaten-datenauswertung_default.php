<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>S.E.Frey Soft- und Hardwareentwicklung, SPS-Softwareentwicklung, SPS-Softwareentwicklung Bernau am Chiemsee, Elektrotechnik Bernau am Chiemsee</title>
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
        
        <?php include("get_mysql_data_daily_all.php"); ?>
        
        
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1 id="logo"><a href="index.html">S.E.Frey</a></h1>
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
						<span class="image"><img src="images/Ruhpolding_Wasserkraftwerk/Turbine_Ruhpolding_skaliert.png" alt="Erneuerung_Wasserkraftwerk_Ruhpolding" /></span>
					</div>
					<a href="#sps_software_hardwareentwicklung" class="goto-next scrolly">Next</a>
				</section>

			<!-- One -->
				<section id="sps_software_hardwareentwicklung" class="spotlight style1 bottom">
					<span class="image fit main"><img src="images/SPS.jpg" alt="" /></span>
					<div class="content">
						<div class="container">
							<div class="row">
								<div class="col-4 col-12-medium">
									<header>
										<h2>Tagesansicht</h2>
										<p>Per Default werden Temperatur,Luftfeuchtigkeit und Feinstaubbelastung angezeigt. Der Graph bietet 2 Funktionen:
                                            <ul>
                                                <li>Anklicken der Legende (z.B. Temperatur[°C]) deaktiviert den ausgewählten Graphen</li>
                                                <li>Fenster aufziehen um rein zu zoomen</li>
                                            </ul>
                                        </p>
									</header>
								</div>
								<div>
                                    <!-- graph with all data -->
									<p><b><?php echo $no_data_warning ?></b></p>
                        <div id="chart_pm_temp_hum" style="width:100%; height:400px;"></div>
                                    
                                    <script>
    $(function () { 
    var myChart = Highcharts.chart('chart_pm_temp_hum', {
        chart: {
            zoomType: 'x'
        },
        title: {
            text: 'Luftdaten <?php echo date("d.m.Y"); ?> - Bernau am Chiemsee (<?php echo count($a_Timestamp); ?> Messpunkte)'
        },
         colors: ['red', '#00CDFF', '#6EF78E', '#FFBC00'],
        xAxis: {
            categories: js_Timestamp
        },
        yAxis: {
            title: {
                text: ''
            }
        },
        series: [{
            name: 'Temperatur[°C]',
            data: js_Temperature
        },{
            name: 'Luftfeuchtigkeit[%rel. Hum.]',
            data: js_Humidity
        },{
            name: 'PM10[µg / m\xB3]',
            data: js_PM10
        },{
            name: 'PM2,5[µg / m\xB3]',
            data: js_PM25
        }]
    });
});
                        </script>
                                  
                                    <p>Mit meiner Messstation wird die Emission von Feinstaub in der Chiemseestraße 12 in Bernau am Chiemsee gemessen. Der verwendete Sensor misst dabei folgende 2 Feinstaubwerte:
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
                                    
                                    
								</div>
							</div>
						</div>
					</div>
					<a href="#Webdesign" class="goto-next scrolly">Next</a>
				</section>

			<!-- Two -->
				<section id="Webdesign" class="spotlight style3 left">
                    
					<span class="image fit main"><img src="images/webdesign/webdesign_complete4.png" alt="" /></span>
                    
					<div class="content_right_left">
                       
						<!--##ajax request and chart with weekly data################################################################################################################# -->
                            <?php include("luftdaten_chart_weekly.php"); ?>
						
                    </div>
                    
                    
					<a href="#Smart_Home_Hausautomatisierung" class="goto-next scrolly">Next</a>
				</section>

			<!-- Three -->
				<section id="Smart_Home_Hausautomatisierung" class="spotlight style2 right">
					<span class="image fit main bottom"><img src="images/smarthome.jpg" alt="" /></span>
					<div class="content">
						<header>
							<h2>Smart Home - Hausautomatisierung</h2>
							<p>Planung, Entwicklung und Programmierung von Hausautomatisierungskonzepten</p>
						</header>
						<p>
                            <ul>
                                <li>Konzeptentwicklung einer Gesamtlösung für Ihre persönlichen Ansprüche</li>
                                <li>Egal ob Neubau oder Nachrüsten ihres jetzigen Hauses</li>
                                <li>Neuanbindung eines Homeservers zur Steuerung und Verwaltung Ihres Eigenheims</li>
                                <li>Erstellung einer graphischen Benutzeroberfläche für die gesamte Kontrolle über ihr zu Hause</li>                        
                            </ul>
                        </p>
						<ul class="actions">
							<li><a href="#" class="button">Learn More</a></li>
						</ul>
					</div>
					<a href="#contact" class="goto-next scrolly">Next</a>
				</section>

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