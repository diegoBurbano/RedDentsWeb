<!DOCTYPE html>
<html lang="es">
<head>
	<title>RedDents</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
  <!-- favicon -->
  <link rel="shorcut icon" href="vistas/img/favicon.png">
  <!-- Custom fonts for this template-->
  <link href="vistas/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="vistas/css/sb-admin.css" rel="stylesheet">
  <!-- dataTable -->
  <link href="vistas/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="vistas/datatable/css/responsive.bootstrap4.min.css" rel="stylesheet">
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="vistas/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="vistas/css/estilos.css">
  <!-- Bootstrap core JavaScript-->
  <script src="vistas/js/jquery.min.js"></script>
  <script src="vistas/js/bootstrap.bundle.min.js"></script>
</head>
<body id="page-top">
  
  <?php 
    $objControl = new Controlador();
    $objControl->mostrarMarco();
  ?>

  

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Core plugin JavaScript-->
  <script src="vistas/js/jquery.easing.min.js"></script>
  
  <!-- Custom scripts for all pages-->
  <script src="vistas/js/sb-admin.min.js"></script>

  <!-- dataTable -->
  <script src="vistas/datatable/js/jquery.dataTables.min.js"></script>
  <script src="vistas/datatable/js/dataTables.bootstrap4.min.js"></script>
  <script src="vistas/datatable/js/dataTables.responsive.min.js
  "></script>
  <script src="vistas/datatable/js/responsive.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
  </script>

</body>
</html>
