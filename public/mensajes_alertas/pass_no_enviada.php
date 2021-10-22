<!----   Mensaje envio pass ok  ---->
<div class="row justify-content-center ">
    <div class="col-6">
        <?php if(isset($_SESSION['mensaje_pass_fall'])) { ?>
        <div class="alert alert-<?= $_SESSION['color_mensaje']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['mensaje_pass_fall']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php unset($_SESSION['mensaje_pass_fall'], $_SESSION['color_mensaje']); } ?>
    </div>
</div>
<!---- FIN  Mensaje envio pass ok  ---->