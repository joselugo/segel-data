	<!-- begin row -->
	<div class="row">
		<a href="#ajustes/general" data-toggle="ajax" class="btnajustes btn btn-lg btn-white">
			<i class="fas fa-cog fa-2x"></i><br>
			General</a>
		<a href="#sistema/gestion_personal" data-toggle="ajax" class="btnajustes btn btn-lg btn-white">
			<i class="fas fa-users fa-2x"></i><br>
			Gestión personal</a>
		<!-- <a href="#bdatabase" data-toggle="ajax" class="btnajustes btn btn-lg btn-white">
			<i class="fas fa-database fa-2x"></i><br>
			Base de datos</a> -->
		<!-- <a href="#ajustes/log" data-toggle="ajax" class="btnajustes btn btn-lg btn-white">
			<i class="fas fa-cogs fa-2x"></i><br>
			Logs</a> -->
		<!-- <a href="#ajax/ajustes?action=licencia" data-toggle="ajax" class="btnajustes btn btn-lg btn-white">
			<i class="fas fa-info-circle fa-2x"></i><br>
			Licencia</a> -->
		<a href="#rutas/index" data-toggle="ajax" class="btnajustes btn btn-lg btn-white">
			<i class="fas fa-key"></i><br>
			Lista Permisos</a>
		<a href="#ajustes/ajuste_sucursal" data-toggle="ajax" class="btnajustes btn btn-lg btn-white">
			<i class="fas fa-store-alt"></i><br>
			Oficinas</a>


	</div>
	<!-- end row -->

	<script>
		$(document).ready(function() {
			App.restartGlobalFunction();
			App.setPageTitle('Ajustes');
		})
	</script>