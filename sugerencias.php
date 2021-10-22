<?php 
include("db/db.php"); 


?>

<!-----   Seccion cabecera    ----->
<?php include("public/includes/header.php")?>

<?php 
// ------  Codigo variable de sesion de usuario desde login -------

if(isset($_SESSION['usery_cliente'])){
    include("public/includes/nav-bar-cliente.php");
    
    
}else if(isset($_SESSION['usery'])){
    include("public/includes/nav-bar-tecnico.php");
    
}else{
    include("public/includes/nav-bar.php");

}

?>


<!--------- Mensaje Cambio de contraseña --------->
<?php include("public/mensajes_alertas/login_incorrecto.php")?>
<!--------- FIN Mensaje Cambio de contraseña --------->

<!--------- Mensaje correo enviado correctamente --------->
<?php include("public/mensajes_alertas/correo_enviado.php")?>
<!--------- FIN Mensaje correo enviado correctamente --------->

    
    <section class="item-sugerencia mt-5 pb-5">
        
        <div class=" my-5 ">
            <div class="row justify-content-center">
                <div class=" sug-form col-md-8 p-5 rounded">
                    <div class="text-white mb-5">
                        <h1 class="text-center ">Envianos tus sugerencias</h1>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10">

                            <form action="controllers/enviar_correo.php" method="POST">
                            <div class="form-group">
                                <label for="">Nombre:</label>
                                <input type="text" placeholder="" class="form-control" name="nombre" value="" onkeypress="return validar_solo_letras_con_espacio(event);" required autocomplete="off" onpaste="return false">
                            </div>

                            <div class="form-group">
                                <label for="">Correo:</label>
                                <input type="email" placeholder="ejemplo@gmail.com" class="form-control" name="correo" value=""  onpaste="return false" required>
                            </div>

                            <div class="form-group">
                                <label for="">Asunto:</label>
                                <input type="text" placeholder="" class="form-control" name="asunto" value="" onkeypress="return validar_solo_letras_con_espacio(event);" required autocomplete="off" onpaste="return false">
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Mensaje:</label>
                                <textarea class="form-control" value="" name="mensaje" rows="4" cols="50" required></textarea>			
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-success  btn-lg mt-5 mb-5 form-control" name="enviar" value="Enviar">
                                </div>                 
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </section>


<!-----   Seccion pie de pagina contenido    ----->
<?php include("public/includes/footer.php")?>