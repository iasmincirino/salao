<?php

session_start();

if(!isset($_SESSION['user_name'])){
   header('location: ../login.php');
}

include '../conexao.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantidade'];
   $update_id = $_POST['update_quantidade_id'];
   $update_quantidade_query = mysqli_query($conn, "UPDATE `cart` SET quantidade = '$update_value' WHERE id = '$update_id'");
   if($update_quantidade_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Carrinho de Compra</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- CSS -->
   <link rel="stylesheet" href="style.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">

<section class="shopping-cart">

   <h1 class="heading">Carrinho</h1>

   <table>

      <thead>
         <th>Imagem</th>
         <th>Nome</th>
         <th>Preço</th>
         <th>Quantidade</th>
         <th>Preço Total</th>
         <th>Remover</th>
      </thead>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['nome']; ?></td>
            <td>$<?php echo number_format($fetch_cart['preco']); ?></td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantidade_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input type="number" name="update_quantidade" min="1"  value="<?php echo $fetch_cart['quantidade']; ?>" >
                  <input type="submit" value="atualizar" name="update_update_btn">
               </form>   
            </td>
            <td>$<?php echo $sub_total = number_format($fetch_cart['preco'] * $fetch_cart['quantidade']); ?></td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('Remover o item do carrinho?')" class="delete-btn"> <i class="fas fa-trash"></i> Remover</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         };
         ?>
         <tr class="table-bottom">
            <td><a href="products.php" class="option-btn" style="margin-top: 0;">Continuar na Loja</a></td>
            <td colspan="3">Total</td>
            <td>$<?php echo $grand_total; ?></td>
            <td><a href="cart.php?delete_all" onclick="return confirm('tem certeza de que deseja excluir tudo?');" class="delete-btn"> <i class="fas fa-trash"></i> Excluir Tudo </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">Fazer o Pedido</a>
   </div>

</section>

</div>
   
<!-- javascript  -->
<script src="script.js"></script>

</body>
</html>