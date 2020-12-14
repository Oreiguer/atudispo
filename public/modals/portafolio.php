<!-- Modal portafolio -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title pl-5" id="exampleModalLabel">Datos Portafolio</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body container px-5">
	  
      <?php 


// ------  Codigo solicitud datos usuarios_tecnicos para editar -------

    $query = "SELECT * FROM fichas_tecnicas WHERE tecnico = '$idTecnico' ";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);

        $presentacion = $row['presentacion'];
        $formacion = $row['formacion'];
        $habilidades = $row['habilidades'];
        $experiencias = $row['experiencias'];
        $certificado = $row['certificado'];
        

        $b = "d-none";
        $a = "";
       
    }else{
        $presentacion = "No hay datos";
        $formacion = "No hay datos";
        $habilidades = "No hay datos";
        $experiencias = "No hay datos";
        $certificado = "none";

        $a = "d-none";
        $b = "";
    } 
    

 // ------  FIN Codigo variable de sesion de usuario desde login -------
?>	  
 
	    
	  
        <form action="../controllers/c_portafolio.php" method="POST" enctype="multipart/form-data" name="reloj24" id="form1">
			
			<div class="form-group">
				<label for="recipient-name" class="col-form-label">Presentacion:</label>
				<textarea class="form-control" value="" name="presentacion" rows="4" cols="50" required><?php echo $presentacion ?></textarea>			
			</div>
			<div class="form-group">
				<label for="recipient-name" class="col-form-label">Formacion:</label>
				<textarea class="form-control" value="" name="formacion" rows="4" cols="50" required><?php echo $formacion ?></textarea>			
			</div>
            
            <div class="form-group">
                <label for="">Certificado:</label>
                <input type="file" name="archivo" value="<?php echo $certificado ?>" class="form-control">
            </div>
            
			<div class="form-group">
				<label for="recipient-name" class="col-form-label">Habilidades:</label>
				<textarea class="form-control" value="" name="habilidades" rows="4" cols="50" required><?php echo $habilidades ?></textarea>			
			</div>
			<div class="form-group">
				<label for="recipient-name" class="col-form-label">Experiencias:</label>
				<textarea class="form-control" value="" name="experiencias" rows="4" cols="50" required><?php echo $experiencias ?></textarea>			
			</div>
			
			<input type="hidden" name="id_tecnico" value="<?php echo $idTecnico ?>">

			<br>
			<div class="row justify-content-center pb-3">
				<div class="col-6">
					<input type="submit" name="f_actualizar" class="btn btn-primary form-control <?php echo $a ?>" value="Actualizar">
				</div>
				
				<div class="col-6">
					<input type="submit" name="f_guardar" class="btn btn-success form-control <?php echo $b ?>" value="Guardar">
				</div>
			</div>
			</form>
      </div>
    </div>
  </div>
</div>
<!-- FIN Modal portafolio -->








