<?php 
include("../db/db.php"); 

if(isset($_POST['eliminar'])) {

    $id_espe = $_POST['id_espe'];

    $query = "DELETE FROM especialidades_tecnicos WHERE id_especialidad_tecnico = '$id_espe' ";
    $result = mysqli_query($conn, $query);

        if($result){

            header("Location: ../public/perfil_tecnicos.php");

        }else{
            die("Fallo la consulta"); 
        }
}
?> 