<div class="container contenedor-index">	
		<div class="row">
			<div class="col-md-6">
				<div class="row justify-content-around slogan">
					<div class="col-md-10">
						<h1 class="titulos">La mejor decisión para tú negocio</h1>
					</div>
					<div class="col-md-9">
						<h5 class="cuerpos">RedDents es un servicio en la nube para la gestión de consultorios odontológicos.</h5>			
					</div>
					<!-- <div class="mx-auto">
						<a class="btn btn-info" href="#" role="button"><i class="far fa-arrow-alt-circle-right"></i> <span class="align-middle">Añadir a Pantalla de Inicio</span></a>
					</div> -->
				</div>
			</div>
			<div class="col-md-6">
				<div class="row justify-content-center">
					<div class="col-md-10">
						<form class="text-center inicio-sesion" method="POST">
							<legend>Iniciar sesión</legend>
							<div class="form-row justify-content-around">
                				<div class="col-md-10">
                					<div class="form-group">
										<input type="text" class="form-control" name="emailSesion" placeholder="Correo electrónico">
									</div>
                				</div>
                				<div class="col-md-10">
                					<div class="form-group">
										<input type="password" class="form-control" name="passSesion" placeholder="Contraseña">
									</div>	
                				</div>
                			</div>
							
							<button class="btn btn-outline-info" name="btnIngresar" type="submit"><i class="far fa-paper-plane align-middle"></i>  <span class="align-middle"> Iniciar sesion</span></button>
							<div class="form-group mt-2 subtitulos">
								<a href="index.php?p=menuRegistroUsuario">Registrate</a>
							</div>
						</form>						
					</div>
				</div>		
			</div>
		</div>
	</div>

<?php  
	if (isset($_POST['btnIngresar'])) {
		$objControl = new Controlador();
		$objControl -> iniciarSesion();
	}

?>