<?php 
include("../db/db.php"); 

if(isset($_POST['enviar'])) {

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    $destino = "lhiguera.orellana@gmail.com";
    //$destino = "axcen.crc@gmail.com";

    $contenido = "Nombre: " . $nombre . "\nCorreo: " . $correo . "\nMensaje: " . $mensaje;
    
    $mail = mail($destino, $asunto, $contenido);

    if($mail){

        $_SESSION['correo_mensaje'] = 'Su mensaje se envió correctamente!';
        $_SESSION['color_mensaje'] = 'success';
        header("Location: ../sugerencias.php");
    }else{
        header("Location: ../sugerencias.php");
    }
}


?> 