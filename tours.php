<?php //fetchrow.php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die("Fatal Error");

  $query  = "SELECT * FROM tours";
  $result = $conn->query($query);
  if (!$result) die("Fatal Error");

  $rows = $result->num_rows;

  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $row = $result->fetch_array(MYSQLI_ASSOC);

    echo 'Lugar: '       . htmlspecialchars($row['place'])   . '<br>';
    echo 'Descripcion: ' . htmlspecialchars($row['text'])    . '<br>';
    echo 'Precio: '      . htmlspecialchars($row['price']) . '<br>';
    echo 'Fechas: '      . htmlspecialchars($row['date'])     . '<br>';
    echo 'Transporte: '  . htmlspecialchars($row['transport'])     . '<br>'; 
    echo <<<_END
    <a href='reservar.php'>Reservar</a><br><br>
  _END;
    
  }

  $result->close();
  $conn->close();
?>
