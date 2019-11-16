<header>
	<nav class="navbar navbar-expand-lg navbar-dark barnav">
  		<a class="navbar-brand" href="index.php"><img class="logo" src="vistas/img/Logo-white.png" alt="RedDents"></a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>

		<div class="collapse navbar-collapse" id="menu">
 			<ul class="nav navbar-nav ml-auto">
	  		<li class="nav-item">
	    		<a class="nav-link active" href="index.php"><div class="active-sub"><i class="fas fa-home"></i> Inicio</div></a>
	  		</li>
	  		<li class="nav-item">
	    		<a class="nav-link" href="#"><i class="fas fa-user-md"></i> Servicios</a>
	  		</li>
	  		<li class="nav-item">
		 		<a class="nav-link" href="#"><i class="fas fa-user-friends"></i> Nosotros</a>
		  	</li>
			<!-- <li class="nav-item">
			 	<a class="nav-link" href="#"><i class="fas fa-user-circle "></i></a>
			</li>  -->
			</ul>
		
		</div>
	</nav>
</header>

<?php  
	$objControl = new Controlador();
	$objControl -> enlacePaginasControl();

?>
	