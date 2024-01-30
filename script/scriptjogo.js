//Desenvolvendo o JOGO 

// Cria variáveis para elementos INPUT com as classes indicadas no querySelector,
// para obter os valores da rodada. 
var envioJogada = document.querySelector('.envioJogada');
var campoJogada = document.querySelector('.campoJogada');
var botaoReinicio;

// Cria um resultado aleatório entre 0 e 9 para os jogadores 2 e 3
var palpiteJogador2 = Math.floor(Math.random() * 9) + 0;
var palpiteJogador3 = Math.floor(Math.random() * 9) + 0;

// Cria uma jogada aleatoria para os jogadores 2 e 3
var jogador2 = Math.floor(Math.random() * 3) + 0;
var jogador3 = Math.floor(Math.random() * 3) + 0;

// Soma para resultado
var resultado = jogador1 + jogador2 + jogador3;

function getParameters() {

    var params = new Array();
    var paramsRet = new Array();
    var url = window.location.href;     // Obtém a URL
    var paramsStart = url.indexOf("?"); // Procura ? na URL
  
    if (paramsStart != -1) {
      // Encontrou ? na URL
      var paramString = url.substring(paramsStart + 1); // Retorna parte da URL após ?
      paramString = decodeURIComponent(paramString);    // Decodifica código de URI da URL
      var params = paramString.split("&"); // Retorna trechos da String separados por &
      for (var i = 0; i < params.length; i++) {
        var pairArray = params[i].split("="); // Retorna trechos da String separados por =
        if (pairArray.length == 2) {
          paramsRet[pairArray[0]] = pairArray[1];
        }
  
      }
      return paramsRet;
    }
    return null; // Não encontrou ? na URL
  }

// Confere a jogada
function conferirJogada() {

    var palpiteJogador = Number(jogador1.value);

    // Confere se o palpite do jogador 1 esta correto
    if (palpiteJogador === jogador1 + jogador2 + jogador3) {
        resultado.textContent = 'Parabens voce acertou! O numero e: ' + resultado;
        jogador2.textContent = 'O jogador2 mostrou' + jogador2 + 'palitos';
        jogador3.textContent = 'O jogador3 mostrou' + jogador3 + 'palitos';
        resultado.style.backgroundColor = 'lightgreen';
        configFimDeJogo();

        // Confere se o palpite do jogador 2 esta correto
    } else if (palpiteJogador2 === jogador1 + jogador2 + jogador3) {
        resultado.textContent = 'O jogador 2 venceu! numero e: ' + resultado;
        jogador2.textContent = 'O jogador2 mostrou' + jogador2 + 'palitos';
        jogador3.textContent = 'O jogador3 mostrou' + jogador3 + 'palitos';
        resultado.style.backgroundColor = 'lightcoral';
        configFimDeJogo();

        // Confere se o palpite do jogador 3 esta correto
    } else if (palpiteJogador3 === jogador1 + jogador2 + jogador3) {
        resultado.textContent = 'O jogador 3 venceu! numero e: ' + resultado;
        jogador2.textContent = 'O jogador2 mostrou' + jogador2 + 'palitos';
        jogador3.textContent = 'O jogador3 mostrou' + jogador3 + 'palitos';
        resultado.style.backgroundColor = 'lightcoral';
        configFimDeJogo();
    }

    campoJogada.value = '';
    campoJogada.focus();

}

function configFimDeJogo() {
    campoJogada.disabled = true;  // desabilita campo de INPUT
    envioJogada.disabled = true;  // desabilita campo de INPUT
    botaoReinicio = document.createElement('button');
    botaoReinicio.textContent = 'Iniciar novo jogo';
    document.body.appendChild(botaoReinicio);
    botaoReinicio.addEventListener('click', reiniciarJogo);
}

function reiniciarJogo() {

    //Reinicia os parametros
    var reiniciarParas = document.querySelectorAll('.cjtoResultados p');
    for (var i = 0; i < reiniciarParas.length; i++) {
        reiniciarParas[i].textContent = '';
    }
    botaoReinicio.parentNode.removeChild(botaoReinicio);
    campoPalpite.disabled = false;
    envioPalpite.disabled = false;
    campoPalpite.value = '';
    campoPalpite.focus();
    resultado.style.backgroundColor = 'white';
}
