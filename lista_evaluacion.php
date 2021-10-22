<?php 
include("db/db.php"); 

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

        
        $nombres = $row['nombres'];
        $a_paterno = $row['a_paterno'];
       

        
    } /* else{
        $_SESSION['login_mensaje'] = 'Usuario o contraseña incorrecto';
        $_SESSION['color_mensaje_login'] = 'danger';
        header("Location: ../public/index.php");
    } */
    
  }
 // ------  FIN Codigo variable de sesion de usuario desde login -------
?>


<!-----   Seccion cabecera    ----->
<?php include("public/includes/header.php")?>

<!-----   Nav-bar   ----->
<?php include("public/includes/nav-bar-cliente.php")?>


<div class="down-nav-tecnico ">
    <h3 class="text-center text-white pt-3">Perfil Cliente <?php echo $nombres ?> <?php echo $a_paterno ?></h3>
</div>

<!--------- Mensaje actualizacion de datos correctamente --------->
<?php include("public/mensajes_alertas/evaluacion_realizada.php")?>
<!--------- FIN Mensaje actualizacion de datos correctamente --------->
    
<section class="listado_evaluacion">
  <div class="container">
    <div class="py-5 bg-light px-5">
      <input type="text" name="busqueda" id="busqueda" class="form-control " placeholder="Buscar por nombre, apellido o rut..." >
    </div>
    
    <div class="mb-5" id="tabla_resultado">




    </div>  
  </div>   
</section>
    


<!-----   Seccion pie de pagina contenido    ----->
<?php include("public/includes/footer.php")?>