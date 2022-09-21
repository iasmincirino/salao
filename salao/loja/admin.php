<?php

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:../login.php');
}

include '../conexao.php';

if(isset($_POST['add_product'])){
   $p_nome = $_POST['p_nome'];
   $p_preco = $_POST['p_preco'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = 'uploaded_img/'.$p_image;

   $insert_query = mysqli_query($conn, "INSERT INTO `products`(nome, preco, image) VALUES('$p_nome', '$p_preco', '$p_image')") or die('query failed');

   if($insert_query){
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      $message[] = 'Produto adicionado com sucesso!';
   }else{
      $message[] = 'Erro ao adicionar produto!';
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:admin.php');
      $message[] = 'Produto deletado.';
   }else{
      header('location:admin.php');
      $message[] = 'O produto NÃO foi deletado.';
   };
};

if(isset($_POST['update_product'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_nome = $_POST['update_p_nome'];
   $update_p_preco = $_POST['update_p_preco'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = 'uploaded_img/'.$update_p_image;

   $update_query = mysqli_query($conn, "UPDATE `products` SET nome = '$update_p_nome', preco = '$update_p_preco', image = '$update_p_image' WHERE id = '$update_p_id'");

   if($update_query){
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      $message[] = 'Produto atualizado com sucesso';
      header('location:admin.php');
   }else{
      $message[] = 'Produto NÃO foi atualizado';
      header('location:admin.php');
   }

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Painel - Adm</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- CSS -->
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

<header class="header">

   <div class="flex">

      <a href="#" class="logo">Salão</a>

      <nav class="navbar">
         <a href="../logout.php"><i class="fas fa-sign-out"> Sair</i></a>
      </nav>

      <?php
      @include '../conexao.php';
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>

<div class="container">

<div class="add-product-form">

   <form action="" method="post" class="formulario" enctype="multipart/form-data">
      <h3>Adicionar Produto</h3>
      <input type="text" name="p_nome" placeholder="Nome do produto" class="box" required>
      <input type="number" name="p_preco" min="0" placeholder="Preço do produto" class="box" required>
      <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
      <input type="submit" value="Adicionar produto" name="add_product" class="botao">
   </form>
     
   <div class="imagem">
      <img src="../image/produt.png" alt="" class="cabelo">
   </div>
</div>

<section class="products">

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($row = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="uploaded_img/<?php echo $row['image']; ?>" alt="">
            <h3><?php echo $row['nome']; ?></h3>
            <div class="price">$<?php echo $row['preco']; ?></div>
            <input type="hidden" name="product_name" value="<?php echo $row['nome']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $row['preco']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>"><br>
            <a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Tem certeza de que deseja excluir isso?');"> <i class="fas fa-trash"></i> Deletar </a>
            <a href="admin.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> Atualizar </a>
         </div>
      </form>

      <?php
            };    
            }else{
               echo "<div class='empty'>Nenhum produto adicionado</div>";
            };
         ?>

   </div>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_p_nome" value="<?php echo $fetch_edit['nome']; ?>">
      <input type="number" min="0" class="box" required name="update_p_preco" value="<?php echo $fetch_edit['preco']; ?>">
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
      <input type="submit" value="Enviar produto" name="update_product" class="btn">
      <input type="reset" value="Cancelar" id="close-edit" class="option-btn">
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

</section>

</div>


<!-- javascript  -->
<script src="script.js"></script>

</body>
</html>