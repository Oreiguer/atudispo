<?php 
include("../db/db.php"); 

if(isset($_POST['c_guardar'])) {
    $cliente = $_POST['cliente'];
    $contrasena = $_POST['contrasena'];

    if($cliente == "" || $contrasena == ""){
        
        header("Location: ../index.php");

    }else{
    
        $query = "SELECT * FROM usuarios_clientes where correo = '$cliente' and contrasena = '$contrasena'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1) {
        
            $row = mysqli_fetch_array($result);
            $rut = $row['rut'];
            $_SESSION['usery_cliente'] = $rut;  
            
            header("Location: ../index.php");
        
        }else{
            $_SESSION['login_mensaje'] = 'Usuario o contraseña incorrecto';
            $_SESSION['color_mensaje_login'] = 'danger';
            header("Location: ../public/index.php");
        } 
    }
    
}else{
    die("Fallo la consulta 1"); 
}

?> 