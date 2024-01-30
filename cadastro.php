<!--- PAGINA DE CADASTRO DO USUARIO --->
<?php 

    // Cria a conexão com BD
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

    <!--- CONTEUDO DO SITE --->
    <main>
        <div class="content">
            <h2 class="titleTop">Cadastro</h2>
            <h3 class="titleBottom">Deixe o seu Contato! </h3>
            <div class="contact-form">
                <form method="POST" action="mostraCadastro.php">
                    <!--- Atribui valor ao ID-->
                    <input type="hidden" name="id" id="id" value=""/>

                    <div class="form-group">                    
                        <label for="name"><i class="fa fa-user" aria-hidden="true"></i></label>
                        <input type="text" name="name" id="name" placeholder="Seu Nome" required>
                    </div><br>
                    <div class="form-group">                    
                        <label for="cpf"><i class="fa fa-user" aria-hidden="true"></i></label>
                        <input type="cpf" name="cpf" id="cpf" placeholder="CPF" required>
                    </div><br>
                    <div class="form-group">                        
                        <label for="email"><i class="fa fa-envelope" aria-hidden="true"></i></label>
                        <input type="email" name="email" id="email" placeholder="Seu Email" required>
                    </div><br>
                    <div class="form-group">                        
                        <label for="celular"><i class="fa fa-phone" aria-hidden="true"></i></label>
                        <input type="phone" name="celular" id="celular" pattern="\(\d{2}\)\s\d{4,5}-\d{4}$"
                            onkeydown="return mascaraTelefone(event)" placeholder="Seu celular" title="(xx) xxxxx-xxxx" required>
                    </div><br>
                    <div class="form-group">                        
                        <label for="dt_nasc"><i class="fa fa-birthday-cake" aria-hidden="true"></i></label>
                        <input type="date" name="dt_nasc" id="dt_nasc" title="Data de Nascimento" required>
                    </div><br>
                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>Eu concordo com os <a
                                href="#" class="term-service">termos de serviço</a></label>
                    </div><br>
                    <div class="form-group form-button">
                        <input type="submit" class="form-submit" value="Enviar">
                        <input type="reset" class="form-submit" value="Limpar">
                    </div>
                </form>
                
                
            </div>
        </div>

    </main>
    

    <!--- RODAPE --->
    <footer>
        &copy;2023 Todos os direitos reservados.
    </footer>
</body>


</html>