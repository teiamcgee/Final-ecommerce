<?php
  include "inc/connectdb.php";
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Home</title>
  <?php include "header.php"; ?>
</head>
<body>
  <?php include "inc/navigation.php"; ?>
  <section>
  <h1 class="hometitle">BoGo!</h1>
    <h2 class="homeh2">Sale Now! 50% OFF!</h2>
    <div class="banner-container">
    <div class="banner">
      <!--Slide show images  -->
      <img src="lib/img/thynameisdiva.jpeg" alt="Thy name is diva">
      <img src="lib/img/dazzle.jpeg" alt="Dazzle">
      <img src="lib/img/ad2.jpeg" alt="Karma ad">
      <img src="lib/img/Oceana.jpeg" alt="Oceana">
      <img src="lib/img/uscollection.jpeg" alt="Us Collection">
    </div>
  </div>
  <script type="text/javascript" src="lib/js/javascript.js"></script>
</section>
<section>
  <div class="featured">
    <h3>Featured Items</h3>
  <?php
      {
      $items = 'SELECT * FROM Products WHERE isFeatured = "true"';
        // Selecting from the database the product isFeatured is true
      $featuredProduct = $db->prepare($items);
      // Preparing those items to be selected from the database
      $featuredProduct->execute();
      // Getting the products from the database
      foreach($featuredProduct->fetchAll() as $product){
        // Grabbing the item from the table one at a time

        // Displaying the product image, name
        echo "
        <div class='featured-product'>
        <figure><a href=\"product-detail.php?product_id={$product['product_id']}\"><img src=\"{$product['product_image']}\" alt=\"{$product['product_name']}\"></a>
        </figure>
        </div>
      ";
  }
}
  ?>
</div>
</section>
<?php
 include "footer.php";
?>
