<?php 
include("db/db.php"); 

if(isset($_GET['id'])){

    $id = $_GET['id'];
}


?>

<!-----   Seccion cabecera    ----->
<?php include("public/includes/header.php")?>

<?php 
// ------  Nav Bar -------
include("public/includes/nav-bar.php");
?>


<!--------- Mensaje Cambio de contraseña --------->
<?php include("public/mensajes_alertas/login_incorrecto.php")?>
<!--------- FIN Mensaje Cambio de contraseña --------->

<!--------- Mensaje envio pass ok --------->
<?php include("public/mensajes_alertas/pass_enviada.php")?>
<!--------- FIN Mensaje envio pass ok --------->

<!--------- Mensaje pass no enviada, no existe correo ingresado --------->
<?php include("public/mensajes_alertas/pass_no_enviada.php")?>
<!--------- FIN Mensaje pass no enviada, no existe correo ingresado --------->

    
    <section class="item-sugerencia mt-5 pb-5">
        
        <div class=" my-5 ">
            <div class="row justify-content-center">
                <div class="recuperar-form col-md-6 p-5 rounded">
                    <div class="text-white pt-3">
                        <h1 class="text-center ">Recupera tu contraseña</h1>
                    </div>

                    <div class="text-white mb-5 text-center pt-3">
                        <h6>Digita tu correo electrónico y recibirás una nueva contraseña!</h6>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-8">

                            <form action="controllers/enviar_correo_pass.php" method="POST">
                            
                            <div class="form-group">
                                <label for="">Dirección de correo electrónico</label>
                                <input type="email" placeholder="ejemplo@gmail.com" class="form-control" name="correo" value=""  onpaste="return false" required>
                            </div>

                            <input type="hidden" name="id" value="<?php echo $id?>" >

                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-success  btn-lg mt-3 mb-5 form-control" name="enviar" value="Enviar">
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