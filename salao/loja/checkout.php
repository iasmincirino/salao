<?php

@include '../conexao.php';

if(isset($_POST['order_btn'])){

   $nome = $_POST['nome'];
   $numero = $_POST['numero'];
   $metodo = $_POST['metodo'];
   $num_casa = $_POST['num_casa'];
   $rua = $_POST['rua'];
   $cidade = $_POST['cidade'];
   $estado = $_POST['estado'];
   $pin_code = $_POST['pin_code'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $total_preco = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_nome[] = $product_item['nome'] .' ('. $product_item['quantidade'] .') ';
         $product_price = number_format($product_item['preco'] * $product_item['quantidade']);
         $total_preco += $product_price;
      };
   };

   $total_produtos = implode(', ',$product_nome);
   $detail_query = mysqli_query($conn, "INSERT INTO `dados`(nome, numero, metodo, num_casa, rua, cidade, estado, pin_code, total_produtos, total_preco) VALUES('$nome','$numero','$metodo','$num_casa','$rua','$cidade','$estado','$pin_code','$total_produtos','$total_preco')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>Obrigada Pela Compra!</h3>
         <div class='order-detail'>
            <span>".$total_produtos."</span>
            <span class='total'> Total : $".$total_preco."  </span>
         </div>
         <div class='customer-details'>
            <p> Seu nome : <span>".$nome."</span> </p>
            <p> Seu numero : <span>".$numero."</span> </p>
            <p> Seu endereço : <span>".$num_casa.", ".$rua.", ".$cidade.", ".$estado.", ".$pin_code."</span> </p>
            <p> Seu metodo de pagamento : <span>".$metodo."</span> </p>
            <p>(*Aguarde a chegada do produto!*)</p>
         </div>
            <a href='products.php' class='btn'>Voltar para a Loja</a>
         </div>
      </div>
      ";
   }

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- CSS  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">Complete o seu pedido</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_preco = number_format($fetch_cart['preco'] * $fetch_cart['quantidade']);
            $grand_total = $total += $total_preco;
      ?>
      <span><?= $fetch_cart['nome']; ?>(<?= $fetch_cart['quantidade']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>Seu carrinho está vazio!</span></div>";
      }
      ?>
      <span class="grand-total"> Total : $<?= $grand_total; ?> </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>Seu nome</span>
            <input type="text" placeholder="Digite Seu Nome" name="nome" required>
         </div>
         <div class="inputBox">
            <span>Seu número</span>
            <input type="number" placeholder="Digite Seu Número" name="numero" required>
         </div>
         <div class="inputBox">
            <span>Metodo de Pagamento</span>
            <select name="metodo">
               <option value="Cartão de Débito" selected>Cartão de Débito</option>
               <option value="Cartão de Crédito">Cartão de Crédito</option>
               <option value="Paypal">Paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Número da Casa</span>
            <input type="number" placeholder="Número Da Casa" name="num_casa" required>
         </div>
         <div class="inputBox">
            <span>Nome da Rua</span>
            <input type="text" placeholder="Nome Da Rua" name="rua" required>
         </div>
         <div class="inputBox">
            <span>Nome da Cidade:</span>
            <input type="text" placeholder="Nome Da Cidade" name="cidade" required>
         </div>
         <div class="inputBox">
            <span>Nome do Estado:</span>
            <input type="text" placeholder="Nome Do Estado" name="estado" required>
         </div>
         <div class="inputBox">
            <span>PIN Code</span>
            <input type="text" placeholder="PIN" name="pin_code" required>
         </div>
      </div>
      <input type="submit" value="Pedir Agora" name="order_btn" class="btn">
   </form>

</section>

</div>



<!-- javascript  -->
<script src="script.js"></script>
   
</body>
</html>