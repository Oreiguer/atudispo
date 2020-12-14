<!----   Mensaje campos vacios  ---->
<div class="row justify-content-center ">
    <div class="col-8">
        <?php if(isset($_SESSION['bienvenida_tecnico'])) { ?>
        <div class="alert alert-<?= $_SESSION['color_mensaje']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['bienvenida_tecnico']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php unset($_SESSION['bienvenida_tecnico'], $_SESSION['color_mensaje']); } ?>
    </div>
</div>
<!---- FIN  Mensaje campos vacios  ---->