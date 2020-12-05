<!DOCTYPE html>
<html>
  <head>
    <title>Creando base de datos</title>
  </head>
  <body>

    <h3>Creando...</h3>

<?php // Example 26-3: setup.php
  require_once 'functions.php';

  createTable('comments', 
              'auth VARCHAR(16),
              commentary VARCHAR(1000),
              INDEX(auth(6))');

  createTable('sales',
              'tour VARCHAR(16),
              date VARCHAR(16),
              quantity VARCHAR(20),
              INDEX(tour(6))');

  createTable('tours',
              'place VARCHAR(16),
              text VARCHAR(1000),
              price SMALLINT,
              date CHAR(15),
              transport CHAR(20),
              INDEX(place(6))');
?>

    <br>...listo.
  </body>
</html>
