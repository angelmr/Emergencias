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
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE ADMINISTRADORES
				</h3>
				<p class="text-justify">
				En el sigiente apartado se encuentra la lista de todos los Administradores Actuales.	
				</p>
			</div>
			
			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="vista-agregar-admin.php"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO ADMINISTRADOR</a>
					</li>
					<li>
						<a class="active" href="vista-listar-admin.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE ADMINISTRADORES</a>
					</li>
				</ul>	
			</div>

    <!-- Content -->
			<div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
						<thead>
							<tr class="text-center roboto-medium">
								<th>Cedula</th>
								<th>Nombre</th>
								<th>Apellido</th>
                                <th>Opciones</th>
							</tr>
						</thead>
						<tbody>
                      
                          <?php
						  try {

							$sql = "SELECT admin_id, admin_ci, admin_nombre, admin_apellido FROM admins";
                            $resultado = $conn->query($sql);  
						  } catch (Exception $e) {
							  $error = $e->getMessage();
						  }
                            while($admin = $resultado->fetch_assoc() ) { ?>

                             <tr class="text-center">
                                <td><?php echo $admin['admin_ci']; ?></td>
                                <td><?php echo $admin['admin_nombre']; ?></td>
                                <td><?php echo $admin['admin_apellido']; ?></td>
                                <td>
                                <a href="vista-editar-admin.php?id=<?php echo $admin['admin_id']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="" data-id="<?php echo $admin['admin_id']?>" data-tipo="admin" class="btn btn-danger borrar_registro">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                </td>
                            <tr>
                            <?php } ?>
                        
        			</tbody>
					</table>
				</div>
			</div>
 <?php
	require_once 'templates/footer.php';
?>      