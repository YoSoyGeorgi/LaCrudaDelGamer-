<?php

require '../config/config.php';
require '../config/database.php';

if (isset($_POST['action'])) {

    $action = $_POST['action'];
    $id = isset($_POST['id']) ? $_POST['id'] : 0;

    if ($action == 'agregar') {
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;
        $db = new Database();
        $con = $db->conectar();
        $sql = $con->prepare("SELECT precio FROM tienda_online.productos where id= ? limit 1");
        $sql->execute([$id]);
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $precio = $row['precio'];
        $resultado = $cantidad * $precio;
        $datos['ok'] = true;        
        $datos['sub'] = $resultado;
    } else if($action == 'eliminar'){
        if($id > 0 ){
            if(isset($_SESSION['carrito']['productos'][$id])){
                unset($_SESSION['carrito']['productos'][$id]);
                $datos['ok'] = true;
            }else{
                $datos['ok'] = true;
            }
        }
    } else {
        $datos['ok'] = false;
    }
} else {
    $datos['ok'] = false;
}

echo json_encode($datos);


?>