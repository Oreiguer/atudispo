<?php

// Lineas para evitar el error de carga de pagina "ERR_CACHE_MISS", cuando vuelves de una pagina a la anterior
session_cache_limiter('private, must-revalidate');
session_cache_expire(60);
// FIN Lineas para evitar el error de carga de pagina "ERR_CACHE_MISS"


session_start();


$conn = mysqli_connect(
    'us-cdbr-east-02.cleardb.com',
    'bffb4d7229f932',
    'dbc91188',
    'heroku_4ad79e3c3dae7d9'
);


/*
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'app'
);
*/
?>