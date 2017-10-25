<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <ul>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
        $dbname = $_POST["dbname"];
        $dbquery = $_POST["dbquery"];
      }

      $db = new PDO("mysql:dbname=$dbname;host=localhost", "root", "root");
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $rows = $db->query($dbquery);
      $keys = array_keys($rows); ?>
      <li>
      <?php
      foreach ($keys as $key) { ?>
        <?= $key?>
        <?php
      } ?>
      </li>
      <?php
      foreach ($rows as $row) {
        ?>
        <li>
          <?php
        foreach ($row as $key => $value) {
          if($key !== 0 && $key !== 1 && $key !== 2){
           ?>
        <?= $key?> ; <?= $value?> |
          <?php }
          }
        ?>
        </li>
    <?php
      }
    ?>
    </ul>
  </body>
</html>

<!-- <?=$row[student_id] ?> | <?=$row[course_id]?> | <?=$row[grade]?> | <?=$row[id]?> | <?=$row[name]?> | <?=$row[teacher_id]?> -->
