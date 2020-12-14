<?php 
include("../db/db.php"); 

    if(isset($_GET['id'])) {

        $tecnico = $_GET['id'];

        $query = "SELECT * FROM fichas_tecnicas INNER JOIN usuarios_tecnicos ON fichas_tecnicas.tecnico = usuarios_tecnicos.id_tecnico WHERE usuarios_tecnicos.id_tecnico = '$tecnico' ";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
        
            $nombre = $row['nombres'];
            $a_paterno = $row['a_paterno'];
            $a_materno = $row['a_materno'];
            $correo = $row['correo'];
            $fono = $row['telefono'];
            $presentacion = $row['presentacion'];
            $formacion = $row['formacion'];
            $habilidades = $row['habilidades'];
            $certificado = $row['certificado'];
            $experiencias = $row['experiencias'];
            $certificado = $row['certificado'];
            $foto = $row['nombre_archivo'];
            

            if($foto == "none" || $foto == ""){
                $foto="neutral.jpg";
            }

            if($certificado == null || $certificado == "" || $certificado == "none"){
                $texto = "";
                $clase = "";
            }else{
                $texto = "ver certificado";
                $clase = "btn btn-outline-primary btn-sm";
            }
        }else{
            header("Location: index.php");
        }
    }else{
        
        header("Location: index.php");
    }
    
?>



<!-----   Seccion cabecera    ----->
<?php include("includes/header.php")?>


<?php 
// ------  Codigo variable de sesion de usuario desde login -------

if(!isset($_SESSION['usery_cliente'])){
    
    include("includes/nav-bar.php");

}else{
    include("includes/nav-bar-cliente.php");

}

?>
    <main>
        <div class="main_img--ficha-tec">
            <div class="main_img--ficha-tec__pantalla row justify-content-center align-items-center">
                <div class="col-2">
                    <img src="../archivos/<?php echo $foto ?>" class=" img-ficha-tec  rounded-circle" alt="avatar">
                </div>
                <div class="main_ficha-content col-3">
                    <h1 class="text-white "><?php echo $nombre ?> <?php echo $a_paterno ?></h1>
                </div>
            </div>
        </div>
    </main>

    <section class="container ficha-tec_description mb-5 pb-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-10">
                <h1 class="text-center mb-4 text-secondary">Portafolio</h1>
                <hr>
                <h3 class="mb-3 text-secondary">Presentación</h3>
                <p class=""><?php echo $presentacion ?></p>
               <br>
               <h3 class="mb-3 text-secondary">Formación <a href="../certificados/<?php echo $certificado ?>" class="ml-5 <?php echo $clase ?> " target="_blank" rel="noopener noreferrer"><?php echo $texto ?></a>  </h3>
               <p class=""><?php echo $formacion ?></p>
               <br>
               <h3 class="mb-3 text-secondary">Habilidades</h3>
               <p class=""><?php echo $habilidades ?></p>
               <br>
               <h3 class="mb-3 text-secondary">Experiencias</h3>
               <p class=""><?php echo $experiencias ?></p>
               
               <br>
               <h3 class="mb-3 text-secondary">Contáctame</h3>
               <br>
               <div class="row justify-content-center mb-5" >
					<div class="col-5">
						<div class="row align-items-center">
							<div class="col-3">
								<img src="img/email.jpg" class="card-img-email" alt="...">
							</div>
							<div class="col-5 text-align-center">
								<h4 class="text-align-center"><?php echo $correo ?> </h4>
							</div>
						</div>
					</div>
					<div class="col-5 " >
						<div class="row align-items-center" >
							<div class="col-3">
								<img src="img/phone.jpg" class="card-img-phone" alt="...">
							</div>
							<div class="col-7 text-align-center">
								<h4 class="text-align-center">+56 <?php echo $fono ?> </h4>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
    </section>

    <section class="ficha-tec_comments py-5">
        <div class="row justify-content-center">   
            <div class="col-7">
                <h2 class="pl-5 mb-4">Comentarios</h2>
                <hr>
            </div>
            <hr>
            <div class="col-7">
            <?php 
                  $query = "SELECT usuarios_clientes.nombres AS nom, usuarios_clientes.a_paterno AS ape, evaluaciones.nota1 AS puntualidad, evaluaciones.nota2 AS desempeno, evaluaciones.nota3 AS respon, evaluaciones.comentario AS comentario, evaluaciones.fecha AS fech FROM usuarios_tecnicos INNER JOIN evaluaciones ON usuarios_tecnicos.id_tecnico = evaluaciones.tecnico INNER JOIN usuarios_clientes ON usuarios_clientes.id_cliente = evaluaciones.cliente WHERE evaluaciones.tecnico = '$tecnico' ORDER BY fecha DESC  ";
                  $result = mysqli_query($conn, $query);

                  if(mysqli_num_rows($result) > 0) {
      
                    while($row = mysqli_fetch_array($result)) { 
 
                        ?>

                        <div class="card mt-4 w-100 item-shadow">
                          <div class="card-body row pr-5">
                            <div class="col-7 pl-4">
                              <h5 class="card-title"> <?php echo $row['nom'] ?> <?php echo $row['ape'] ?></h5>
                              <p class="card-text"><?php echo $row['comentario'] ?></p>
                              <p class="card-text mt-4"><small class="text-muted"><?php echo $row['fech']?></small></p>
                            </div>
                            <div class="ml-auto">
                              <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                Puntualidad
                                  <span class="badge badge-primary badge-pill"><?php echo $row['puntualidad']?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                  Desempeño
                                  <span class="badge badge-primary badge-pill"><?php echo $row['desempeno']?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                  Responsabilidad
                                  <span class="ml-3 badge badge-primary badge-pill"><?php echo $row['respon']?></span>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>

                <?php } }else{ ?>

                    <h4 class="text-secondary mt-4">No hay comentarios..</h4>

               <?php }?>
            </div>



        </div>
    </section>

    <br><br>

<!-----   Seccion pie de pagina contenido    ----->
<?php include("includes/footer.php")?>