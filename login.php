<?php
session_start(); // informa ao PHP que iremos trabalhar com sessão
require 'conectaBD.php';

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

    <script src="script/script.js"></script>

</head>

<body>
    <!--- CABECALHO DO SITE --->
    <header>
        <h1>Tela de login administrativo</h1>
        <h2>!!! Acesso administrativo !!!</h2>
    </header>

    <!-- Botao que abre modal de criar login e senha-->
    <div calss="center">
        <p><button id="criar" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Cariar conta</button></p>
    </div>

    <!-- Botao que abre modal de login-->
    <div calss="center">
        <p><button id="login" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Fazer login</button></p>
    </div>

    <!-- Modal de criar login e senha-->
    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <form method="POST" class="modal-content animate" action="cadastraADM.php">
            <div class="container">
                <h1>Criar conta</h1>
                <hr>
                <label for="nome"><b>Seu nome</b></label>
                <input type="text" placeholder="Escreva seu nome" name="nome" required>

                <label for="usuario"><b>Usuario</b></label>
                <input type="text" placeholder="Escreva seu nome de usuario" name="usuario" required>

                <label for="senha"><b>Senha</b></label>
                <input type="password" placeholder="Escreva sua senha" name="senha" required>

                <label for="confirmasenha"><b>Confirme sua senha</b></label>
                <input type="password" placeholder="Repita sua senha" name="confirmasenha" required>

                <label>
                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Lembrar de mim
                </label>

                <div class="clearfix">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancelar</button>
                    <button type="submit" class="signupbtn">Criar conta</button>
                </div>
            </div>
        </form>
    </div>

    <div id="id02" class="modal">

        <form class="modal-content animate" action="logaADM.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>

            <div class="container">
                <label for="usuario"><b>Nome de usuario</b></label>
                <input type="text" placeholder="Insira seu nome de ususario" name="usuario" required>

                <label for="senha"><b>Senha</b></label>
                <input type="password" placeholder="Insira sua senha" name="senha" required>

                <button type="submit">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Lembrar de mim
                </label>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn1">Cancelar</button>
            </div>
        </form>
    </div>

    <script>// SCRIPT PARA FAZER MODAL SUMIR SE TOCAR FORA DELE
        
        var modal = document.getElementById('id01');

      
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";

            }
        }
        
        var modal1 = document.getElementById('id02');

        window.onclick = function(event) {
            if (event.target == modal1) {
                modal.style.display = "none";

            }
        }
    </script>

</body>


</html>