<?php
include "inc/connectdb.php";
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Search</title>
  <?php include "header.php" ?>
</head>
<body>
  <?php include "inc/navigation.php" ?>
  <section>
  <div id="sidebar">
      <h1>Find Your Fabulous!</h1>

      <form method="GET" action="search.php" name="search-form" id="search-form">
        <!--Search input  -->
          <input type="text" placeholder="Search" name="searchBar">
          <select name="price-filter" id="price_fiter">
            <option>Name your Price</option>
            <option value="00-15">$0 - $15</option>
            <option value="20-30">$20 - $30</option>
            <option value="30-40">$30 - $40</option>
            <option value="40-50">$0 - $50</option>
          </select>
          <input type="submit" value="Submit">
      </form>
  </div>
</section>
<section>
    <div class="searchbin">
      <?php
      try{
        // If the GET variable is set with a search term
        if(isset($_GET['searchBar'])&& isset($_GET['price-filter'])) {
          // Strip tags strips any tags the could be injected into the table
            $chosenCatorgory= strip_tags($_GET['searchBar']);
            // Grabs the searchterm
            $items = "SELECT * FROM Products WHERE (product_name LIKE :name OR product_description LIKE :description OR product_price LIKE :price) AND product_price <= :maxproduct_price AND product_price >= :minproduct_price ORDER BY product_price";
            // checks to see if the search term matchs the name, description, and price inputs of the Products tabel and if the price has been selected
            $splitIndex = strpos($_GET['price-filter'], "-");
            // seperating the numbers before and after the dash
            $max = substr($_GET['price-filter'], $splitIndex + 1, 2);
            // grabbing the two numbers after the dash
            $min = substr($_GET['price-filter'], 0, 2);
            // getting two numbers before the dash
            $chosenItems = $db->prepare($items);
            // Prepares the query to be used
            $chosenItems->bindValue(':name', "%$chosenCatorgory%");
            //binding the value of the price selector to the min or max variable
            $chosenItems->bindValue(':maxproduct_price', $max);
            $chosenItems->bindValue(':minproduct_price', $min);
            // %wildcard% - if it starts with or ends with item catorgory in the product table
            // binding the value of the search term and the item name
            $chosenItems->bindValue(':price', "%$chosenCatorgory%");
            // binding the value of the search term and the item price
            $chosenItems->bindValue(':description', "%$chosenCatorgory%");
            // binding the value of the search term and the item description
            $chosenItems->execute();
            // Run the query
            // Grab all the items that match in the table and display them
            foreach($chosenItems->fetchAll() as $item){
                echo "
                <div class='searchCat'>
                <figure>
                <figure><a href=\"product-detail.php?product_id={$product['product_id']}\"><img src=\"{$product['product_image']}\" alt=\"{$product['product_name']}\">
                <figcaption>{$item['product_name']}</figcaption>
                </figure>
                <p>{$item['product_price']}</p>
                <p>{$item['product_description']}</p>
                </div>
                ";

              }
          }
        } catch(Exception $e){
          // Catch the error and send a message
            echo $e->getMessage();
            exit;
          }
      ?>
    </div>
  </section>
  </body>
  </html>
