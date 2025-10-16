<?php

if (isset($_GET["reiniciar"]) || $resultado==true) {
    setcookie("Aleatorio", "", time() - 3600); 
    header("Location: Ejercicio_2_2.php"); 
    exit;
}


if (!isset($_COOKIE["Aleatorio"])) {
    $aleatorio = generadorNumeroAleatorio();
    setcookie("Aleatorio", $aleatorio, time() + 3600);
    $valorCookie = $aleatorio;
} else {
    $valorCookie = intval($_COOKIE["Aleatorio"]);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['numero'])) {
    $numero = intval($_POST['numero']);
    $resultado = comprobarNumero($numero, $valorCookie);
}

function generadorNumeroAleatorio(){
    return rand(1, 1000);
}


function comprobarNumero($numero,$aleatorio){
    $resultado=false;
    echo $aleatorio;
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if($numero<$aleatorio){
            echo "El número es mayor";
        }elseif($numero>$aleatorio){
            echo "El número es menor";
        }else{
            $resultado = true;
        }
    }
    return $resultado;
}   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(!comprobarNumero($numero,$valorCookie)):
    ?>
    <form action="" method="post">
        <label for="numero">Número</label>
        <input type="number" name="numero" id="numero">
        <button type="submit">Enviar</button>
        <a href="?reiniciar">Reiniciar Juego</a>
    </form>
    <?php
        else:
    ?>
    <h2>Has Acertado!</h2>
    <?php
        endif;
    ?>
</body>
</html>


