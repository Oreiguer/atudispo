<?php 
include("../db/db.php"); 

if(isset($_POST['guardar'])) {
    $tecnico = $_POST['tecnico'];
    $contrasena = $_POST['contrasena'];

    if($tecnico == "" || $contrasena == ""){
        
        header("Location: ../public/index.php");

    }else{
    
        $query = "SELECT * FROM usuarios_tecnicos where correo = '$tecnico' and contrasena = '$contrasena'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1) {
        
            $row = mysqli_fetch_array($result);
            $rut = $row['rut'];
            $_SESSION['usery'] = $rut;  
            
            header("Location: ../public/perfil_tecnicos.php");
        
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