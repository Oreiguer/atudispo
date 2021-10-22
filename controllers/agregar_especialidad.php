<?php 
include("../db/db.php"); 

if(isset($_POST['agregar'])) {
    $tecnico = $_POST['tecnico'];
    $especialidad = $_POST['especialidad'];

    $query = "SELECT * FROM especialidades_tecnicos where tecnico = '$tecnico' and especialidad = '$especialidad'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
                
        header("Location: ../perfil_tecnicos.php");
    
    }else{
        $query = "INSERT INTO especialidades_tecnicos(tecnico, especialidad) VALUES ('$tecnico','$especialidad') ";

        $result = mysqli_query($conn, $query);

        if($result){
        
        header("Location: ../perfil_tecnicos.php");
        }else{
            die("fallo la tercera consulta");
        } 
    } 
  
}else{
    die("Fallo la consulta"); 
}

?> 