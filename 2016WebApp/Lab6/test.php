<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <?php
      // $files = glob("lab6/musicPHP/songs/*.mp3");
      $files = scandir("lab6/*.txt");
      foreach ($files as $f) {
        file_put_contents("lab6/", $f, "changed");
        ?>
        
      <?php } ?>


  </body>
</html>
