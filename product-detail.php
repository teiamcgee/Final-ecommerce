<?php
 include "inc/connectdb.php";
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Product-detail</title>
  <?php include "header.php"; ?>
  </head>
<body>
  <?php include "inc/navigation.php"; ?>
  <div class="detail-container">
    <?php
        $items = 'SELECT * FROM Products WHERE product_id = :product_id';
          // Selecting from the database the product id that is selected from the product page
        $chosenproduct = $db->prepare($items);
        // Preparing those items to be selected from the database
        $chosenproduct->bindParam(':product_id',  $_GET['product_id']);
        // Binding the product id that is selected to the product id that is in the database
        $chosenproduct->execute();
        // Getting the products from the database
        foreach($chosenproduct->fetchAll() as $product){
          // Grabbing the item from the table one at a time

          // Displaying the product image, name, price, and description
          // Select tag as the quantity for the items
          echo "
          <div class='detailed-product'>
          <img src=\"{$product['product_image']}\" alt=\"{$product['product_name']}\">
          </div>
              <h1>{$product['product_name']}</h1>
              <p>{$product['product_description']}</p>
              <p>{$product['product_price']}</p>
              <button id='addbtn'>Buy</button>
              <select>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
              </select>
              <div class='addedItem'>
              <p>Added to cart</p>
              </div>
        ";
    }
    ?>
  </div>
  <div class="bogo">
    <!--BOGO sign  -->
    <h2>BOGO 50% OFF</h2>
  </div>
  <div class="shipping">
    <!--Free shipping banner  -->
    <h2>Free Shipping!</h2>
  </div>
  <script src="lib/js/javascript.js"></script>
  <?php
   include "footer.php";
  ?>
