<?php  
  $user = $_SESSION['usuario'];
?>
<div class="contenedor container">
  <section class="row justify-content-center">
    <div class="col-12 col-lg-6">
      <div class="modal-registro">
        <a href="#" class="enlace">Cambiar Contraseña</a>&ensp;&ensp;
        <a href="#" class="enlace">Eliminar Cuenta</a>
        <br><br><br>
          <form class="text-center" method="POST">
            <legend class="subtitulos">Actualizar Información</legend>
            <div class="form-row justify-content-around">
              <div class="col-md-11">
                <div class="form-group">
                  <input type="text" class="form-control"  name="nombreUsuario" value="<?php echo $user['nombre'] ?> " placeholder="Nombre">
                </div>
          
              </div>
              <div class="col-md-11">
                <div class="form-group">
                  <input type="text" class="form-control"  name="telefonoUsuario" value="<?php echo $user['telefono'] ?> " placeholder="Teléfono">
                </div>
          
              </div>
              <div class="col-md-11">
                <div class="form-group">
                  <input type="text" class="form-control" name="emailUsuario" value="<?php echo $user['email'] ?> " placeholder="Correo electrónico">
                </div>
              </div>
            </div>
            <button class="btn btn-outline-info" type="submit" name="btnActualizar"><i class="far fa-paper-plane align-middle"></i>  <span class="align-middle">  Actializar</span></button>
            <div class="form-group mt-2 subtitulos">
              <a href="index.php">Volver</a>
            </div>
          </form>
      </div>           
    </div>
    
  </section>

</div>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
      </div>
      
      <div class="modal-body">
        ¿Desea eliminar este registro?
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a class="btn btn-danger btn-ok">Delete</a>
      </div>
    </div>
  </div>
</div>

<?php  
  $objControl = new Controlador();
  $objControl -> enlacePaginasControl();

  if (isset($_POST['btnActualizar'])) {
    $objControl -> controlUsuario("actualizar");
  }

?>