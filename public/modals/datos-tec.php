
<div id="modal-tec-datos" class="modal fade " role="dialog">
	  <div class="modal-dialog modal-lg ">

		<!-- Modal content-->
		<div class="modal-content px-3 bg-light">
		  <div class="modal-header">
			<h3 id="titleModal" class="modal-title">Datos Personales</h3>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div>
		    <div class="modal-body bg-white rounded px-3 mb-5">
                <section class="">
                    <div class="">
                        <div class="">
                        <div class="justify-content-center my-3">
                            <div class="">          
                                <form action="controllers/a_registro-tec.php" method="POST" enctype="multipart/form-data" name="reloj24" id="form1">
                                <div class="">

<?php 


// ------  Codigo solicitud datos usuarios_tecnicos para editar -------

    $query = "SELECT * FROM usuarios_tecnicos INNER JOIN comunas ON usuarios_tecnicos.comuna = comunas.id_comuna WHERE usuarios_tecnicos.rut = '$var_sesion' ";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);

        $rut = $row['rut'];
        $nombres = $row['nombres'];
        $a_paterno = $row['a_paterno'];
        $a_materno = $row['a_materno'];
        $sexo = $row['sexo'];
        $fono = $row['telefono'];
        $correo = $row['correo'];
        $direccion = $row['direccion'];
        $foto = $row['nombre_archivo'];
        $comuna = $row['descripcion_comuna'];
        $idComuna = $row['comuna'];
        
        
    } /* else{
        $_SESSION['login_mensaje'] = 'Usuario o contraseña incorrecto';
        $_SESSION['color_mensaje_login'] = 'danger';
        header("Location: ../public/index.php");
    } */
    

 // ------  FIN Codigo variable de sesion de usuario desde login -------
?>


                                
                                    <div class="row mt-5">
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label for="">Rut: </label>
                                            <input type="text" class="form-control"  name="rut" id="rut" value="<?php echo $rut ?>" minlength="8" maxlength="12" required onChange="javascript:return Rut(document.reloj24.rut.value)" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label for="">Nombres:</label>
                                            <input type="text" placeholder="" class="form-control" name="nombres" value="<?php echo $nombres ?>" onkeypress="return validar_solo_letras_con_espacio(event);" required autocomplete="off" onpaste="return false">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label for="">Apellido Paterno:</label>
                                            <input type="text" placeholder="" class="form-control" name="ape_pat" value="<?php echo $a_paterno ?>" onkeypress="return  validar_solo_letras(event);" required autocomplete="off" onpaste="return false">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label for="">Apellido Materno:</label>
                                            <input type="text" placeholder="" class="form-control" name="ape_mat" value="<?php echo $a_materno ?>" onkeypress="return  validar_solo_letras(event);" required autocomplete="off" onpaste="return false">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label for="">Correo:</label>
                                            <input type="email" placeholder="ejemplo@gmail.com" class="form-control" value="<?php echo $correo ?>" name="correo" required autocomplete="off" onpaste="return false">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label for="">Fono:</label>
                                            <input type="text" placeholder="955443322" class="form-control" name="fono" value="<?php echo $fono ?>" onkeypress="return validar_solo_numeros(event);" onpaste="return false" required autocomplete="off" onpaste="return false">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label for="">Foto:</label>
                                            <input type="file" value="<?php echo $foto ?>" name="archivo" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label for="sexo">Sexo:</label>
                                            <select name="sexo" id="sexo" class="form-control">
                                                <option value="<?php echo $sexo ?>"><?php echo $sexo ?></option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Dirección:</label>
                                                <input type="text" value="<?php echo $direccion ?>"  placeholder="Pje. almendros 123 - Villa el almendral" class="form-control" name="direccion" required autocomplete="off" onpaste="return false">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label for="comuna">Comuna:</label>
                                            
                                            <select name="comuna" required="" id="address" class="address-input form-control">
                                                <option value="<?php echo $idComuna ?>"><?php echo $comuna ?></option>
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
                                    </div>
                                    
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-6">
                                    <input type="submit" class="btn btn-success btn-block mt-5 mb-5" name="guardar_registro" value="ACTUALIZAR">
                                    </div>                 
                                </div>
                                </form>
                            </div>
                            </div>  
                        </div>
                    </div>
                </section>
      	    </div>
		</div>
	</div>
</div>