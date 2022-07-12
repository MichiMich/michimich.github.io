


<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand page-scroll" href="#page-top">S.E.Frey</a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right" id="hauptmenu">
        <li><a href="#SPS" class="page-scroll" style="display: none"><a href="/detailed/sps.php">SPS-Entwicklung</a></a></li>
        <li><a href="#Webdesign" class="page-scroll" style="display: none"><a href="/detailed/webdesign.php">Webdesign</a></a></li>
        <li><a href="#Smart_Home" class="page-scroll" style="display: none"><a href="/detailed/smart-home.php">Smart Home</a></a></li>
        <li><a href="#Projekte" class="page-scroll" style="display: none"><a href="/sps-software-hardwareentwicklung.php">Projekte</a></a></li>
        <li><a href="#Contact" class="page-scroll" style="display: none"><a href="http://sefrey.de#contact">Kontakt</a></a></li>
        <a class="btn btn-info" onclick="OpenSubmenu()" style="">Mehr <i class="fa fa-caret-down"></i></a>
        </ul> 
      
        <ul class="nav navbar-nav navbar-right" id="submenu">
        <li><a href="#Wetter" class="page-scroll" style="display: none"><a href="/luftdaten-datenauswertung.php">Wetter- und Feinstaubdaten</a></a></li>
        <li><a href="#Über" class="page-scroll" style="display: none"><a href="/Kontakt.php">Über S.E.Frey</a></a></li>
        <li><a href="#Impressum" class="page-scroll" style="display: none"><a href="/Impressum.php">Impressum</a></a></li>
        <li><a href="#Datenschutz" class="page-scroll" style="display: none"><a href="/Datenschutz.php">Datenschutz</a></a></li>
        <a class="btn btn-info" onclick="CloseSubmenu()">Weniger <i class="fa fa-caret-up"></i></a>
        </ul>
      </div>
      
    
      
    <!-- /.navbar-collapse --> 
  </div>
</nav>




<script type="text/javascript">

document.getElementById('submenu').style.display = 'none';
document.getElementById('hauptmenu').style.display = 'block';
    
function OpenSubmenu(){
document.getElementById('submenu').style.display = 'block';
document.getElementById('hauptmenu').style.display = 'none';
   
}
    
function CloseSubmenu(){
document.getElementById('hauptmenu').style.display = 'block';
document.getElementById('submenu').style.display = 'none';
   
}  



</script>