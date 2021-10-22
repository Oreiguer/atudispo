 <!-- <?php include("db/db.php") ?>  -->

<!-----   Seccion cabecera    ----->
<?php include("public/includes/header.php")?>


<!-----   Nav-bar   ----->
<?php include("public/includes/nav-bar.php")?>

<!----   Mensaje llenado de campos obligtorio  ---->
<?php include("public/mensajes_alertas/mensaje_llenado_campos_obligatorio.php")?>   
<!---- FIN  Mensaje llenado de campos obligtorio  ---->

<!----   Mensaje llenado de campos obligtorio  ---->
<?php include("public/mensajes_alertas/usuario_tec_yaExiste.php")?>   
<!---- FIN  Mensaje llenado de campos obligtorio  ---->
    
<section class="reg-tec m-5 ">
    <div class=" py-5">
        <div class="container">
        <div class="row justify-content-center my-3">
            <div class="col-9">          
                <form action="controllers/c_registro-cliente.php" method="POST" enctype="multipart/form-data" name="reloj24" id="form1">
                <div class="">
                <h2 class="text-center my-4">REGISTRO CLIENTES</h2>

                    <div class="row mt-5">
                        <div class="col-6">
                            <div class="form-group">
                            <label for="">Rut: </label>
                            <input type="text" class="form-control"  name="rut" id="rut" minlength="8" maxlength="12" required onChange="javascript:return Rut(document.reloj24.rut.value)">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                            <label for="">Nombres:</label>
                            <input type="text" placeholder="" class="form-control" name="nombres" value="" onkeypress="return validar_solo_letras_con_espacio(event);" required autocomplete="off" onpaste="return false">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                            <label for="">Apellido Paterno:</label>
                            <input type="text" placeholder="" class="form-control" name="ape_pat" value=""onkeypress="return  validar_solo_letras(event);" required autocomplete="off" onpaste="return false">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                            <label for="">Apellido Materno:</label>
                            <input type="text" placeholder="" class="form-control" name="ape_mat" value="" onkeypress="return  validar_solo_letras(event);" required autocomplete="off" onpaste="return false">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                            <label for="">Correo:</label>
                            <input type="email" placeholder="ejemplo@gmail.com" class="form-control" name="correo" value="" required autocomplete="off" onpaste="return false">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                            <label for="">Fono:</label>
                            <input type="text" placeholder="955443322" class="form-control" name="fono" value="" onkeypress="return validar_solo_numeros(event);" onpaste="return false" required autocomplete="off" onpaste="return false">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                            <label for="">Contraseña:</label>
                            <input type="text" placeholder="****" class="form-control" name="pass" id="pass" value="" onkeypress="return validar_solo_numeros(event);" required autocomplete="off" onpaste="return false">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                            <label for="">Reingresa la contraseña:</label>
                            <input type="text" placeholder="****" class="form-control" name="repass" id="repass" value="" onblur="compruebaPass()" onkeypress="return validar_solo_numeros(event);" onpaste="return false" required autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Dirección:</label>
                                <input type="text" placeholder="Pje. almendros 123 - Villa el almendral" class="form-control" name="direccion" value=""  required autocomplete="off" onpaste="return false">
                            </div>
                        </div>
                    </div>

                    <div class="row">
<!--
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Foto:</label>
                                <input type="file" name="archivo" class="form-control">
                            </div>
                        </div>
-->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="comuna">Comuna:</label>
                                <select name="comuna" required="" id="address" class="address-input form-control">
                                    <option disabled="" selected="" value="">Selecciona tu comuna</option>
                                    <optgroup label="Región Metropolitana">
                                    <option value="7">La Florida</option>
                                    <option value="8">La Reina</option>
                                    <option value="6">Maipú</option>
                                    <option value="4">Providencia</option>
                                    <option value="5">Santiago</option>
                                    </optgroup>
                                    <optgroup label="Sexta región">
                                    <option value="9">Rancagua</option>
                                    <option value="10">Rengo</option>
                                    <option value="11">Machalí</option>
                                    <option value="12">Doñihue</option>
                                    <option value="13">Coltauco</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        

                        <div class="col-6">
                            <div class="form-group">
                            <label for="sexo">Sexo:</label>
                            <select name="sexo" id="sexo" class="form-control">
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row justify-content-center">
                    <div class="col-6">
                    <input type="submit" class="btn btn-success btn-lg btn-block mt-5 mb-5" name="guardar_registro" value="REGISTRARME">
                    </div>                 
                </div>
                </form>
            </div>
            </div>  
        </div>
    </div>
</section>


    


<!-----   Seccion pie de pagina contenido    ----->
<?php include("public/includes/footer.php")?>