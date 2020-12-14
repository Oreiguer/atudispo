<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>atudispo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/aos.css">
	<link href="public/fontawesome/css/all.css" rel="stylesheet">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.Rut.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/validarut.js"></script>
    

</head>
<body>

<!-- Modal login clientes-->
<div id="ModalLoginClientes" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content container">
		  <div class="modal-header">
			<h4 id="titleModal" class="modal-title">Login Clientes</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div>
		  <div class="modal-body ">
			<form action="../controllers/verificar_login_cliente.php" method="POST" >
			<div class="form-group">
				<label for="recipient-name" class="col-form-label">Usuario</label>
				<input type="text" class="form-control" name="cliente" id="usuario_tecnico" placeholder="ejemplo@gmail.com" onpaste="return false" required>
			</div>
			<div class="form-group">
				<label for="recipient-name" class="col-form-label">Contraseña</label>
				<input type="text" class="form-control" name="contrasena" maxlength="8" id="contrasena_tecnico" placeholder="****" autocomplete="off" onpaste="return false" required>
			</div>
			<br>
			<div class="row justify-content-center pb-3">
				<div class="col-6">
					<a href="registro-cliente.php" class="btn btn-primary form-control">Registrarse</a>
				</div>
				<div class="col-6">
					<input type="submit" name="c_guardar" class="btn btn-success form-control" value="Entrar">
					
				</div>
			</div>
			</form>
      	  </div>
		</div>
	</div>
</div>
<!-- Fin Modal login clientes-->


<!-- Modal login Técnicos-->
<div id="ModalLoginTecnicos" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content container">
		  <div class="modal-header">
			<h4 id="titleModal" class="modal-title">Login Técnicos</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div>
		  <div class="modal-body ">
			<form action="../controllers/verificar_login_tec.php" method="POST" >
			<div class="form-group">
				<label for="recipient-name" class="col-form-label">Usuario</label>
				<input type="text" class="form-control" name="tecnico" id="usuario_tecnico" placeholder="ejemplo@gmail.com" onpaste="return false" required>
			</div>
			<div class="form-group">
				<label for="recipient-name" class="col-form-label">Contraseña</label>
				<input type="text" class="form-control" name="contrasena" maxlength="8" id="contrasena_tecnico" placeholder="****" autocomplete="off" onpaste="return false" required>
			</div>
			<br>
			<div class="row justify-content-center pb-3">
				<div class="col-6">
					<a href="registro-tec.php" class="btn btn-primary form-control">Registrarse</a>
				</div>
				<div class="col-6">
					<input type="submit" name="guardar" class="btn btn-success form-control" value="Entrar">
					
				</div>
			</div>
			</form>
      	  </div>
		</div>
	</div>
</div>
<!-- Fin Modal login técnicos-->



