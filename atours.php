<?php // sqltest.php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die("Fatal Error");

  if (!empty($_POST['delete']) && !empty($_POST['price']))
  {
    $price   = get_post($conn, 'price');
    $query  = "DELETE FROM tours WHERE price='$price'";
    $result = $conn->query($query);
    if (!$result) echo "DELETE failed<br><br>";
  }

  if (!empty($_POST['place'])   &&
      !empty($_POST['text'])    &&
      !empty($_POST['price']) &&
      !empty($_POST['date'])     &&
      !empty($_POST['transport']))
  {
    $place   = get_post($conn, 'place');
    $text    = get_post($conn, 'text');
    $price = get_post($conn, 'price');
    $date     = get_post($conn, 'date');
    $transport     = get_post($conn, 'transport');
    $query    = "INSERT INTO tours VALUES" .
      "('$place', '$text', '$price', '$date', '$transport')";
    $result   = $conn->query($query);
    if (!$result) echo "INSERT failed<br><br>";
  }

  echo <<<_END
  <form action="atours.php" method="post"><pre>
          Lugar <input type="text" name="place">
    Descripcion <input type="text" name="text">
         Precio <input type="text" name="price">
          Fecha <input type="text" name="date">
     Transporte <input type="text" name="transport">
                            <input type="submit" value="Agregar tour">
  </pre></form>
_END;

  $query  = "SELECT * FROM tours";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed");

  $rows = $result->num_rows;

  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $row = $result->fetch_array(MYSQLI_NUM);

    $r0 = htmlspecialchars($row[0]);
    $r1 = htmlspecialchars($row[1]);
    $r2 = htmlspecialchars($row[2]);
    $r3 = htmlspecialchars($row[3]);
    $r4 = htmlspecialchars($row[4]);
    
    echo <<<_END
  <pre>
    Lugar $r0
    Descripcion $r1
    Precio $r2
    Fecha $r3
    Transporte $r4
  </pre>
  <form action='atours.php' method='post'>
  <input type='hidden' name='delete' value='yes'>
  <input type='hidden' name='price' value='$r2'>
  <input type='submit' value='Eliminar Tour'></form>
_END;
  }

  $result->close();
  $conn->close();

  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
?>