<!--- PAGINA DE RETORNO DO CADASTRO DO USUARIO --->


<?php

// CONECTA AO BD
require 'conectaBD.php';

// Obtem parametro enviado via GET
$cpf = $_POST["cpf"];

// Comando SQL para pegar informacoes cadastradas
$sql = "SELECT * FROM usuario WHERE CPF = $cpf";

// Envia a query para o BD
$res =  mysqli_query($conn, $sql);

// Armazena o registro
$row = mysqli_fetch_assoc($res);

//Guarda dado dentro da variavel
$nome = $row['Nome'];
$email = $row['E_mail'];
$celular = $row['Cel'];
$data = $row['Aniversario'];
$id = $row['ID_usuario'];

//PARAMETROS PARA EDITAR CADASTRO

$sql = "UPDATE usuario SET
            Nome =  '$nome',
            E_mail = '$email',
            Cel = '$celular',
            Aniversario = '$data'

            WHERE 
            ID_usuario = $id";


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/ico" href="imagens/mao-aberta.ico">
    <title>Purrinha - Jogo</title>

    <!--- LINK DE REFERENCIA STYLE --->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <!--- CABECALHO DO SITE --->
    <header>
        <h1>Purrinha</h1>
        <nav>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="cadastro.php">Cadastro</a></li>
                <li><a href="about.html">Sobre</a></li>
            </ul>
        </nav>
    </header>


    <div class="content">
        <p>Dados de contato</p>
    </div>

    <!--- MOSTRA DATA --->
    <?php echo "<p><small>Data de hoje:" . date('d')  . "/" . date('m') . "/" . date('y') . "</small></p>"; ?>

    <div class="content">
        <h2 class="titleTop">Atualizar contato</h2>
        <div class="contact-form">
            <form method="POST" action="mostraCadastro.php">
                <!--- Atribui valor ao ID-->
                <input type="hidden" name="id" id="id" value="" />

                <div class="form-group">
                    <label for="name"><i class="fa fa-user" aria-hidden="true"></i></label>
                    <input type="text" name="name" id="name" placeholder="Seu Nome" value="<?php echo $nome; ?>" required>
                </div><br>

                <div class="form-group">
                    <label for="email"><i class="fa fa-envelope" aria-hidden="true"></i></label>
                    <input type="email" name="email" id="email" placeholder="Seu Email" value="<?php echo $email; ?>" required>
                </div><br>
                <div class="form-group">
                    <label for="celular"><i class="fa fa-phone" aria-hidden="true"></i></label>
                    <input type="phone" name="celular" id="celular" pattern="\(\d{2}\)\s\d{4,5}-\d{4}$" onkeydown="return mascaraTelefone(event)" placeholder="Seu celular" title="(xx) xxxxx-xxxx" value="<?php echo $celular; ?>" required>
                </div><br>
                <div class="form-group">
                    <label for="dt_nasc"><i class="fa fa-birthday-cake" aria-hidden="true"></i></label>
                    <input type="date" name="dt_nasc" id="dt_nasc" title="Data de Nascimento" value="<?php echo $data; ?>" required>
                </div><br>
                <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                <input type="hidden" name="agree-term" id="agree-term" value=true />
                <input type="hidden" name="cpf" id="cpf" value="<?php echo $cpf; ?>" />


                <div class="form-group form-button">
                    <input type="submit" class="form-submit" value="SALVAR">
                </div>


            </form>


        </div>

        </form>
        <input type=button class="form-submit" value=" << Retornar" onclick="history.back()">
</body>


</html>