<header class="header">

   <div class="flex">

      
      <a href="../logout.php" class="logo"><i class="fas fa-sign-out"> Sair</i></a>

      <nav class="navbar">
         <a href="products.php">Produtos</a>
      </nav>

      <?php
      @include 'config.php';
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="cart.php" class="cart">Compra <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>