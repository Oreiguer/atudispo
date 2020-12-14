<?php 
include("../db/db.php"); 

// ------  Codigo variable de sesion de usuario desde login -------
 $var_sesion = $_SESSION['usery'];
  if($var_sesion == null || $var_sesion == ''){
      header("Location: index.php");
      die();
  }else{
    
    $query = "SELECT * FROM usuarios_tecnicos INNER JOIN comunas ON usuarios_tecnicos.comuna = comunas.id_comuna INNER JOIN regiones ON comunas.region = regiones.id_region WHERE usuarios_tecnicos.rut = '$var_sesion' ";
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
        $idTecnico = $row['id_tecnico'];


        $query2 = "SELECT * FROM fichas_tecnicas WHERE tecnico = '$idTecnico' ";
        $result2 = mysqli_query($conn, $query2);

        if(mysqli_num_rows($result2) == 1) {
          $rows = mysqli_fetch_array($result2);

          $presentacion = $rows['presentacion'];
          $formacion = $rows['formacion'];
          $habilidades = $rows['habilidades'];
          $experiencias = $rows['experiencias'];
          $certificado = $rows['certificado'];
        
        }else{
          $presentacion = "No hay datos";
          $formacion = "No hay datos";
          $habilidades = "No hay datos";
          $experiencias = "No hay datos";
          $certificado = "none";

        }
        
        
    } /* else{
        $_SESSION['login_mensaje'] = 'Usuario o contraseña incorrecto';
        $_SESSION['color_mensaje_login'] = 'danger';
        header("Location: ../public/index.php");
    } */
    
  }
 // ------  FIN Codigo variable de sesion de usuario desde login -------
?>

<!-----   Modal tec-datos-personales   ----->
<?php include("modals/datos-tec.php")?>

<!-----   Modal portafolio  ----->
<?php include("modals/portafolio.php")?>

<!-----   Seccion cabecera    ----->
<?php include("includes/header.php")?>

<!-----   Nav-bar   ----->
<?php include("includes/nav-bar-tecnico.php")?>

<div class="down-nav-tecnico ">
    <h4 class="text-center text-white pt-3">Perfil Técnico <?php echo $nombres ?> <?php echo $a_paterno ?></h4>
</div>

<!--------- Mensaje actualizacion de datos correctamente --------->
<?php include("mensajes_alertas/actualizacion_datos.php")?>
<!--------- FIN Mensaje actualizacion de datos correctamente --------->
    
<!--------- Mensaje datos guardados correctamente --------->
<?php include("mensajes_alertas/datos_guardados.php")?>
<!--------- FIN Mensaje datos guardados correctamente  --------->

<!--------- Mensaje datos guardados correctamente --------->
<?php include("mensajes_alertas/bienvenida_tecnico.php")?>
<!--------- FIN Mensaje datos guardados correctamente  --------->

<section class="perfil-tecnico bg-light ">
    <div class="mx-5">
        <div class="row py-5 ">

            <div class="col-6 rounded">
                <div class="item-especialidades bg-white rounded item-ptd">
                    <div class=" bg-white mb-3 p-4">
                        <h3 class="text-secondary d-flex">Especialidades</h3>
                        <hr>
                        <div class="row justify-content-center mb-4">
                          <div class="col-6">
                            <form action="../controllers/agregar_especialidad.php" method="POST">
                            <select class="form-control bg-white" required="" name="especialidad">
                              <option disabled="" selected="" value="">Selecciona especialidad</option>
                              <?php 

                              $query = "SELECT * FROM especialidades";
                              $result = mysqli_query($conn, $query);

                              while($row = mysqli_fetch_array($result)) { ?>
                      
                                <option value="<?php echo $row['id_especialidad']?>"><?php echo $row['descripcion_espe']?></option>

                              <?php } ?>
                            
                            </select>
                            <input type="hidden" name="tecnico" value="<?php echo $idTecnico ?>">
                          </div>
                          <div class="col-3">
                              <input class="btn btn-success form-control btn-sm" type="submit" name="agregar" id="" value="Agregar">
                          </div>
                          </form>
                        </div>
                        <div class="tabla-especialidades">
                          <table class="table table-striped">
                            <tbody>
                            
                              <?php 

                                $query = "SELECT * FROM especialidades_tecnicos INNER JOIN especialidades ON especialidades_tecnicos.especialidad = especialidades.id_especialidad WHERE especialidades_tecnicos.tecnico = '$idTecnico ' ";
                                $result = mysqli_query($conn, $query);
                                while($row = mysqli_fetch_array($result)) { ?>

                                <form action="../controllers/eliminar_especialidad.php" method="POST">
                                <tr>
                                  <th class="text-secondary pl-4" scope="row"><?php echo $row['descripcion_espe']?></th>
                                  <td class="text-right " >
                                    <input type="hidden" name="id_espe" value="<?php echo $row['id_especialidad_tecnico']?>">

                                    <button type="submit" name="eliminar" class="btn btn-danger" onclick="return confirma_eliminar()" >
                                    <i title="Eliminar" class="fas fa-trash-alt"> </i>
                                    </button>

                                  </td>
                                </tr>
                                </form>
                              <?php } ?>
                            
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>

                <div class="item-zonas-trabajo bg-white rounded item-ptd mt-5">
                    <div class=" bg-white mb-3 p-4">
                        <h3 class="text-secondary d-flex">Zonas de trabajo</h3>
                        <hr>
                        <div class="row justify-content-center mb-4">
                          <div class="col-6">
                            <form action="../controllers/agregar_zona.php" method="POST">

                            <select name="zonaComunas" required="" id="address" class="address-input form-control">
                              <option disabled="" selected="" value="">Selecciona tu comuna</option>
                              <optgroup label="Región Metropolitana">
                              <option value="La Florida">La Florida</option>
                              <option value="La Reina">La Reina</option>
                              <option value="Maipú">Maipú</option>
                              <option value="Providencia">Providencia</option>
                              <option value="Santiago">Santiago</option>
                              </optgroup>
                              <optgroup label="Sexta región">
                              <option value="Rancagua">Rancagua</option>
                              <option value="Rengo">Rengo</option>
                              <option value="Machalí">Machalí</option>
                              <option value="Doñihue">Doñihue</option>
                              <option value="Coltauco">Coltauco</option>
                              </optgroup>
                            </select>

                            <input type="hidden" name="tecnico" value="<?php echo $idTecnico ?>">
                            </div>
                            <div class="col-3">
                              <input class="btn btn-success form-control btn-sm" type="submit" name="btn-comunas" id="" value="Agregar">
                            </div>
                            </form>
                            
                        </div>

                        <div class="tabla-zona-trabajo">
                          <table class="table table-striped">
                            <tbody>
                            
                              <?php 

                                $query = "SELECT * FROM zonas_trabajo INNER JOIN comunas ON zonas_trabajo.comuna = comunas.id_comuna WHERE zonas_trabajo.tecnico = '$idTecnico ' ";
                                $result = mysqli_query($conn, $query);
                                while($row = mysqli_fetch_array($result)) { ?>

                                <form action="../controllers/eliminar_zona_trabajo.php" method="POST">
                                <tr>
                                  <th class="text-secondary pl-4" scope="row"><?php echo $row['descripcion_comuna']?></th>
                                  <td class="text-right " >
                                    <input type="hidden" name="id_zona" value="<?php echo $row['id_zona']?>">

                                    <button type="submit" name="eliminar" class="btn btn-danger" onclick="return confirma_eliminar()" >
                                    <i title="Eliminar" class="fas fa-trash-alt"> </i>
                                    </button>

                                  </td>
                                </tr>
                                </form>
                              <?php } ?>
                            
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>

                <div class=" bg-white rounded item-ptd mt-5">
                    <div class=" bg-white mb-3 p-4">
                        <h3 class="text-secondary d-flex">Presentación<button type="button" class="btn btn-outline-secondary ml-auto btn-sm" data-toggle="modal" data-target="#exampleModal">Editar</button></h3>
                        <hr>
                        <p> <?php echo $presentacion ?> </p>
                    </div>
                    
                    <div class=" bg-white rounded mb-3 p-4">
                        <h3 class="text-secondary d-flex">Formación</h3>
                        <hr>
                        <p><?php echo $formacion ?></p>
                    </div>
                    <div class=" bg-white rounded mb-3 p-4">
                        <h3 class="text-secondary d-flex">Habilidades</h3>
                        <hr>
                        <p><?php echo $habilidades ?></p>
                    </div>
                    <div class=" bg-white rounded mb-3 p-4">
                        <h3 class="text-secondary d-flex">Experiencias</h3>
                        <hr>
                        <p><?php echo $experiencias ?></p>
                    </div>
                </div>
            </div>

            <div class="col-6 rounded">
                
                <div class="bg-white rounded mb-3 p-4 item-ptd">
                    <h3 class="text-secondary d-flex">Datos personales<button type="button" id="btn-tec-datos-pers" class="btn btn-outline-secondary ml-auto btn-sm">Editar</button></h3>
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
                

                <div class="comentarios container rounded bg-white pb-5 mt-5 item-ptd">
                    <h3 class="text-secondary text-center pt-4">Comentarios recibidos</h3>
                    <hr>

                    <?php 
                      $query = "SELECT * FROM evaluaciones INNER JOIN usuarios_clientes ON evaluaciones.cliente = usuarios_clientes.id_cliente WHERE evaluaciones.tecnico = '$idTecnico' ORDER BY fecha DESC ";
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
                                  <span class="badge badge-primary badge-pill"><?php echo $row['nota1']?></span>
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

                      <h5 class="text-secondary mt-4 text-center">No tiene comentarios..</h5>

                    <?php }?>
                    
                </div>
            </div>


        </div>
    </div>    
</section>
    


<!-----   Seccion pie de pagina contenido    ----->
<?php include("includes/footer.php")?>