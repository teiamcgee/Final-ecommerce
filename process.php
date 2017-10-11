<?php
include "header.php";
include "footer.php";
 ?>
<!DOCTYPE HTML>
<head>
  <meta charset="utf-8">
</head>
<body>
  <h1>Thank for your information!</h1>
  <h2>We will be contacting you shortly!</h2>
  <?php
    try
    {
      $db = new PDO('mysql:dbname=Final_project;host=localhost', 'root', 'root');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $comment = 'SELECT comments FROM Contact' ;
      $givencomment = $db->prepare($comment);
      $givencomment->execute();
      foreach($givencommemt->fetchAll() as $comments){
        echo "
        <h3>{$comments['comments']}</h3>
        ";

      }
    }catch(Exception $e){
      echo $e->getMessage();
      exit;
    }
  ?>
</body>
</html>
