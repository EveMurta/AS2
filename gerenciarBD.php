<!--- MOSTRA TODOS OS DADOS DE TODOS OS USUARIOS CADASTRADOS --->

<!--- CONECTA AO BD --->
<?php require 'conectaBD.php';


if (isset($_SESSION ['login'])) {                               // Se existe usuário logado 
    header("location: login.php");  // Vai para as funcionalidades do site
    exit();
}
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
    <link rel="stylesheet" href="css/modal.css">

</head>

<body>
    <!--- CABECALHO DO SITE --->
    <header>
        <h1>GERENCIADOR DE CADASTRO DE USUARIO</h1>
        <h2>Acesso administrativo</h2>
    </header>


    <!-- LOGIN FAIL MODAL: login incorreto ou cadastro incorreto -->





    <div class="content">

        <table class="tableCSS">

            <!--- MOSTRA DATA --->
            <?php echo "<p><small>Data de hoje:" . date('d')  . "/" . date('m') . "/" . date('y') . "</small></p>"; ?>

            <?php
            // Monta a query
            $sql = "SELECT * FROM usuario";

            // Envia a query para o BD
            $res =  mysqli_query($conn, $sql);


            // Valida se deu certo a consulta e percorre os registros
            if ($res) {

                // Imprime nomes das colunas
                echo "<tr>
                        <th> ID </th>
                        <th> Nome </th>
                        <th> E-mail </th>
                        <th> Celular </th>
                        <th> Aniversario </th>
                        <th> Idade </th>
                        <th> CPF </th>
                        <th> Editar </th>
                        <th> Excluir </th>
                        </tr>";

                // Percorre os registros
                while ($row = mysqli_fetch_assoc($res)) {

                    // Formata data
                    list($ano, $mes, $dia) = explode('-', $row['Aniversario']); //separa ano, mes e dia por -
                    $row['Aniversario'] = $dia . '/' . $mes . '/' . $ano; //formata a data;

                    // Imprime as linas dos registros
                    echo "
                        <tr>
                        <td> " . $row['ID_usuario'] . " </td>
                        <td> " . $row['Nome'] . " </td>
                        <td> " . $row['E_mail'] . " </td>
                        <td> " . $row['Cel'] . " </td>
                        <td> " . $row['Aniversario'] . " </td>
                        <td> " . $row['Idade'] . " </td>
                        <td> " . $row['CPF'] . " </td>
                        <td><form method='POST' action='editaCadastro.php'>
                        <input type='hidden' name='cpf' id='cpf' value=" . $row['CPF'] . " />
                        <div class='form-group form-button'><input type='submit' class='form-submit' value='EDITAR'>
                        </div></form></td>
                        <td> <form method='POST' action='excluiCadastro.php'>
                        <input type='hidden' name='cpf' id='cpf' value=" . $row['CPF'] . " />
                        <div class='form-group form-button'><input type='submit' class='form-submit' value='EXCLUIR'>
                        </div></form></td>
                        <tr>";
                }
            }


            ?>

        </table>
        <input type=button class="form-submit" value=" << Retornar" onclick="history.back()">



</body>


</html>