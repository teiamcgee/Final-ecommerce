<?php
  try{
    // makes a new connection to the database

  $db = new PDO('mysql:dbname=tmcgee_ecommerce;host=localhost;', 'r2hstudent', 'SbFaGzNgGIE8kfP');
  // check for errors
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(Exception $e){
    // Catches the error and sends the error message
      echo $e->getMessage();
      exit;
    }

    session_start();
?>
