<?php
    include("../../db/db.php");

        $temp="";
        $query = "SELECT * FROM usuarios_tecnicos ";

        if(isset($_POST['alumnos'])){
          $q=$conn->real_escape_string($_POST['alumnos']);
          $query = "SELECT * FROM usuarios_tecnicos WHERE a_paterno LIKE '%".$q."%' or rut LIKE '%".$q."%' or nombres LIKE '%".$q."%'";
          
        }

        $buscarAlumnos=$conn->query($query);
        if($buscarAlumnos->num_rows > 0){
        

          $temp.= "<table class='table table-bordered '>
                      <thead>
                      <tr class='bg-secondary text-white text-center'>
                        <th>Nombres</th>
                        <th>Apellido Pat.</th>
                        <th>Apellido Mat.</th>
                        <th>Evaluar</th>
                      </tr>
                    </thead>";

        
          while ($filaAlumnos= $buscarAlumnos->fetch_assoc()) {
            $temp.="<tbody>         
          
                      <tr class='text-center'>
                        <td>".$filaAlumnos['nombres']."</td>
                        <td>".$filaAlumnos['a_paterno']."</td>
                        <td>".$filaAlumnos['a_materno']."</td>
                        <td>  

                            <a href='evaluacion_tecnico.php?id=".$filaAlumnos['id_tecnico']."' class='btn btn-primary'  >
                            
                            <i title='Evaluar' class='fas fa-poll mx-2'></i>
                            </a>

                        </td>
                      </tr>      
                    </tbody>";
          }
          
          $temp.="</table>";
        }else{
          $temp="No se encontraron coincidencias";
        }
        echo $temp;
?>