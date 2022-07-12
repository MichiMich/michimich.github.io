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
        
    <!-- custom stylesheets -->
       <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome/css/font-awesome.css">
        
		<link rel="stylesheet" href="assets/css/main4.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
               
        <script src="assets/js/Chart.js"></script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <?php include("send-mail.php"); ?> 
	</head>
	<body class="is-preload">
        
        <!-- Header -->
			<header id="header" class="alt">
				<div class="logo"><a href="#page-top">S.E.Frey</a></div>
				<a href="#menu">Menu</a>
			</header>
        
        <!-- Nav -->
			
     <nav id="menu">
				<ul class="links">
					<li><a href="https://www.sefrey.de/index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="/detailed/sps.php">SPS-Entwicklung</a></li>
                    <li><a href="/detailed/webdesign.php">Webdesign</a></li>
					<li><a href="/detailed/smart-home.php">Smart Home</a></li>
					<li><a href="/sps-software-hardwareentwicklung.php">Projekte</a></li>
					<li><a href="http://sefrey.de#contact">Kontakt</a></li>
					<li><a href="/Kontakt.php">Über S.E.Frey</a></li>
					<li><a href="/luftdaten-datenauswertung.php">Wetter- und Feinstaubdaten</a></li>
					<li><a href="/Impressum.php">Impressum</a></li>
					<li><a href="/Datenschutz.php">Datenschutz</a></li>
				</ul>
			</nav>
        <!-- Banner -->
        <div id="page-wrapper">
            
        <?php include("get_mysql_data_daily_all.php"); ?>
        
			<!-- Banner -->
				<section id="banner" class="banner full">
					<div class="content">
						<header>
							<h2>S.E.Frey</h2>
							<p>Feinstaub Bernau am Chiemsee<br />
							Feinstaubbelastung, Temperatur, Luftfeuchtigkeit</p>
						</header>
						<span class="image"><img src="images/graph_background.jpg" alt="Luftdatengraph" /></span>
					</div>
					<a href="#Tagesansicht" class="goto-next scrolly">Next</a>
                    <article style="display:none">
                        </article>
				</section>

			

			
<!-- Main -->
				<div id="main" class="wrapper style1">
            
            <div class="content" id="Tagesansicht">
                       <div class="container">
							<p></p>
									<header>
										<h2>Tagesansicht</h2>
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
            zoomType: 'x',
            backgroundColor: 'rgba(255,255,255,0.0)',
        },
        title: {
            style: {color: '#ffffff'},
            text: 'Luftdaten <?php echo date("d.m.Y"); ?> - Bernau am Chiemsee (<?php echo count($a_Timestamp); ?> Messpunkte)'
        },
         colors: ['red', '#6EF78E', '#FFBC00'],
        xAxis: {
            categories: js_Timestamp,
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
            data: js_Temperature
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
                                  
                                    
                               
						
						
                            
					
				</div>
        <a href="#Wochenansicht" class="goto-next scrolly">Next</a>
 </div>




        <div class="content" id="Wochenansicht">
                       <div class="container">
							<p></p>
                           <?php include("luftdaten_chart_weekly.php"); ?>
                        </div>
            <a href="#Monatsansicht" class="goto-next scrolly">Next</a>
        </div>
            
        
			<div class="content" id="Monatsansicht">
                       <div class="container">
							<p></p>
                           <?php include("luftdaten_chart_monthly.php"); ?>
                        </div>
            <a href="#Jahresansicht" class="goto-next scrolly">Next</a>
        </div>
        
        
        
        
        <div class="content" id="Jahresansicht">
           
                       <div class="container">
							<p></p>
                         
                           
                    
                           
                           <?php include("luftdaten_chart_yearly_v2.php"); ?>
                           
                        </div>
            
            <a href="#contact" class="goto-next scrolly">Next</a>
        </div>

			
    
    

		 <!-- Form -->
							<section id="contact" class="wrapper style1 special fade-up">
                                
								<header class="major">
							         <h2>Kontakt</h2>
						      </header>
								<form method="post" action="#">
									<div class="row gtr-uniform gtr-50">
										<div class="col-6 col-12-xsmall">
											<input type="text" name="name" id="name" value="" placeholder="Name" />
										</div>
										<div class="col-6 col-12-xsmall">
											<input type="email" name="email" id="email" value="" placeholder="Email" />
										</div>
										<div>
											<input type="checkbox" id="copy" name="copy">
											<label for="copy">Kopie an mich</label>
										</div>
										<div class="col-12">
											<textarea name="message" id="message" placeholder="Nachricht hier eingeben" rows="6"></textarea>
										</div>
										<div class="col-12">
											<ul class="actions">
												<li><input type="submit" name="submit" value="Nachricht senden" class="primary" /></li>
												<li><input type="reset" value="Reset" /></li>
											</ul>
										</div>
									</div>
								</form>
							</section>

			
					
				
            </div>
		</div>

	
		<?php include("scripts1.php"); ?>

	</body>

					<?php include("share_footer.php"); ?>
</html>