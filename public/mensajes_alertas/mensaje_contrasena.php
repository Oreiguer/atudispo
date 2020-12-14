<!----   Mensaje alerta guardado correctamente  ---->
<div class="row justify-content-center">
     <div class="col-6">
        <?php if(isset($_SESSION['cambio_pass'])) { ?>
          <div class="alert alert-<?= $_SESSION['color_mensaje_cambio']?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['cambio_pass']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php unset($_SESSION['cambio_pass'], $_SESSION['color_mensaje_cambio']); } ?>
      </div>
    </div>
<!---- FIN  Mensaje alerta guardado correctamente  ---->