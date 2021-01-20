<?php 
    require_once 'templates/funciones/sesiones.php';
    require_once 'templates/funciones/funciones.php';
	require_once 'templates/header.php';
    require_once 'templates/navegacion.php';
    require_once 'templates/barra.php';
?>
	<!-- Page header -->
    <div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO USUARIO
				</h3>
				<p class="text-justify">
					En el siguiente apartado podemos ingresar nuevos Administradores.	
				</p>
			</div>
			
			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a class="active" href="vista-agregar-admin.php"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO ADMINISTRADOR</a>
					</li>
					<li>
						<a href="vista-listar-admin.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE ADMINISTRADORES</a>
					</li>
				</ul>	
			</div>
			
    <!-- Content -->
    <div class="container-fluid">
					 <!-- id="crear-admin -> para enviar al archivo admin-ajax,js -->
				<form action="modelo-admin.php" method="POST" name="guardar-registro" id="guardar-registro"  class="form-neon" autocomplete="off">
					<br><br><br>
					<fieldset>
						<legend><i class="fas fa-user-lock"></i> &nbsp; Información de la cuenta</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="ci" class="bmd-label-floating">Nùmero de Ci</label>
										<input type="number" class="form-control" id="ci" name="ci">
									</div>
								</div>
                                <div class="col-12 col-md-6">
									<div class="form-group">
										<label for="nombre" class="bmd-label-floating">Nombre</label>
										<input type="text" class="form-control" id="nombre" name="nombre">
									</div>
								</div>
                                <div class="col-12 col-md-6">
									<div class="form-group">
										<label for="apellido" class="bmd-label-floating">Apellido</label>
										<input type="text" class="form-control" id="apellido" name="apellido">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="clave" class="bmd-label-floating">Contraseña</label>
										<input type="text" class="form-control" id="clave" name="clave">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="clave" class="bmd-label-floating">Repetir Contraseña</label>
										<input type="text" class="form-control" id="repetir_clave" name="repetir_clave">
										<span id="resultado_clave" class="help-block"></span>
									</div>
								</div>

								<div class="col-12 col-md-6">
   									 <input name="nivel" type="hidden" id="nivel" class="form-control" Placeholder="Nivel" value="1"/>
								</div>
							</div>
						</div>
					</fieldset>

					<p class="text-center" style="margin-top: 40px;">
					    <input type="hidden" name="registro" value="nuevo">
						<button type="submit" id="crear_registro" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; GUARDAR</button>
					</p>
				</form>
            </div>
            
 <?php
	require_once 'templates/footer.php';
?>