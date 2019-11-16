<header>
	<nav class="navbar navbar-expand navbar-dark barnav static-top">
		<a class="navbar-brand mr-1" href="#"><img class="logo" src="vistas/img/Logo-white.png" alt="RedDents"></a>
		<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
		<i class="fas fa-bars"></i>
		</button>

		<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

		</form>

		<ul class="navbar-nav ml-auto ml-md-0">
			<li class="nav-item dropdown no-arrow mx-1">
				<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="badge badge-danger">9</span>&ensp;&ensp;
				<i class="fas fa-bell fa-fw"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Something else here</a>
				</div>
			</li>
			<li class="nav-item dropdown no-arrow">
				<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-user-circle fa-fw"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
					<a class="dropdown-item" href="index.php?p=perfilUsuario"><i class="far fa-id-badge"></i> Mi Perfil</a>
					<div class="dropdown-divider"></div>
					<!-- data-toggle="modal" data-target="#logoutModal" -->
					<a class="dropdown-item" href="index.php?quit=''"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
				</div>
			</li>
		</ul>
	</nav>
</header>

<div id="wrapper">

<?php  
	$user = $_SESSION['usuario'];

	if ($user['rol'] == "administrador") {
		include_once 'vistas/modulos/administrador/menu_lateral.php';
	}
	elseif ($user['rol'] == "usuario") {
		include_once 'vistas/modulos/usuario/menu_lateral.php';
	}

?>

	
	<div id="content-wrapper">

		<?php  
			$objControl = new Controlador();
			$objControl -> enlacePaginasControl();
		?>

	</div>
</div>

<?php  

	if (isset($_GET['quit'])) {
		$objControl = new Controlador();
		$objControl -> cerrarSesion();
	}
?>
