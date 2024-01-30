<!--- Conecta e adiciona dados ao banco de dados --->

<?php
global $servername;
global $username;
global $identificador;
global $dbname;

$servername = 'localhost'; // define o endereço de acesso do MySQL: equipamento local 
$username = 'root';        // define o usuário de BD para acesso: root é o usuário padrão
$password = '';            // define a senha de acesso do usuário: padrão é senha vazia
$dbname = 'purrinha';     // define a base de dados a ser acessada
   
// Cria a conexão 
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>