<?php
session_start(); // informa ao PHP que iremos trabalhar com sessão
require 'conectaBD.php';

// Reccebe os dados via POST enviados pelo formulario
$usuario = $_POST['usuario']; // prepara a string recebida para ser utilizada em comando SQL
$senha   = $_POST['senha']; // prepara a string recebida para ser utilizada em comando SQL
   

//Select para verificar login e senha
$sql = "SELECT Login, Senha FROM login WHERE Login = '$usuario' AND Senha = MD5('$senha');";
$result = $conn->query($sql);

if ($result) { // Verifica se a consulta foi bem-sucedida
    if ($result->num_rows == 1) {  // Verifica se a query retorna somente uma linha
        $row = $result->fetch_assoc();
        $_SESSION['usuario'] = $usuario; // Ativa as variáveis de sessão
        $_SESSION['senha'] = $senha;
        unset($_SESSION['nao_autenticado']);
        unset($_SESSION['mensagem_header']);
        unset($_SESSION['mensagem']);

        // Redireciona para a página de funcionalidades.
        header('location: gerenciarBD.php');
        exit();
    } else {  // Não deu match: login ou senha incorretos.
        $_SESSION['nao_autenticado'] = true; // Ativa ERRO nas variáveis de sessão
        $_SESSION['mensagem_header'] = "Login";
        $_SESSION['mensagem']        = "ERRO: Login ou Senha inválidos.";
        // Redireciona para página inicial
        header('location: login.php');
        exit();
    }
}
$conn->close();  //Encerra conexao com o BD
?>


