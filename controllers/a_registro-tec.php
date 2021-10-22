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
     $sexo = $_POST['sexo'];
     $direccion = $_POST['direccion'];
     $comuna= $_POST['comuna'];
  
     

     if($rut == "" || $nombres == "" || $ape_mat == "" || $ape_pat =="" || $correo == "" || $fono == "" || $direccion == ""){ 
         
        $_SESSION['llenado_campos_obligatorio'] = 'Debe llenar todos los campos';
        $_SESSION['color_mensaje'] = 'danger';

         header("Location: ../perfil_tecnicos.php");
      }else{
       //actualizar foto o no
        if($nombre == null || $nombre == ""){
            $query = "UPDATE usuarios_tecnicos SET nombres = '$nombres', a_paterno = '$ape_pat',a_materno = '$ape_mat', sexo = '$sexo', direccion = '$direccion', telefono = '$fono', correo = '$correo',comuna = '$comuna' WHERE rut = '$rut' ";
        }else{
            $query = "UPDATE usuarios_tecnicos SET nombres = '$nombres', a_paterno = '$ape_pat',a_materno = '$ape_mat', sexo = '$sexo', direccion = '$direccion', telefono = '$fono', correo = '$correo', nombre_archivo = '$nombre',comuna = '$comuna' WHERE rut = '$rut' ";
        }

        $result = mysqli_query($conn, $query);

        if($result){
            $_SESSION['datos_actualizados'] = 'Datos actualizados correctamente!';
            $_SESSION['color_mensaje'] = 'success'; 
        
            header("Location: ../perfil_tecnicos.php");
        }else{
        die("fallo la primera consulta");
        } 
       
      }   
    }

?>

