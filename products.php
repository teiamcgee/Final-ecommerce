<!DOCTYPE HTML>
<html>
<head>
  <title>Products</title>
<?php
 include "header.php";
?>
</head>
  <body>
  <section>
  <?php include "inc/navigation.php" ?>
  <form method="GET" action="products.php" id="catorgory">
    <!--Select for the filter  -->
  <select name="product_catorgory">
    <option value="">All products</option>
    <option value="scarf">Scarfs</option>
    <option value="perfume">Perfume</option>
    <option value="bracelet">Bracelets</option>
    <option value="earrings">Earrings</option>
  </select>
    <input type="submit" value="Submit">
  </form>
  <div class="products-container">
  <?php
    try{
      $db = new PDO('mysql:dbname=tmcgeehost=localhost;', 'r2hstudent', 'SbFaGzNgGIE8kfP');
      // connecting to the database
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // Checking to see if there are errors
      $filteredItem = 'SELECT * FROM Products';
      // Selecting all the catorgories from the Products table
      if(!empty($_GET['product_catorgory'])) {
        $filteredItem = $filteredItem . ' WHERE product_catorgory= :product_catorgory';
        // if there is GET variable search in the table where the product catorgory matches the chosen catorgory
      }

      $chosenItem = $db->prepare($filteredItem);
      // preparing the products from the database

      if(!empty($_GET['product_catorgory'])) {
        $chosenItem->bindParam(':product_catorgory', $_GET['product_catorgory']);
        // If the GET variable is ALL PRODUCTS show all products
      }
      $chosenItem->execute();
      // Running the query
      foreach($chosenItem->fetchAll() as $product){
        // Display the item name, description, image, and id to the page
        echo "
        <figure class='products'><a href=\"product-detail.php?product_id={$product['product_id']}\"><img src=\"{$product['product_image']}\" alt=\"{$product['product_name']}\"></a>
        <figcaption><a href=\"product-detail.php?product_id={$product['product_id']}\"><p>{$product['product_name']}</p>
        <p>\$ {$product['product_price']}</p></a></figcaption>
          </figure>
        ";
      }
    }catch(Exception $e){
      // Catches the error and sends the error message
        echo $e->getMessage();
        exit;
      }

   ?>
  </section>
</div>
  <?php
  // Include to footer page
   include "footer.php";
  ?>
