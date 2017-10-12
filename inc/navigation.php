  <?php session_start(); ?>
<section>
  <h1 class="title">Delphi</h1>
  <div id="header">
    <nav>
      <!--Nav bar for everypage  -->
      <ul class="navbar">
        <li><a href="./index.php">Home</a></li>
        <li><a href="./products.php">Products</a></li>
        <li><a href="./contact.php">Contact</a></li>
        <li><a href="./search.php">Search</a></li>
      </ul>
      <img src="lib/img/cart.png" alt="Cart" id="cart">
  </nav>
  <div class="cart-counter">
    <!--Showing the items in the cart  -->
    <p class="cartNumber"><?php echo $_SESSION['cart'] ?></p>
  </div>
</div>
</section>
