<?php
  try{
    // makes a new connection to the database
<<<<<<< HEAD
  $db = new PDO('mysql:host=localhost;dbname=tmcgee', 'r2hstudent', 'SbFaGzNgGIE8kfP');
=======
  $db = new PDO('mysql:dbname=tmcgeehost=localhost;', 'r2hstudent', 'SbFaGzNgGIE8kfP');
>>>>>>> e206bdd52a02b0597a8dc291d24f0478e6a27a31
  // check for errors
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(Exception $e){
    // Catches the error and sends the error message
      echo $e->getMessage();
      exit;
    }
?>
