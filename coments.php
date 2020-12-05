<?php // sqltest.php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) {
      die("Fatal Error");
  }

  if (!empty($_POST['delete']) && !empty($_POST['auth'])) {
      $auth   = get_post($conn, 'auth');
      $query  = "DELETE FROM comments WHERE auth='$auth'";
      $result = $conn->query($query);
      if (!$result) {
          echo "DELETE failed<br><br>";
      }
  }

  if (!empty($_POST['auth'])   &&
      !empty($_POST['commentary'])) {
      $auth     = get_post($conn, 'auth');
      $commentary     = get_post($conn, 'commentary');
      $query    = "INSERT INTO comments VALUES" .
      "('$auth', '$commentary')";
      $result   = $conn->query($query);
      if (!$result) {
          echo "INSERT failed<br><br>";
      }
  }

  echo <<<_END
  <form action="coments.php" method="post"><pre>
                   Correo: <input type="text" name="auth">
    Escribe un comentario: <input type="text" name="commentary">
                            <input type="submit" value="Agregar comentario">
  </pre></form>
_END;

  $query  = "SELECT * FROM comments";
  $result = $conn->query($query);
  if (!$result) {
      die("Database access failed");
  }

  $rows = $result->num_rows;

  for ($j = 0 ; $j < $rows ; ++$j) {
      $row = $result->fetch_array(MYSQLI_NUM);

      $r0 = htmlspecialchars($row[0]);
      $r1 = htmlspecialchars($row[1]);
    
      echo <<<_END
    <pre>
      De: $r0
      Comentario: $r1
    </pre>
    <form action='coments.php' method='post'>
      <input type='hidden' name='delete' value='yes'>
      <input type='hidden' name='auth' value='$r0'>
      <input type='submit' value='Eliminar comentario'>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> 
  </body>
</html>
_END;
  }

  $result->close();
  $conn->close();

  function get_post($conn, $var)
  {
      return $conn->real_escape_string($_POST[$var]);
  }
