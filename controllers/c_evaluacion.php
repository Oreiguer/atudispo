<?php
include("../db/db.php");

if(isset($_POST['guardar'])){

     $puntualidad = $_POST['puntualidad'];
     $desempeno = $_POST['desempeno'];
     $responsabilidad = $_POST['responsabilidad'];
     $comentario = $_POST['comentario'];
     $tecnico = $_POST['tecnico'];
     $cliente = $_POST['cliente'];
    

    if($comentario == "" ){ 

         header("Location: ../lista_evaluacion.php");

    }else{

          
        $query = "INSERT INTO evaluaciones(nota1, nota2, nota3, comentario, cliente, tecnico) VALUES ('$puntualidad','$desempeno','$responsabilidad','$comentario','$cliente','$tecnico')";
           
        $result = mysqli_query($conn, $query);

        if($result){

            $_SESSION['evaluacion_realizada'] = 'Evaluación realizada correctamente!';
            $_SESSION['color_mensaje'] = 'success';  
         
            header("Location: ../lista_evaluacion.php");

        }else{
            die("fallo la consulta");
        } 
        
    }   
 
}

?>

