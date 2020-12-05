<?php // sqltest.php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die("Fatal Error");

  if (!empty($_POST['delete']) && !empty($_POST['tour']))
  {
    $tour   = get_post($conn, 'tour');
    $query  = "DELETE FROM sales WHERE tour='$tour'";
    $result = $conn->query($query);
    if (!$result) echo "DELETE failed<br><br>";
  }

  if (!empty($_POST['name'])   &&
      !empty($_POST['tour'])    &&
      !empty($_POST['date']) &&
      !empty($_POST['quantity'])     &&
      !empty($_POST['transport']))
  {

    $tour   = get_post($conn, 'tour');
    $date    = get_post($conn, 'date');
    $quantity = get_post($conn, 'quantity');
    $query    = "INSERT INTO sales VALUES" .
      "('$tour', '$date', '$quantity')";
    $result   = $conn->query($query);
    if (!$result) echo "INSERT failed<br><br>";
  }

  echo <<<_END
  <form action="reservar.php" method="post"><pre>
          Nombre <input type="text" name="name">
            Tour <input type="text" name="tour">
           Fecha <input type="text" name="date">
          Precio <input type="text" name="quantity">
      Transporte <input type="text" name="transport">
                            <input type="submit" value="Reservar">
  </pre></form>
_END;

  $query  = "SELECT * FROM sales";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed");

  $rows = $result->num_rows;

  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $row = $result->fetch_array(MYSQLI_NUM);

    $r0 = htmlspecialchars($row[0]);
    $r1 = htmlspecialchars($row[1]);
    $r2 = htmlspecialchars($row[2]);
    
    echo <<<_END
  <pre>
    para $r0
    Fecha $r1
    Precio $r2
  </pre>
  <form action='reservar.php' method='post'>
  <input type='hidden' name='delete' value='yes'>
  <input type='hidden' name='tour' value='$r0'>
  <input type='submit' value='Cancelar reservacion'></form>
_END;
  }

  $result->close();
  $conn->close();

  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
?>