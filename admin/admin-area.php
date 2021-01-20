<?php 
	require_once 'templates/header.php';
    require_once 'templates/navegacion.php';
    require_once 'templates/funciones/sesiones.php';
	include 'locations.php';
?>
<section >
			<nav class="full-box navbar-info">
				<a href="#" class="float-left show-nav-lateral">
					<i class="fas fa-exchange-alt"></i>
				</a>				
                <a href="vista-editar-admin.php?id=<?php echo $_SESSION['id']; ?>">
					<i class="fas fa-user-cog"></i>
				</a>
				<a href="../../index.php?cerrar_sesion=true" class="btn-exit-system">
					<i class="fas fa-power-off"></i>
				</a>
			</nav>
</section>
<body>
<div id="map"></div>

<!------ Include the above in your HEAD tag ---------->
<script>
    var map;
    var marker;
    var infowindow;
    var red_icon =  'http://maps.google.com/mapfiles/ms/icons/red-dot.png';
    var purple_icon =  'http://maps.google.com/mapfiles/ms/icons/purple-dot.png';
    var locations = <?php get_all_locations() ?>;

    function initMap() {
        var ecuador = {lat: -1.831239, lng: -78.183406};
        infowindow = new google.maps.InfoWindow();
        map = new google.maps.Map(document.getElementById('map'), {
            center: ecuador,
            zoom: 7.3
        });


        var i ; var confirmed = 0;
        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][6], locations[i][7]),
                map: map,
                icon :   red_icon,
                html: document.getElementById('form')
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {          
                    infowindow = new google.maps.InfoWindow();         
					$("#id_paciente").val(locations[i][0]);
					$("#nombres").val(locations[i][1]);
					$("#apellidos").val(locations[i][2]);
					$("#fecha_nacimiento").val(locations[i][3]);
					$("#sexo").val(locations[i][4]);
					$("#direccion").val(locations[i][5]);
					$("#lat").val(locations[i][6]);
					$("#lng").val(locations[i][7]);
					$("#cedula").val(locations[i][8]);
					$("#convencional").val(locations[i][9]);
					$("#celular").val(locations[i][10]);
					$("#correo").val(locations[i][11]);
                    $("#form").show();
                    infowindow.setContent(marker.html);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    }

    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                callback(request.responseText, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }
</script>
<div style="display: none" id="form">
    <table class="map1">
        <tr><td><a>Nombres:</a></td><td><input disabled id='nombres'></td></tr>
		<tr><td><a>Apellidos:</a></td><td><input disabled id='apellidos'></td></tr>
		<tr><td><a>Fecha nacimiento:</a></td><td><input disabled id='fecha_nacimiento'></td></tr>
		<tr><td><a>Sexo:</a></td><td><input disabled id='sexo'></td></tr>
		<tr><td><a>Direccion:</a></td><td><input disabled id='direccion' ></td></tr>
		<tr><td><a>Latitud:</a></td><td><input disabled id='lat'></td></tr>
		<tr><td><a>Longitud:</a></td><td><input disabled id='lng'></td></tr>
		<tr><td><a>Cédula:</a></td><td><input disabled id='cedula'></td></tr>
		<tr><td><a>Convencional:</a></td><td><input disabled id='convencional'></td></tr>
		<tr><td><a>Celular:</a></td><td><input disabled id='celular'></td></tr>
		<tr><td><a>Correo:</a></td><td><input disabled id='correo' ></td></tr>        
    </table>
</div>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?language=eskey=AIzaSyA-AB-9XZd-iQby-bNLYPFyb0pR2Qw3orw&callback=initMap">
</script>

<?php
	require_once 'templates/footer.php';
?>