<?php
include("../db/db.php");


// Guardar archivo subido a nuestro servidor o proyecto
$nombre = $_FILES['archivo']['name'];
$guardado = $_FILES['archivo']['tmp_name'];

if(!file_exists('../archivos')){
    mkdir('../archivos',0777,true);
    if(file_exists('archivos')){
        if(move_uploaded_file($guardado, '../archivos/'.$nombre)){
            //echo "Archivo guardado con exito";
        }else{
            //echo "El archivo no se pudo guardar";
        }
    }
}else{
    if(move_uploaded_file($guardado, '../archivos/'.$nombre)){
        //echo "Archivo guardado con exito";
    }else{
        // echo "El archivo no se pudo guardar";
    }
}
// FIN guardar archivo subido a nuestro servidor o proyecto



 if(isset($_POST['guardar_registro'])){

     $rut = $_POST['rut'];
     $nombres = $_POST['nombres'];
     $ape_pat = $_POST['ape_pat'];
     $ape_mat = $_POST['ape_mat'];
     $correo = $_POST['correo'];
     $fono = $_POST['fono'];
     $pass = $_POST['pass'];
     $repass = $_POST['repass'];
     $sexo = $_POST['sexo'];
     $direccion = $_POST['direccion'];
     $comuna= $_POST['comuna'];
     $estado= "activo";
     $foto= "none";

     if($rut == "" || $nombres == "" || $ape_mat == "" || $ape_pat =="" || $correo == "" ||$fono == "" || $pass == "" || $repass == ""){ 
         
        $_SESSION['llenado_campos_obligatorio'] = 'Debe llenar todos los campos';
        $_SESSION['color_mensaje'] = 'danger';

         header("Location: ../registro-tec.php");
      }else{

        $query = "SELECT * FROM usuarios_tecnicos WHERE rut = '$rut' ";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1) {
            $_SESSION['usuario_tec_existe'] = 'Usuario ya existe';
            $_SESSION['color_mensaje'] = 'danger';
            header("Location: ../registro-tec.php");

        }else{
            if($nombre == null || $nombre == ""){
                $nombre = "none";
    
                $query = "INSERT INTO usuarios_tecnicos(nombres, a_paterno,a_materno, rut, sexo, direccion, telefono, correo, contrasena, estado, nombre_archivo, comuna) VALUES ('$nombres','$ape_pat','$ape_mat','$rut','$sexo','$direccion','$fono','$correo','$pass','$estado','$nombre','$comuna')";
            }else{
                $query = "INSERT INTO usuarios_tecnicos(nombres, a_paterno,a_materno, rut, sexo, direccion, telefono, correo, contrasena, estado, nombre_archivo, comuna) VALUES ('$nombres','$ape_pat','$ape_mat','$rut','$sexo','$direccion','$fono','$correo','$pass','$estado','$nombre','$comuna')";
            }
             
    
             $result = mysqli_query($conn, $query);
    
             if($result){
                
                $_SESSION['usery'] = $rut;  

                $_SESSION['bienvenida_tecnico'] = 'Bienvenido! Ahora debes crear tu ficha para darte de alta.';
                $_SESSION['color_mensaje'] = 'success';  
                
                header("Location: ../perfil_tecnicos.php");
             }else{
                 die("fallo la consulta");
             } 
        }
      }   
 
    }

?>

