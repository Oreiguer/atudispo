
<?php 

// ------  Codigo para cambio de contraseña -------
if(isset($_POST['cambiar_pass'])) {
    $usur = $_POST['usur'];
    $pass_act = $_POST['pass_actual'];
    $pass_nue = $_POST['pass_nueva1'];
    $pass_nue2 = $_POST['pass_nueva2'];
    

    if($usur == "" || $pass_act == "" || $pass_nue == "" || $pass_nue2 == ""){
        echo "<script> alert('Debe llenar todas las cajas') </script>";
    }else{

        if($pass_nue == $pass_nue2){
            $query = "SELECT * FROM usuarios_clientes where contrasena = '$pass_act' and correo = '$usur' ";

            $result = mysqli_query($conn, $query);

            if(mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result);
                $usuario = $row['id_cliente'];
                
                $query1 = "UPDATE usuarios_clientes SET contrasena = '$pass_nue' where id_cliente = '$usuario'"; 
                $result1 = mysqli_query($conn, $query1);
                if($result1){
                    
                    $_SESSION['cambio_pass'] = 'Contraseña actualizada';
                    $_SESSION['color_mensaje_cambio'] = 'success';
                    
                }else {
                    die("Fallo la consulta"); 
                }
            }else{
                $_SESSION['correo_pass_incorrecta'] = 'Correo o contraseña actual incorrectas';
                $_SESSION['color_mensaje'] = 'danger';
            }
        }else{
            $_SESSION['pass_noIgual'] = 'Contraseñas nuevas no coinciden!';
            $_SESSION['color_mensaje'] = 'danger';
        }
    }
}
// ------ FIN Codigo para cambio de contraseña -------
?>


<!--------- Modal cambio de contraseña  --------->
<div class="modal fade" id="exampleModalPass" tabindex="-1" role="dialog" 
aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" name="usur" placeholder="Correo" class="form-control" value="" maxlength="50" required onpaste="return false">
                <br>
                <input type="text" name="pass_actual" placeholder="Contraseña actual" class="form-control" value="" onkeypress="return  validar_solo_numeros(event);" required onpaste="return false" autocomplete="off" maxlength="8">
                <br>
                <input type="text" name="pass_nueva1" placeholder="Contraseña nueva" class="form-control" value="" onkeypress="return  validar_solo_numeros(event);" required onpaste="return false" autocomplete="off" maxlength="8">
                <br>
                <input type="text" name="pass_nueva2" placeholder="Reingrese contraseña nueva" class="form-control" value="" onkeypress="return  validar_solo_numeros(event);" required onpaste="return false" autocomplete="off" maxlength="8">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <input type="submit" class="btn btn-success " name="cambiar_pass" value="Cambiar Contraseña">
            </div>
            </div>
        </div>
    </form>    
</div>
<!-----   FIN MODAL cambio de contraseña   ----->


<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand h1 font-italic" href="index.php">Atudispo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="sugerencias.php">Sugerencias</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cliente
                        </a>
                        <div class="dropdown-menu bg-white " aria-labelledby="navbarDropdownMenuLink">

                            <a class="dropdown-item " id="" href="perfil_clientes.php" >
                            <i class="far fa-id-badge mr-3"></i>
                            Mi Perfil</a>

                            <a class="dropdown-item " id="" href="lista_evaluacion.php" >
                            <i class="fas fa-poll mr-3"></i>
                            Evaluar</a>

                            <a href="#" class="dropdown-item " data-toggle="modal" data-target="#exampleModalPass">
                            <i class="fas fa-unlock-alt mr-3"></i>
                            Contraseña</a>

                            <a class="dropdown-item " id="cerrar_cesion" href="controllers/cerrar_sesion.php" onclick="return confirma_salir()" href="#">
                            <i class="fas fa-power-off mr-3"></i>
                            Cerrar cesión</a>
                            
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

       <!--------- Mensaje Cambio de contraseña --------->
 <?php include("public/mensajes_alertas/mensaje_contrasena.php")?>
 <!--------- FIN Mensaje Cambio de contraseña --------->

        <!--------- Mensaje correo o contraseña no existen cambio pass --------->
        <?php include("public/mensajes_alertas/correo_pass_noExiste.php")?>
 <!--------- FIN Mensaje correo o contraseña no existen cambio pass--------->

         <!--------- Mensaje contraseñas nuevas no coinciden cambio pass --------->
         <?php include("public/mensajes_alertas/pass_no_son_iguales.php")?>
 <!--------- FIN Mensaje contraseñas nuevas no coinciden cambio pass--------->