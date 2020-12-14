<?php 
include("../db/db.php"); 

// ------  Codigo variable de sesion de usuario desde login -------
 $var_sesion = $_SESSION['usery_cliente'];
  if($var_sesion == null || $var_sesion == ''){
      header("Location: index.php");
      die();
  }else{
    
    $query = "SELECT * FROM usuarios_clientes INNER JOIN comunas ON usuarios_clientes.comuna = comunas.id_comuna INNER JOIN regiones ON comunas.region = regiones.id_region WHERE usuarios_clientes.rut = '$var_sesion' ";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);

        $rut = $row['rut'];
        $nombres = $row['nombres'];
        $a_paterno = $row['a_paterno'];
        $a_materno = $row['a_materno'];
        $sexo = $row['sexo'];
        $telefono = $row['telefono'];
        $correo = $row['correo'];
        $direccion = $row['direccion'];
        $region = $row['descripcion_region'];
        $comuna = $row['descripcion_comuna'];
        $idCliente = $row['id_cliente'];

        
    } /* else{
        $_SESSION['login_mensaje'] = 'Usuario o contraseña incorrecto';
        $_SESSION['color_mensaje_login'] = 'danger';
        header("Location: ../public/index.php");
    } */
    
  }
 // ------  FIN Codigo variable de sesion de usuario desde login -------
?>

<!-----   Modal tec-datos-personales   ----->
<?php include("modals/datos-clientes.php")?>

<!-----   Modal portafolio  ----->
<?php include("modals/portafolio.php")?>

<!-----   Seccion cabecera    ----->
<?php include("includes/header.php")?>

<!-----   Nav-bar   ----->
<?php include("includes/nav-bar-cliente.php")?>

<div class="down-nav-tecnico ">
    <h4 class="text-center text-white pt-3">Perfil Cliente <?php echo $nombres ?> <?php echo $a_paterno ?></h4>
</div>
    

<!--------- Mensaje actualizacion de datos correctamente --------->
<?php include("mensajes_alertas/actualizacion_datos.php")?>
<!--------- FIN Mensaje actualizacion de datos correctamente --------->


<section class="perfil-tecnico bg-light ">
    <div class="mx-5">
        <div class="row py-5 ">

            <div class="col-6 rounded">
              <div class="comentarios container rounded bg-white pb-5 item-ptd">
                <h3 class="text-secondary text-center pt-4">Comentarios realizados </h3>
                <hr>

                <?php 
                  $query = "SELECT * FROM evaluaciones INNER JOIN usuarios_tecnicos ON evaluaciones.tecnico = usuarios_tecnicos.id_tecnico WHERE evaluaciones.cliente = '$idCliente' ORDER BY fecha DESC ";
                  $result = mysqli_query($conn, $query);

                  if(mysqli_num_rows($result) > 0) {
      
                    while($row = mysqli_fetch_array($result)) { ?>

                        <div class="card mt-3 w-100 item-shadow">
                          <div class="card-body row pr-4">
                            <div class="col-7">
                              <h5 class="card-title"><?php echo $row['nombres']?> <?php echo $row['a_paterno']?></h5>
                              <p class="card-text"><?php echo $row['comentario']?></p>
                              <p class="card-text mt-4"><small class="text-muted"><?php echo $row['fecha']?></small></p>
                            </div>
                            <div class="ml-auto">
                              <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                Puntualidad
                                  <span class="badge badge-primary badge-pill "><?php echo $row['nota1']?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                  Desempeño
                                  <span class="badge badge-primary badge-pill"><?php echo $row['nota2']?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                  Responsabilidad
                                  <span class="ml-3 badge badge-primary badge-pill"><?php echo $row['nota3']?></span>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>

                <?php }}else{ ?>

                  <h4 class="text-secondary text-center mt-5">No hay resultados..</h4>

                <?php  } ?> 
                    
              </div>
            </div>

            <div class="col-6 rounded">
                
                <div class="bg-white rounded mb-3 p-4 item-ptd">
                    <h3 class="text-secondary d-flex">Datos personales<button type="button" id="btn-cli-datos-pers" class="btn btn-outline-secondary ml-auto btn-sm" data-toggle="modal" data-target="#exampleModalDatos">Editar</button></h3>
                    <hr>
                    <table class="table table-striped">
                      <tbody>
                      <tr>
                        <th class="text-secondary pl-4" scope="row">Rut</th>
                        <td class="" ><?php echo $rut ?></td>
                        
                      </tr>
                      <tr>
                        <th class="text-secondary pl-4" scope="row">Nombres</th>
                        <td><?php echo $nombres ?></td>
                        
                      </tr>
                      <tr>
                        <th class="text-secondary pl-4" scope="row">A. paterno</th>
                        <td><?php echo $a_paterno ?></td>
                        
                      </tr>
                      <tr>
                        <th class="text-secondary pl-4" scope="row">A. materno</th>
                        <td><?php echo $a_materno ?></td>
                        
                      </tr>
                      <tr>
                        <th class="text-secondary pl-4" scope="row">Sexo</th>
                        <td><?php echo $sexo ?></td>
                        
                      </tr>
                      <tr>
                        <th class="text-secondary pl-4" scope="row">Fono</th>
                        <td><?php echo $fono ?></td>
                        
                      </tr>
                      <tr>
                        <th class="text-secondary pl-4" scope="row">Correo</th>
                        <td><?php echo $correo ?></td>
                        
                      </tr>
                      <tr>
                        <th class="text-secondary pl-4" scope="row">Direccion</th>
                        <td><?php echo $direccion ?></td>
                        
                      </tr>
                      <tr>
                        <th class="text-secondary pl-4" scope="row">Region</th>
                        <td><?php echo $region ?></td>
                        
                      </tr>
                      <tr>
                        <th class="text-secondary pl-4" scope="row">Comuna</th>
                        <td><?php echo $comuna ?></td>
                        
                      </tr>
                      </tbody>
                    </table>
                </div>
                

                
            </div>


        </div>
    </div>    
</section>
    


<!-----   Seccion pie de pagina contenido    ----->
<?php include("includes/footer.php")?>