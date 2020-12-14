<?php 
include("../db/db.php"); 


?>

<!-----   Seccion cabecera    ----->
<?php include("public/includes/header_main.php")?>

<?php 
// ------  Codigo variable de sesion de usuario desde login -------

if(!isset($_SESSION['usery_cliente'])){
    
    include("public/includes/nav-bar.php");

}else{
    include("public/includes/nav-bar-cliente.php");

}

?>


<!--------- Mensaje Cambio de contraseña --------->
<?php include("public/mensajes_alertas/login_incorrecto.php")?>
        <!--------- FIN Mensaje Cambio de contraseña --------->

    <main class="mb-5">
        <div class="main_img">
            
            <form action="public/list-tec.php" method="POST" >
                <div class="main_content pt-4">
                    <div class="titulo_index">
                        <h1 class="text-center font-italic pb-4">Contacta al técnico ideal !!</h1>
                    </div>
                    <div class="row justify-content-center "> 
                    
                        <div class="col-md-3 col-sm-6 mt-2">
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
                        <div class="col-md-3 col-sm-6 mt-2">
                            
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
                        <div class="col-md-3 col-sm-6 mt-2">
                            
                            <button class="btn btn-primary form-control" type="submit" name="buscar">
                            <i class="fas fa-search mr-2"></i>
                            BUSCAR</button>
                        </div>

                    </div> 
                </div>

            </form>
            
        </div>
    </main>

    <section class=" bg-light pb-5">
        <div class="container pb-5">
            <div class="pt-5 my-5">
                <h1 class="text-center my-5 text-secondary">Paso a paso</h1>
            </div>
            <div class="row pasos mt-5 pt-4">
                <div class="col-md-6 col-sm-12 item-pasos paso-uno bg-white item-ptd " data-aos="fade-up">
                    <div class="row ">
                        <div class="col-5 pt-5 pl-4">
                            <img src="public/img/search.svg" class="w-75" alt="">
                        </div>
                        <div class="col-2 pt-5">
                            <h1>1</h1>
                        </div>
                        <div class="col-5 pt-5">
                            <h5 class="pt-4">Selecciona el servicio que necesitas y tu comuna.</h5>
                        </div>
                    </div>
                    
                </div>
                <div class="col-6 item-pasos">

                </div>
                <div class="col-6 item-pasos ">

                </div>
                <div class="col-md-6 col-sm-10 item-pasos paso-uno bg-white item-ptd" data-aos="fade-up" >
                <div class="row ">
                        <div class="col-5 pt-4 pl-4">
                            <img src="public/img/select2.svg" class="w-100" alt="">
                        </div>
                        <div class="col-2 pt-5">
                            <h1>2</h1>
                        </div>
                        <div class="col-5 pt-5">
                            <h5 class="pt-4">Busca entre los técnicos que se enlisten.</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 item-pasos paso-uno bg-white item-ptd" data-aos="fade-up">
                    <div class="row ">
                        <div class="col-5 pt-4 pl-4">
                            <img src="public/img/revisar_ficha.svg" class="w-75" alt="">
                        </div>
                        <div class="col-2 pt-5">
                            <h1>3</h1>
                        </div>
                        <div class="col-5 pt-3">
                            <h5 class="pt-4">Revisa las fichas, certificados y comentarios de los técnicos para luego contactarlos.</h5>
                        </div>
                    </div>
                </div>
                <div class="col-6 item-pasos">

                </div>
                <div class="col-6 item-pasos ">

                </div>
                <div class="col-md-6 col-sm-12 item-pasos paso-uno bg-white item-ptd" data-aos="fade-up">
                <div class="row ">
                        <div class="col-5 pt-5 pl-5">
                            <img src="public/img/evaluar.svg" class="w-100" alt="">
                        </div>
                        <div class="col-2 pt-5">
                            <h1>4</h1>
                        </div>
                        <div class="col-5 pt-5">
                            <h5 class="pt-4">Evalua y deja un comentario del trabajo que realizó el técnico.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-----   Seccion pie de pagina contenido    ----->
<?php include("public/includes/footer_main.php")?>