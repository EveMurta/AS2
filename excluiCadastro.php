<!--- PAGINA DE EXCLUSAO DO CADASTRO DO USUARIO --->


<?php

// CONECTA AO BD
require 'conectaBD.php';

// Obtem parametro enviado via GET
$cpf = $_POST["cpf"];

//PARAMETROS PARA EXCLUIR CADASTRO

$sql = "DELETE FROM usuario WHERE CPF = $cpf";

// Envia a query para o BD
$res =  mysqli_query($conn, $sql);

// Redireciona para pagina de cadastro
header("Location: cadastro.php")

?>