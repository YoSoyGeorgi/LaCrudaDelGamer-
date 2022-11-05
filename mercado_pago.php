<?php
// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';
// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-8723337263203437-103109-b7efc5bcdf16190a77d7955b94570e97-159396141');

$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->id = '001';
$item->title = 'Mi producto';
$item->quantity = 1;
$item->unit_price = 75.56;
$preference->items = array($item);
$preference->save();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    // SDK MercadoPago.js V2
    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>

<body>


    <div class="cho-container"></div>
    <script>
        const mp = new MercadoPago('TEST-d1f55fce-3e40-4aa8-a656-75c1c7fefc82', {
            locale: 'es-MX'
        });

        mp.checkout({
            preference: {
                id: '<?php echo $preference -> id; ?>'
            },
            render: {
                container: '.cho-container',
                label: 'Pagar con MercadoPago',
            }
        });
    </script>


</body>

</html>