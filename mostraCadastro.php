<!--- PAGINA DE RETORNO DO CADASTRO DO USUARIO --->


<?php

// CONECTA AO BD
require 'conectaBD.php';

// Reccebe os dados via POST enviados pelo formulario
$id = $_POST["id"]; //pega o dado e atribui valor
$nome = $_POST["name"]; //pega o dado e atribui valor
$email = $_POST["email"]; //pega o dado e atribui valor
$celular = $_POST["celular"]; //pega o dado e atribui valor
$agree = $_POST["agree-term"]; //pega o dado e atribui valor
$data = $_POST["dt_nasc"]; //pega o dado e atribui valor
$cpf = $_POST["cpf"];


// Verifica se e cadastro ou udate
// Se o ID for vazio faz cadastro
if (empty($id)) {


    list($ano, $mes, $dia) = explode('-', $data); //separa ano, mes e dia por -
    $aniversario = $dia . '/' . $mes . '/' . $ano; //formata a data

    // cria data atual
    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('y'));

    //pega a o tempo exato da data de nascimento da pessoa 
    $nascimento = mktime(0, 0, 0, $mes, $dia, $ano);
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

    // Cria o comando SQL adequado para o INSERT
    $sql = "INSERT INTO usuario (Nome, E_mail, Cel, Aniversario, Idade, CPF)
        VALUES ('$nome','$email','$celular','$data', '$idade', '$cpf')";

    // Verifica se o registro foi para o BD
    if (mysqli_query($conn, $sql)) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }



} else { //Se nao
    // Pega o CPF
    isset($id);


    //PARAMETROS PARA EDITAR CADASTRO

    $sql = "UPDATE `usuario` SET
            `Nome` = '$nome',
            `E_mail` = '$email',
            `Cel` = '$celular',
            `Aniversario` = '$data'

            WHERE 
            `ID_usuario` = $id";

    // Envia a query para o BD
    $res =  mysqli_query($conn, $sql);
}

// Pega dados do usuario pelo CPF
$sql = "SELECT * FROM usuario WHERE CPF = '$cpf'";

// Envia a query para o BD
$res =  mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($res);

$nome = $row["Nome"]; //pega o dado e atribui valor
$email = $row["E_mail"]; //pega o dado e atribui valor
$celular = $row["Cel"]; //pega o dado e atribui valor
$aniversario = $row["Aniversario"]; //pega o dado e atribui valor
$cpf = $row["CPF"]; //pega o dado e atribui valor

list($ano, $mes, $dia) = explode('-', $data); //separa ano, mes e dia por -
$aniversario = $dia . '/' . $mes . '/' . $ano; //formata a data

// cria data atual
$hoje = mktime(0, 0, 0, date('m'), date('d'), date('y'));

//pega a o tempo exato da data de nascimento da pessoa 
$nascimento = mktime(0, 0, 0, $mes, $dia, $ano);
$idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

mysqli_close($conn);
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


    <table class="tableCSS">
        <tr>
            <th>CAMPO</th>
            <th>VALOR</th>

        </tr>
        <tr>
            <th>Nome</th>
            <td><?php echo $nome; ?></td>
        </tr>
        <tr>
            <th>E-mail</th>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <th>Celular</th>
            <td><?php echo $celular; ?></td>
        </tr>
        <tr>
            <th>Aniversário</th>
            <td><?php echo $aniversario; ?></td>
        </tr>
        <tr>
            <th>Idade</th>
            <td><?php echo $idade; ?></td>
        </tr>
        <tr>
            <th>CPF</th>
            <td><?php echo $cpf; ?></td>
        </tr>



    </table>
    <form method="POST" action="editaCadastro.php">
        <input type="hidden" name="cpf" id="cpf" value="<?php echo $cpf; ?>" />
        <div class="form-group form-button">
            <input type="submit" class="form-submit" value="EDITAR">
        </div>
    </form>
    <form method="POST" action="excluiCadastro.php">
        <input type="hidden" name="cpf" id="cpf" value="<?php echo $cpf; ?>" />
        <div class="form-group form-button">
            <input type="submit" class="form-submit" value="EXCLUIR TODOS OS DADOS">
        </div>
    </form>

    <input type=button class="form-submit" value=" << Retornar" onclick="history.back()">




</body>


</html>