<?php 
include("../db/db.php"); 

if(isset($_POST['eliminar'])) {

    $id_zona = $_POST['id_zona'];

    $query = "DELETE FROM zonas_trabajo WHERE id_zona = '$id_zona' ";
    $result = mysqli_query($conn, $query);

        if($result){

            header("Location: ../perfil_tecnicos.php");

        }else{
            die("Fallo la consulta"); 
        }
}
?> 