<!----   Mensaje campos vacios  ---->
<div class="row justify-content-center">
    <div class="col-6">
        <?php if(isset($_SESSION['login_mensaje'])) { ?>
        <div class="alert alert-<?= $_SESSION['color_mensaje_login']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['login_mensaje']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php unset($_SESSION['login_mensaje'], $_SESSION['color_mensaje_login']); } ?>
    </div>
</div>
<!---- FIN  Mensaje campos vacios  ---->