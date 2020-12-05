<?php
  
echo <<<_END
<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="node_modules/bulma/css/bulma.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href='style.css' rel='stylesheet'>
    <title>Tour en camioneta y camión:</title>
  </head>
  <body>
    <div class="p-3 mb-2 bg-primary text-white">
      <div data-role='page'>
        <div date-role='header'>
          <div class="container">
            <div id='logo' class='center'>Tour en camioneta y <br>       <img src='camioneta.png' weight='300 px' height='100 px'>        camión       <img src='camion.png' weight='300 px' height='100 px'></div>
            <div class='username'></div>
          </div>
        </div>
        <div data-role='content'>
            <div class='container'>
              <div class='container'>
                <div class="row">
                  <div class="col-sm">
                    <div class="text-center">
                      <div class="p-3 mb-2 bg-light text-dark"><a data-role='button' data-inline='true'
                      data-transition="slide" href='index.php'>Sobre la página.</a></div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="text-center">
                      <div class="p-3 mb-2 bg-light text-dark"><a data-role='button' data-inline='true'
                      data-transition="slide" href='tours.php'>Tours.</a></div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="text-center">
                      <div class="p-3 mb-2 bg-light text-dark"><a data-role='button' data-inline='true'
                      data-transition="slide" href='coments.php'>Comentarios</a></div>
                    </div>
                  </div>
                </div>
                
            </div>
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="..." alt="">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="..." alt="">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="..." alt="">
              </div>
            </div>
            <a class="carousel-control-prev" href="playa.jpg" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="cancun.jpg" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <p clss='info'>(Puedes reservar sin neceidad de tener una cuenta pero para algunas acciones es requerida.)</p>
        </div>
      </div>
    </div>
_END;

?>