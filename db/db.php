<?php

// Lineas para evitar el error de carga de pagina "ERR_CACHE_MISS", cuando vuelves de una pagina a la anterior
session_cache_limiter('private, must-revalidate');
session_cache_expire(60);
// FIN Lineas para evitar el error de carga de pagina "ERR_CACHE_MISS"


session_start();

//$mysqli= set_charset("utf8");
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'app'
);

?>