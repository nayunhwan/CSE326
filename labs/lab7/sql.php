<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SQL</title>
  </head>
  <body>
    <ul>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dbname = $_POST["dbname"];
        $dbquery = $_POST["dbquery"];
      }

      $db = new PDO("mysql:dbname=$dbname;host=localhost", "root", "root");
      $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $rows = $db -> query($dbquery);
      $keys = array_keys($rows); 

      foreach ($rows as $row) {
    ?> 
        <li>
          <?php
            foreach ($row as $key => $value) {
              if (!is_numeric($key)) {
           ?>
              <?= $key?>: <?= $value?> |
          <?php 
            }
          }
          ?>
        </li>
    <?php
      }
    ?>
    </ul>
  </body>
</html>
