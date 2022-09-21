<?php

@include 'conexao.php';

session_start();

if(isset($_POST['signup'])){

   $name = mysqli_real_escape_string($conn, $_POST['signup_name']);
   $email = mysqli_real_escape_string($conn, $_POST['signup_email']);
   $pass = md5($_POST['signup_password']);
   $cpass = md5($_POST['signup_cpassword']);
   $user_type = $_POST['signup_user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $erro[] = 'Esse usuário já existe!';

   }else{

      if($pass != $cpass){
         $erro[] = 'Senha incorreta!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
      }
   }

};

if(isset($_POST['signin'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location: ./loja/admin.php');

      }else if($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location: ./loja/cart.php');

      }
     
   }else{
      $error[] = 'Senha ou email incorretos!';
   }

};
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cadastro e Login</title>

   <!-- CSS  -->
   <link rel="stylesheet" href="style_login.css">

</head>
<body>
<div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="" method="post" class="sign-in-form">
          <h2 class="title">Login</h2>
         <?php
            if(isset($error)){
               foreach($error as $error){
                  echo '<span class="error-msg">'.$error.'</span>';
               };
            };
         ?>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Email" name="email" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Senha" name="password" required />
          </div>
          <input type="submit" value="Login" name="signin" class="btn solid" />
        </form>
        <form action="" class="sign-up-form" method="post">
          <h2 class="title">Cadastro</h2>
         <?php
            if(isset($erro)){
               foreach($erro as $erro){
                  echo '<span class="error-msg">'.$erro.'</span>';
               };
            };
         ?>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Nome" name="signup_name" required />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" name="signup_email" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Senha" name="signup_password" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Confirmar Senha" name="signup_cpassword" required />
          </div>
          <div class="input-field">
            <i class="fas fa-user-cog"></i>
            <select name="signup_user_type">
               <option value="user">user</option>
            </select>
          </div>
          <input type="submit" class="btn" name="signup" value="Cadastrar" />
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Ainda não tem uma conta?</h3>
          <p>
            Caso não tenha uma conta, crie uma agora!
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Cadastro
          </button>
        </div>
        <img src="image/hair01.png" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>Já tem uma conta?</h3>
          <p>
            Se você já se cadastrou, entre na sua conta!
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Login
          </button>
        </div>
        <img src="image/hair02.png" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <script src="app.js"></script>
</body>
</html>