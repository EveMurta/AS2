<?php
require 'conectaBD.php';

$nome = "";
$usuario = "";
$senha = "";


// Reccebe os dados via POST enviados pelo formulario
$nome = $_POST["nome"]; //pega o dado e atribui valor
$usuario = $_POST["usuario"]; //pega o dado e atribui valor
$senha = $_POST["senha"]; //pega o dado e atribui valor

// Cria o comando SQL adequado para o INSERT
$sql = "INSERT INTO login (Nome, Login, Senha)
            VALUES('$nome', '$usuario', MD5('$senha'));
            ";

// Envia e verifica se o registro foi para o BD
if (mysqli_query($conn, $sql)) {
    echo "";
} else {
    echo "Error: " . $sql .
        "<br>" . mysqli_error($conn);
}
header('location: login.php');
?>