var radios = document.querySelectorAll(".manual-btn");
var cont = 1;

document.getElementById("radio1").checked = true;

setInterval(proximaImg, 5000);

function proximaImg() {
  cont++;

  if (cont > 3) {
    cont = 1;
  }

  document.getElementById("radio" + cont).checked = true;
}

function mostrarTela(elementoTela) {
  var btnLista = document.getElementById("btn-lista"); 
  var overlay = document.getElementById("overlay");

  overlay.style.display = "block";
  elementoTela.style.display = "flex";
  btnLista.style.paddingTop = "6px";
}

function fecharTela() {
  var overlay = document.getElementById("overlay");
  var telaCadastro = document.getElementById("tela-cadastro");
  var telaAlterar = document.getElementById("tela-alterar");
  var telaExcluir = document.getElementById("tela-excluir");
  var btnAlterar = document.getElementById("btn-alterar");
  var btnExcluir = document.getElementById("btn-excluir");
  var btnCadastrar = document.getElementById("btn-cadastrar");
  var btnLista = document.getElementById("btn-lista"); 

  overlay.style.display = "none";
  telaCadastro.style.display = "none";
  telaAlterar.style.display = "none";
  telaExcluir.style.display = "none";

  btnAlterar.style.paddingTop = "6px";
  btnExcluir.style.paddingTop = "6px";
  btnCadastrar.style.paddingTop = "6px";
  btnLista.style.paddingTop = "12px";
}

function mostrarTelaCadastro() {
  var telaCadastro = document.getElementById("tela-cadastro");
  var btncadastrar = document.getElementById("btn-cadastrar");
  
  btncadastrar.style.paddingTop = "12px";

  mostrarTela(telaCadastro);
}

function mostrarTelaAlterar() {
  var telaAlterar = document.getElementById("tela-alterar");
  var btnAlterar = document.getElementById("btn-alterar");


  btnAlterar.style.paddingTop = "12px";

  mostrarTela(telaAlterar);
}

function mostrarTelaExcluir() {
  var telaExcluir = document.getElementById("tela-excluir");
  var btnAlterar = document.getElementById("btn-alterar");
  var btnExcluir = document.getElementById("btn-excluir");


  btnExcluir.style.paddingTop = "12px";

  mostrarTela(telaExcluir);
}