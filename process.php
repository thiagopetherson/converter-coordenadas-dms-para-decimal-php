<?php

session_start();

// Função que converte as coordenatas de DMS (Graus, Minutos e Segundos) para o formato decimal
function formatarDeDMSParaDecimal($info)
{
    // Nessa parte estamos calculando a parte decimar a partir de graus, minutos e segundos
    $decimal = $info['graus'] + ($info['minutos'] / 60) + ($info['segundos'] / 3600);

    /**
     * Se a direção for 'N' (norte) ou 'E' (lest), o valor decimal deve ser positivo
     * Se a direção for 'S' (sul) ou 'W' (oeste), o valor decimal deve ser negativo
    */

    if ($info['direcao'] == 'S' || $info['direcao'] == 'W')
        $decimal *= -1;

    return $decimal;
}


// Latitude
$infoLat = [];
$infoLat['graus'] = $_POST["lat-graus"];
$infoLat['minutos'] = $_POST["lat-minutos"];
$infoLat['segundos'] = $_POST["lat-segundos"];
$infoLat['direcao'] = $_POST["lat-direcao"];

// Longitude
$infoLon = [];
$infoLon['graus'] = $_POST["lon-graus"];
$infoLon['minutos'] = $_POST["lon-minutos"];
$infoLon['segundos'] = $_POST["lon-segundos"];
$infoLon['direcao'] = $_POST["lon-direcao"];

// Nessa parte nós estamos convertendo as coordenadas de latitude de DMS para decimal
$latitudeDecimal = formatarDeDMSParaDecimal($infoLat);

// Nessa parte nós estamos convertendo as coordenadas de longitude de DMS para decimal
$longitudeDecimal = formatarDeDMSParaDecimal($infoLon);
 
$_SESSION['latitude_decimal'] = $latitudeDecimal;
$_SESSION['longitude_decimal'] = $longitudeDecimal;


header('Location: index.php');
exit();

?>