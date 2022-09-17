<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="inner">
<div class="image-holder">
<img src="salon.png" alt="image">
</div>
    <form action="confir_agenda.php" method="post">
        <h3>Agendar Serviço</h3>
        <!--Escreva o seu nome-->
        <div class="form-wrapper">
        <input type="text" name="nome" placeholder="Seu Nome" class="form-control">
        </div>

        <!--Selecionar a serviços-->
        <div class="form-wrapper">
        <select name="servico" class="form-control">
        <option value="servico" disabled selected>Serviço</option>
        <option value="Cabelo">Cabelo</option>
        <option value="Maquiagem">Maquiagem</option>
        <option value="Manicure e Pedicure">Manicure e Pedicure</option>
        <option value="Dia da Noiva">Dia da Noiva</option>
        <option value="Sombrencelhas">Sombrencelhas</option>
        <option value="Estética">Estética</option>
        </select>
        </div>

        <!--Selecionar o horário-->
        <div class="form-wrapper">
        <select name="horario" class="form-control">
        <option value="horario" disabled selected>Horário</option>
        <option>09:00</option>
        <option>10:00</option>
        <option>11:00</option>
        <option>12:00</option>
        <option>13:00</option>
        <option>14:00</option>
        <option>15:00</option>
        <option>16:00</option>
        <option>17:00</option>
        </select>
        </div>

        <!--Selecionar a data-->
        <div class="form-wrapper">
        <input type="date" name="data" class="form-control">
        </div>

        <!--Enviar-->
        <input type="submit" class="botao um" name="enviar" value="Enviar">
        <a href="../index.php" class="botao dois">Voltar</a>
    </form>
</div>
</div>

</body>
</html>