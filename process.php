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
        $decimal *= -1; // Ajusta o sinal para coordenadas no hemisfério sul ou oeste

    return $decimal;
}

// Função que verifica se os valores vindos do formulário são válidos
function validarDMS($graus, $minutos, $segundos) {
    return  is_numeric($graus) && $graus >= 0 &&
            is_numeric($minutos) && $minutos >= 0 &&
            is_numeric($segundos) && $segundos >= 0;
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


if ( 
    validarDMS($infoLat['graus'], $infoLat['minutos'], $infoLat['segundos']) &&
    validarDMS($infoLon['graus'], $infoLon['minutos'], $infoLon['segundos'])
   ) 
{
  // Nessa parte nós estamos convertendo as coordenadas de latitude de DMS para decimal
  $latitudeDecimal = formatarDeDMSParaDecimal($infoLat);

  // Nessa parte nós estamos convertendo as coordenadas de longitude de DMS para decimal
  $longitudeDecimal = formatarDeDMSParaDecimal($infoLon);
  
  // Salvando os valores na session
  $_SESSION['latitude_decimal'] = $latitudeDecimal;
  $_SESSION['longitude_decimal'] = $longitudeDecimal;

} else {
  // Salvando a mensagem de erro na session
  $_SESSION['error'] = 'invalid input values';
}

header('Location: index.php');
exit();

?>