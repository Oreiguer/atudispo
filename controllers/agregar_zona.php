<?php 
include("../db/db.php"); 

if(isset($_POST['btn-comunas'])) {
    $zonaComuna = $_POST['zonaComunas'];
    $idTecnico = $_POST['tecnico'];
    
        $query = "SELECT * FROM comunas where descripcion_comuna = '$zonaComuna' ";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1) {
        
            $row = mysqli_fetch_array($result);
            $idComuna = $row['id_comuna'];

            $query2 = "SELECT * FROM zonas_trabajo WHERE comuna = '$idComuna' AND tecnico = '$idTecnico' ";
            $result2 = mysqli_query($conn, $query2);

            if(mysqli_num_rows($result2) == 1) {
                header("Location: ../public/perfil_tecnicos.php");

            }else{
                $queryZona = "INSERT INTO zonas_trabajo(tecnico, comuna) VALUES ('$idTecnico','$idComuna')";
                $resultZona = mysqli_query($conn, $queryZona);

                if($resultZona){
                    
                    header("Location: ../public/perfil_tecnicos.php");
                }else{
                    die("fallo la tercera consulta");
                }
            }
            
        }else{
            
            header("Location: ../public/perfil_tecnicos.php");
        } 
    
    
    }

?> 