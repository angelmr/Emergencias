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
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE GESTIÓN DE PACIENTES EN LA PANDEMIA
				</h3>
				<p class="text-justify">
				En el sigiente apartado se encuentra la lista de todas las gestiones de pacientes en la pandemia.	
				</p>
			</div>
			
			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="vista-agregar-gestion.php"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVA GESTIÓN DE PACIENTE</a>
					</li>
					<li>
						<a class="active" href="vista-listar-gestion.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE GESTIÓN DE PACIENTES</a>
					</li>
				</ul>	
			</div>

    <!-- Content -->
			<div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
						<thead>
							<tr class="text-center roboto-medium">
								<th>Paciente</th>
								<th>Número de personas con las que vive</th>
								<th>Trabaja</th>
								<th>Lugar de trabajo</th>
								<th>Estudia</th>
								<th>Lugar de estudio</th>
								<th>Enfermedad catastrófica</th>
								<th>Diabetes</th>
								<th>Sobrepeso</th>
								<th>Asegurado IESS</th>
                                <th>Nombre contacto emergencia</th>
                                <th>Celular contacto emergencia</th>
                                <th>Email contacto emergencia</th>
                                <th>Opciones</th>
							</tr>
						</thead>
						<tbody>
                      
                          <?php
						  try {

							$sql = "SELECT id_gestionp,id_paciente, num_personas_vive, trabaja, institucion_trabaja, estudia, institucion_estudia, enfermedad, diabetes, sobrepeso, asegurado_IESS, nombre_contacto_emergencia,celular_contacto_emergencia, mail_contacto_emergencia FROM gestion_pandemia";
                            $resultado = $conn->query($sql);  
						  } catch (Exception $e) {
							  $error = $e->getMessage();
						  }
                            while($gestion = $resultado->fetch_assoc() ) { ?>

                             <tr class="text-center">
                                <td><?php echo $gestion['id_paciente']; ?></td>
                                <td><?php echo $gestion['num_personas_vive']; ?></td>
                                <td><?php echo $gestion['trabaja']; ?></td>
								<td><?php echo $gestion['institucion_trabaja']; ?></td>
								<td><?php echo $gestion['estudia']; ?></td>
                                <td><?php echo $gestion['institucion_estudia']; ?></td>
                                <td><?php echo $gestion['enfermedad']; ?></td>								
                                <td><?php echo $gestion['diabetes']; ?></td>
                                <td><?php echo $gestion['sobrepeso']; ?></td>
								<td><?php echo $gestion['asegurado_IESS']; ?></td>
                                <td><?php echo $gestion['nombre_contacto_emergencia']; ?></td>
                                <td><?php echo $gestion['celular_contacto_emergencia']; ?></td>
                                <td><?php echo $gestion['mail_contacto_emergencia']; ?></td>
                                <td>                                
                                <a href="" data-id="<?php echo $gestion['id_gestionp']?>" data-tipo="gestion" class="btn btn-danger borrar_registro">
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