<?php
    session_start();
    include_once("conexao_agenda.php");

    $nome = filter_input(INPUT_POST, 'nome');
    $servico = filter_input(INPUT_POST, 'servico');
    $horario = filter_input(INPUT_POST, 'horario');
    $data = filter_input(INPUT_POST, 'data');
    
    $result = "INSERT INTO clientes (nome, servico, horario, data) VALUES ('$nome', '$servico', '$horario', '$data')";

    $resultado = mysqli_query($conn, $result);

    if(mysqli_affected_rows($conn)){
      header("Location: ../index.php");
    }
?>
