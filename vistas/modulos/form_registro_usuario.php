<div class="container">
	<div class="row justify-content-center ">
		<div class="col-md-5">
			<form class="text-center registro-sesion" method="POST">
				<legend>Registro de Usuario</legend>
				<div class="form-row justify-content-around">
					<div class="col-md-11">
						<div class="form-group">
							<input type="text" class="form-control"  name="nombreUsuario" placeholder="Nombre">
						</div>

					</div>
					<div class="col-md-11">
						<div class="form-group">
							<input type="text" class="form-control"  name="telefonoUsuario" placeholder="Teléfono">
						</div>

					</div>
					<div class="col-md-11">
						<div class="form-group">
							<input type="text" class="form-control" name="emailUsuario" placeholder="Correo electrónico">
						</div>
					</div>
					<div class="col-md-11">
						<div class="form-group">
							<input type="password" class="form-control" name="passUsuario" placeholder="Contraseña">
						</div>
					</div>
					<div class="col-md-11">
						<div class="form-group">
							<input type="password" class="form-control" name="confirmPassUsuario" placeholder="Confirmar contraseña">
						</div>
					</div>
				</div>
				<button class="btn btn-outline-info" type="submit" name="btnRegistrar"><i class="far fa-paper-plane align-middle"></i>  <span class="align-middle">  Registrarse</span></button>
				<div class="form-group mt-2 subtitulos">
					<a href="index.php?p=menuRegistroUsuario">Volver</a>
				</div>
			</form>				
		</div>
	</div>
</div>

<?php  
	if (isset($_POST['btnRegistrar'])) {
		$objControl = new Controlador();
		$objControl -> controlUsuario("registrar");
	}

?>