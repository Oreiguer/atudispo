<?php
include("db/db.php");

?>

<!-----   Seccion cabecera    ----->
<?php include("public/includes/header.php");?>

<?php 
// ------  Codigo variable de sesion de usuario desde login -------

if(!isset($_SESSION['usery_cliente'])){
    
    include("public/includes/nav-bar.php");

}else{
    include("public/includes/nav-bar-cliente.php");

}

?>

    <main>
        <div class="main_img-tec">
            <form action="" method="POST">
                <div class="row justify-content-center align-items-center ">
                    <div class="col-3">
                        <select class="form-control bg-white" name="servicio" required>
                            <option disabled="" selected="" value="">Que servicio necesitas?</option>
                                <option value="Carpintero">Carpintero</option>
                                <option value="Electricista">Electricista</option>
                                <option value="Electronico">Electrónico</option>
                                <option value="Gasfiter">Gasfiter</option>
                                <option value="Jardinero">Jardinero</option>
                                <option value="Pintor">Pintor</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <select name="comuna" required="" id="address" class="address-input form-control">
                            <option disabled="" selected="" value="">Selecciona tu comuna</option>
                            <optgroup label="Región Metropolitana">
                            <option value="La Florida">La Florida</option>
                            <option value="La Reina">La Reina</option>
                            <option value="Maipú">Maipú</option>
                            <option value="Providencia">Providencia</option>
                            <option value="Santiago">Santiago</option>
                            </optgroup>
                            <optgroup label="Sexta región">
                            <option value="Rancagua">Rancagua</option>
                            <option value="Rengo">Rengo</option>
                            <option value="Machalí">Machalí</option>
                            <option value="Doñihue">Doñihue</option>
                            <option value="Coltauco">Coltauco</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="col-2">
                        <input class="btn btn-success form-control" type="submit" name="buscar" id="" value="Buscar">
                    </div>
                </div>
            </form>
        </div>
    </main>

    <br>
    <br>

    <section class="list_tec mb-5 pb-5">
        <h1 class="text-center font-weight-light text-secondary pb-3">Lista de técnicos en tu ubicación</h1>
        <?php

        if(isset($_POST['buscar'])){

        $servicio = $_POST['servicio'];
        $comuna = $_POST['comuna'];

        $query = "SELECT * FROM zonas_trabajo INNER JOIN comunas ON zonas_trabajo.comuna = comunas.id_comuna INNER JOIN usuarios_tecnicos ON zonas_trabajo.tecnico = usuarios_tecnicos.id_tecnico INNER JOIN especialidades_tecnicos ON especialidades_tecnicos.tecnico = usuarios_tecnicos.id_tecnico INNER JOIN especialidades ON especialidades_tecnicos.especialidad = especialidades.id_especialidad WHERE comunas.descripcion_comuna = '$comuna' AND especialidades.descripcion_espe = '$servicio' ";

        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_array($result)) {
                $img = $row['nombre_archivo'];
                if($img == "none"){
                    $img = "neutral.jpg";
                }

                $tec = $row['id_tecnico'];
                $query2 = "SELECT * FROM fichas_tecnicas WHERE tecnico = '$tec' ";
                $result2 = mysqli_query($conn, $query2);
                if(mysqli_num_rows($result2) == 1) {
                    $row2 = mysqli_fetch_array($result2);

                ?>
                    
                    <div class="card my-5 card-tec item-card" data-aos="fade-up">
                        <div class="row no-gutters">
                            <div class="col-md-3 pt-5">
                                <img src="archivos/<?php echo $img ?>" class="card-img img-tec rounded-circle" alt="avatar">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                             <!--   <form action="ficha-tec.php" method="POST" > -->
                                    <h5 class="card-title pt-2  "><?php echo $row['nombres']?> <?php echo $row['a_paterno']?></h5>
                                    <p class="card-text "><?php echo $row2['presentacion'] ?></p>
                                    <p class="card-text"><small class="text-muted"><?php echo $row['descripcion_comuna']?></small></p>

                                <!--    <input type="hidden" name="tecnico" value="<?php echo $tec ?>"> -->

                                    <a href="ficha-tec.php?id=<?php echo $tec ?>" class="btn btn-primary form-control mb-3">Ver Ficha</a>

                                <!--    <button type="submit" name="ver" class="btn btn-primary form-control mb-3">Ver Ficha</button> -->
                             <!--   </form>  -->
                                </div>
                            </div>

                            <div class="col-3 pr-3">

                                <?php 

                                    $suma1 = 0;
                                    $cont1 = 0;
                                    $res1 = 0;

                                    $suma2 = 0;
                                    $cont2 = 0;
                                    $res2 = 0;

                                    $suma3 = 0;
                                    $cont3 = 0;
                                    $res3 = 0;

                                    $query3 = "SELECT * FROM evaluaciones WHERE tecnico = '$tec' ";
                                    $result3 = mysqli_query($conn, $query3);

                                    if(mysqli_num_rows($result3) > 0) {
                                        while($row = mysqli_fetch_array($result3)) {

                                            $suma1 += $row['nota1'];
                                            $cont1 += 1;
                                            $res1 = $suma1 / $cont1;

                                            $suma2 += $row['nota2'];
                                            $cont2 += 1;
                                            $res2 = $suma2 / $cont2;

                                            $suma3 += $row['nota3'];
                                            $cont3 += 1;
                                            $res3 = $suma3 / $cont3;

                                        }
                                    } 
                                            
                                ?> 
                                 
                                <div class="ml-auto pt-2 mt-3">
                                    <h5 class="text-center text-secondary ">Evaluación</h5>
                                    <ul class="list-group item-card">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Puntualidad
                                        <span class="badge badge-secondary badge-pill"><?php echo number_format($res1, 1, '.', ' ') ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Desempeño
                                        <span class="badge badge-secondary  badge-pill"><?php echo number_format($res2, 1, '.', ' ') ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Responsabilidad
                                        <span class="ml-3 badge badge-secondary  badge-pill"><?php echo number_format($res3, 1, '.', ' ') ?></span>
                                        </li>
                                    </ul>
                                    <p class="card-text text-center mt-2"><small class="text-muted">Nota máxima: 5.0</small></p>

                                </div>
                                
                            </div>
                        </div>
                    </div>

        <?php }}}else{ ?>

            <h4 class="text-secondary text-center mt-5">No hay resultados..</h4>

       <?php }  }else{ ?>

            <h4 class="text-secondary text-center mt-5">No hay resultados..</h4>
            
       <?php  } ?>       
    </section>


<!-----   Seccion pie de pagina contenido    ----->
<?php include("public/includes/footer.php")?>