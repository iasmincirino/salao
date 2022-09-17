<?php

@include '../conexao.php';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE nome = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'Produto já adicionado ao carrinho';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(nome, preco, image, quantidade) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'Produto adicionado ao carrinho com sucesso';
   }

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Produtos</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- CSS  -->
   <link rel="stylesheet" href="style.css">
</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<?php include 'header.php'; ?>

<div class="container">

<section class="products">

   <h1 class="heading">Produtos</h1>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['nome']; ?></h3>
            <div class="price">$<?php echo $fetch_product['preco']; ?></div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['nome']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['preco']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="btn" value="Adicionar ao carrinho" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>

<!-- javascript  -->
<script src="script.js"></script>

</body>
</html>