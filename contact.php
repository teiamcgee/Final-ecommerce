<!DOCTYPE HTML>
<html>
<head>
  <title>Contact</title>
<?php
 include "header.php";
?>
</head>
  <body>
  <?php include "inc/navigation.php" ?>
  <section>
     <h1 class="contact-message">Tell Us about your Delphi Experience!</h1>
     <div class="form-container">
  <?php
  // if information is being send through the server
     if(!empty($_POST)){
      try{
      // makes a connection to the database
       $db = new PDO('mysql:dbname=tmcgee;host=localhost;', 'r2hstudent', 'SbFaGzNgGIE8kfP');
        // Check for errors
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // insert into the table input
        $info = 'INSERT INTO  Contact(comments, firstname, lastname, email, company)
        VALUES( :comments,:firstname, :lastname, :email, :company)';
        // The values go that are entered go inside the determined table input
        $givenInfo = $db->prepare($info);
        // preparing the query to be used
        $givenInfo->bindParam(':firstname',strip_tags($_POST['firstname']));
        // binding the first name table input to the users input
        $givenInfo->bindParam(':lastname',strip_tags($_POST['lastname']));
        // binding the last name table input to the users input
        $givenInfo->bindParam(':email',strip_tags($_POST['email']));
        // binding the email table input to the users input
        $givenInfo->bindParam(':company', strip_tags($_POST['company']));
        // binding the company table input to the users input
        $givenInfo->bindParam(':comments',strip_tags($_POST['comments']));
        // binding the comments table input to the users input
        $givenInfo->execute();
        // Running the querying
      } catch(Exception $e){
        // catching the error and sending a message
        echo $e->getMessage();
        exit;
      }

      try
      {
        $comment =' SELECT comments FROM Contact ORDER BY id DESC';
        // Grab the comment from the contact table by order of id
        $givencomment = $db->prepare($comment);
        // prepares the query to be used
        $givencomment->execute();
        // Run the query
        $getcomment = $givencomment->fetchAll(PDO::FETCH_ASSOC);
        // Fetches a row from a result set associated with a PDOStatement object.
        foreach($getcomment as $comment){
          // For every comment in the table call it comment and display it to the page
          echo "
         <h3>{$comment['comments']}</h3>
          ";
        }
      }catch(Exception $e){
        // Catch the error and send a message
        echo $e->getMessage();
        exit;
      }
    } else {
      // If there is not anything being sent through the database show the form
      ?>
      <form id="form" name="form" action="contact.php"  method="POST">
          <div>
            <label for="firstname">First Name<input type="text" id="firstname" name="firstname" placeholder="First Name" required/></label>
          </div>
          <div>
            <label for="lastname">Last Name</label>
            <input type="text" id="lastname" name="lastname" placeholder="Last Name" required/>
          </div>
          <div>
            <label for="company">Company</label>
            <input type="text" id="company" name="company" placeholder="Company" required/>
          </div>
          <div>
            <label for="email">Email<input type="email" id="email" name="email" placeholder="Email" required/></label>
          </div>
          <div>
            <p>Comments:</p>
          <textarea placeholder="Please add comments here..." cols="80" rows="10" name="comments" id="comments" required></textarea>
        </div>
        <div id="submitbtn">
         <input type="submit" name="submit" value="Submit"/>
       </div>
         </form>
       <?php } ?>
  </div>
</section>
<!-- Connection to jQuery validate plugin -->
<script src="lib/js/javascript.js"></script>
  <?php
   include "footer.php";
  ?>
