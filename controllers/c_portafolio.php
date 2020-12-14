<?php
include("../db/db.php");

// Guardar archivo subido a nuestro servidor o proyecto
$nombre = $_FILES['archivo']['name'];
$guardado = $_FILES['archivo']['tmp_name'];

if(!file_exists('../certificados')){
    mkdir('../certificados',0777,true);
    if(file_exists('certificados')){
        if(move_uploaded_file($guardado, '../certificados/'.$nombre)){
            //echo "Archivo guardado con exito";
        }else{
            //echo "El archivo no se pudo guardar";
        }
    }
}else{
    if(move_uploaded_file($guardado, '../certificados/'.$nombre)){
        //echo "Archivo guardado con exito";
    }else{
        // echo "El archivo no se pudo guardar";
    }
}
// FIN guardar archivo subido a nuestro servidor o proyecto


 if(isset($_POST['f_guardar'])){

    $presentacion = $_POST['presentacion'];
    $formacion = $_POST['formacion'];
    $habilidades = $_POST['habilidades'];
    $experiencias = $_POST['experiencias'];
    $idTecnico = $_POST['id_tecnico'];
  
    

     if($presentacion == "" || $formacion == "" || $habilidades == "" || $experiencias == "" ){ 
         
        $_SESSION['llenado_campos_obligatorio'] = 'Debe llenar todos los campos';
        $_SESSION['color_mensaje'] = 'danger';

         header("Location: ../public/perfil_tecnicos.php");
      }else{

        if($nombre == null || $nombre == ""){
            $nombre = "none";
            $query = "INSERT INTO fichas_tecnicas(presentacion, formacion, habilidades, experiencias, certificado, tecnico ) VALUES ('$presentacion','$formacion','$habilidades','$experiencias','$nombre','$idTecnico')";
        }else{
            $query = "INSERT INTO fichas_tecnicas(presentacion, formacion, habilidades, experiencias, certificado, tecnico ) VALUES ('$presentacion','$formacion','$habilidades','$experiencias','$nombre','$idTecnico')";
        }

         

         $result = mysqli_query($conn, $query);

         if($result){

            $_SESSION['datos_guardados'] = 'Datos guardados correctamente!';
            $_SESSION['color_mensaje'] = 'success'; 
            
            header("Location: ../public/perfil_tecnicos.php");
         }else{
             die("fallo la tercera consulta");
         } 
      }   
 
    }else{


        // Guardar archivo subido a nuestro servidor o proyecto
        $nombre = $_FILES['archivo']['name'];
        $guardado = $_FILES['archivo']['tmp_name'];

        if(!file_exists('../certificados')){
            mkdir('../certificados',0777,true);
            if(file_exists('certificados')){
                if(move_uploaded_file($guardado, '../certificados/'.$nombre)){
                    //echo "Archivo guardado con exito";
                }else{
                    //echo "El archivo no se pudo guardar";
                }
            }
        }else{
            if(move_uploaded_file($guardado, '../certificados/'.$nombre)){
                //echo "Archivo guardado con exito";
            }else{
                // echo "El archivo no se pudo guardar";
            }
        }
        // FIN guardar archivo subido a nuestro servidor o proyecto


        $presentacion = $_POST['presentacion'];
        $formacion = $_POST['formacion'];
        $habilidades = $_POST['habilidades'];
        $experiencias = $_POST['experiencias'];
        $idTecnico = $_POST['id_tecnico'];
  
    

        if($presentacion == "" || $formacion == "" || $habilidades == "" || $experiencias == "" ){ 
            
            $_SESSION['llenado_campos_obligatorio'] = 'Debe llenar todos los campos';
            $_SESSION['color_mensaje'] = 'danger';

            header("Location: ../public/perfil_tecnicos.php");
        }else{

            if($nombre == null || $nombre == "" ){
                $query = "UPDATE fichas_tecnicas SET presentacion = '$presentacion', formacion = '$formacion', habilidades = '$habilidades', experiencias = '$experiencias' WHERE tecnico = '$idTecnico' ";
            }else{
                $query = "UPDATE fichas_tecnicas SET presentacion = '$presentacion', formacion = '$formacion', habilidades = '$habilidades', experiencias = '$experiencias', certificado = '$nombre' WHERE tecnico = '$idTecnico' ";
            }

            

            $result = mysqli_query($conn, $query);

            if($result){
                $_SESSION['datos_actualizados'] = 'Datos actualizados correctamente!';
                $_SESSION['color_mensaje'] = 'success'; 
                header("Location: ../public/perfil_tecnicos.php");
            }else{
                die("fallo la tercera consulta");
            } 
        }  
    }

?>

