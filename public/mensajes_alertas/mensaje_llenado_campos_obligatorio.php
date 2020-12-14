<!-- Mensajes llenar campos obligatorio -->
<div class="row justify-content-center mt-3">
    <div class="col-6">
        <?php if(isset($_SESSION['llenado_campos_obligatorio'])) { ?>
         <div class="alert alert-<?= $_SESSION['color_mensaje']?> alert-dismissible fade show" role="alert">
         <?= $_SESSION['llenado_campos_obligatorio']?>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
         </div>
       <?php unset($_SESSION['llenado_campos_obligatorio'], $_SESSION['color_mensaje']); } ?>
    </div>
</div>
<!---- FIN  Mensaje llenar campos obligatorio  ---->