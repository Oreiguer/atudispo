<?php 
include("db/db.php"); 

// ------  Codigo variable de sesion de usuario desde login -------
 $var_sesion = $_SESSION['usery_cliente'];
  if($var_sesion == null || $var_sesion == ''){
      header("Location: index.php");
      die();
  }
 // ------  FIN Codigo variable de sesion de usuario desde login -------

 if(isset($_GET['id'])) {
    
  $id_tecnico = $_GET['id'];
  $query = "SELECT * FROM usuarios_clientes WHERE rut = '$var_sesion' ";

  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $id_cliente = $row['id_cliente'];
    $nombres = $row['nombres'];
    $a_paterno = $row['a_paterno'];
        
  } 
}

?>


<!-----   Seccion cabecera    ----->
<?php include("public/includes/header.php")?>

<!-----   Nav-bar   ----->
<?php include("public/includes/nav-bar-cliente.php")?>


<div class="down-nav-tecnico ">
    <h3 class="text-center text-white pt-3">Perfil Cliente <?php echo $nombres ?> <?php echo $a_paterno ?></h3>
</div>
    
<section class="evaluacion_tecnico bg-light pb-5">
    <div class="row justify-content-center ">
      <div class="item-ptd col-7 bg-white rounded mt-5 p-5">
        <form action="controllers/c_evaluacion.php" method="POST" >
        <h2 class="text-center text-secondary">Evaluación al técnico</h2>
        <hr>
        <div class="row mt-5 mb-3">
          <div class="col-4 ">
            <div class="form-group">
              <select name="puntualidad" required="" id="address" class="form-control">
                  <option disabled="" selected="" value="">Puntualidad</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
              </select>
            </div>
          </div>
          <div class="col-4">
            <div class="form-group ">
              <select name="desempeno" required="" id="address" class="form-control">
                <option disabled="" selected="" value="">Desempeño </option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>
          </div>
          <div class="col-4">
            <div class="form-group ">
              <select name="responsabilidad" required="" id="address" class="form-control">
                <option disabled="" selected="" value="">Responsabilidad</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="recipient-name" class="col-form-label">Comentario:</label>
          <textarea class="form-control" value="" required="" name="comentario" placeholder="Escribe un comentario de tu experiencia.." rows="4" cols="50" required></textarea>			
			  </div>

        <input type="hidden" name="tecnico" value="<?php echo $id_tecnico?>">
        <input type="hidden" name="cliente" value="<?php echo $id_cliente?>">

        <div class="row justify-content-center mt-5">
          <div class="col-6">
            <input type="submit" name="guardar" class="btn btn-success form-control <?php echo $b ?>" value="Guardar">
          </div>
        </div>
        </form>
      </div>
      
    </div>
     
</section>
    


<!-----   Seccion pie de pagina contenido    ----->
<?php include("public/includes/footer.php")?>