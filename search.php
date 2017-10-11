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

      <form method="GET" action="search.php" name="search-form">
        <!--Search input  -->
          <input type="text" placeholder="Search" name="searchBar"><input type="submit" value="Submit">
      </form>
  </div>
</section>
<section>
    <div class="searchbin">
      <?php
      try{
        // If the GET variable is set with a search term
        if(isset($_GET['searchBar'])) {
          // Strip tags strips any tags the could be injected into the table
            $chosenCatorgory= strip_tags($_GET['searchBar']);
            // Grabs the searchterm
            $items = "SELECT * FROM Products WHERE product_name LIKE :name OR product_description LIKE :description OR product_price LIKE :price";
            // checks to see if the search term matchs the name, description, and price inputs of the Products tabel
            $chosenItems = $db->prepare($items);
            // Prepares the query to be used
            $chosenItems->bindValue(':name', "%$chosenCatorgory%");
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
                <img src=\"{$item['product_image']}\" />
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
