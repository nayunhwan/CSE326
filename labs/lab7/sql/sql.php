<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SQL</title>
  </head>
  <body>
    <form action="sql.php" method="POST">
      <p>
        DB :
      </p>
      <input type="text" name="dbname" size="200">
      <p>
        Query :
      </p>
      <input type="text" name="dbquery" size="200">
      <input type="submit" value="DB검색">
    </form>
    <ul>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dbname = $_POST["dbname"];
        $dbquery = $_POST["dbquery"];
      }

      $db = new PDO("mysql:dbname=$dbname;", "root", "root");
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
