<?php

    define("KEY_TOKEN", "APR.wqr-354*");

    session_start();

    $num_cart = 0;
    if(isset($_SESSION['carrito']['productos'])){
        $num_cart = count($_SESSION['carrito']['productos']);
    }

?>