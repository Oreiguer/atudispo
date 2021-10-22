<?php 
include("../db/db.php"); 

if(isset($_POST['enviar'])) {

    $id = $_POST['id'];
    $correo = $_POST['correo'];

    if($id < 1 || $id > 2){
        header("Location: ../recuperar_pass.php?id=$id");
    }

    if($id == 1){
        $usuario = "usuarios_clientes";

    }else if($id == 2){
        $usuario = "usuarios_tecnicos";

    }

        $query = "SELECT * FROM $usuario WHERE correo = '$correo'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1) {
        
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombres'];
            $pass = rand(1111, 9999);
            
            $query2 = "UPDATE $usuario SET contrasena = '$pass' WHERE correo = '$correo'";
            $result2 = mysqli_query($conn, $query2);

            if($result2){

                $asunto = "Recuperación de contraseña";

                $contenido = "Hola " . $nombre . "\nTu nueva contraseña es: " . $pass;
                
                $mail = mail($correo, $asunto, $contenido);

                if($mail){

                    $_SESSION['mensaje_pass_ok'] = 'Revise su bandeja de correos, para visualizar su nueva contraseña!';
                    $_SESSION['color_mensaje'] = 'success';
                    header("Location: ../recuperar_pass.php?id=$id");
                }

            }else{
                die("fallo la actualización de los datos");
            } 

        }else{
            $_SESSION['mensaje_pass_fall'] = 'El correo ingresado no existe en nuestros registros!';
            $_SESSION['color_mensaje'] = 'danger';
            header("Location: ../recuperar_pass.php?id=$id");
        } 

}


?> 