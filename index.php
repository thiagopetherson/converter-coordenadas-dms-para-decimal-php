<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DMS para Decimal</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <style>   
    body, html {
      height: 100%;
      background-color: Snow;
    }
  </style>
</head>
<body>

<div class="container">

  <div class="row mt-5 mb-5">    
    <div class="col-md-8 offset-md-2"> 
        <h1 class="text-center">Conversão de Coordenadas DMS para Decimal</h1>
    </div>
  </div>

    <div class="row">    
        <div class="col-md-8 offset-md-2">      
            <form method="post" action="process.php">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="lat-graus">º</label>
                            <input type="text" class="form-control" id="lat-graus" name="lat-graus" placeholder="º" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="lat-minutos">'</label>
                            <input type="text" class="form-control" id="lat-minutos" name="lat-minutos" placeholder="'" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="lat-segundos">''</label>
                            <input type="text" class="form-control" id="lat-segundos" name="lat-segundos" placeholder="''" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="lat-direcao">Latitude Direção</label>
                            <select class="form-control" id="lat-direcao" name="lat-direcao" name="lat-direcao" required>
                                <option value=""></option>
                                <option value="N">N</option>
                                <option value="S">S</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="lon-graus">º</label>
                            <input type="text" class="form-control" id="lon-graus" name="lon-graus" placeholder="º" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="lon-minutos">'</label>
                            <input type="text" class="form-control" id="lon-minutos" name="lon-minutos" placeholder="'" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                        <label for="lon-segundos">''</label>
                        <input type="text" class="form-control" id="lon-segundos" name="lon-segundos" placeholder="''" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="lon-direcao">Longitude Direção</label>
                            <select class="form-control" id="lon-direcao" name="lon-direcao" name="lon-direcao" required>
                                <option value=""></option>
                                <option value="E">E</option>
                                <option value="W">W</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-block">Formatar</button>
                    </div>
                </div>      
            </form>     
        </div>
    </div>

    <?php if (isset($_SESSION['error']) && $_SESSION['error'] === 'invalid input values') { ?> 
        <div class="row mt-5">    
            <div class="col-md-12">
                <p class="text-center bg-danger pt-3 pb-3 text-white fw-bold">
                    CAMPOS COM VALORES INVÁLIDOS.  POR FAVOR, VERIFIQUE E TENTE NOVAMENTE!       
                </p>        
            </div>           
        </div>
    <?php
            unset($_SESSION['error']);
        }
    ?>    

    <?php if (isset($_SESSION['latitude_decimal']) && isset($_SESSION['longitude_decimal'])) { ?> 
        <div class="row mt-5">    
            <div class="col-md-5">
                <p class="text-center bg-success pt-3 pb-3 text-white">
                Latitude em decimal: <b><?php echo $_SESSION['latitude_decimal']; ?></b>       
                </p>        
            </div>
            <div class="col-md-5 offset-md-2">
                <p class="text-center bg-success pt-3 pb-3 text-white">
                Longitude em decimal: <b><?php echo $_SESSION['longitude_decimal']; ?></b>
                </p>
            </div>
        </div>
    <?php
            unset($_SESSION['latitude_decimal']);
            unset($_SESSION['longitude_decimal']);
        }
    ?>     
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>