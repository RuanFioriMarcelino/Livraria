<?php
$connect = mysqli_connect('localhost', 'root', '', 'livraria');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css" />
    <script src="../script.js" defer></script>
    <title>Usuários</title>
</head>

<body>

    <nav>
        <a id="logo"><ion-icon name="bookmark-outline"></ion-icon><span>Leiame</span></a>
    </nav>

    <!--Modal Cadastrar-->
    <div id="tela-cadastro" class="tela">
        <div>
            <h1>Adicionar um registro</h1>
            <div class="tela-content">
                <form class="form-group well" action="adduser.php" method="POST">

                    <input type="text" id="nome" name="nome" class="span3" value="" required placeholder="Nome"><br>
                    <input type="text" id="login" name="login" class="span3" value="" required placeholder="Login"><br>
                    <input type="text" id="senha" name="senha" class="span3" value="" required
                        placeholder="Senha"><br><br>
                    <button type="submit" class="btn-telas" name="cadastrar">Cadastrar</button>
                    <button type="button" class="btn-telas" id="btn-fechar" onclick="fecharTela()">Fechar</button>
                </form>
            </div>
        </div>
    </div>


    <!--Modal Alterar-->
    <div id="tela-alterar" class="tela">
        <div>
            <h1>Alterar de Registro</h1>
            <div class="tela-content">
                <form class="form-group well" action="altuser.php" method="POST">
                    <input id="codigo" type="text" name="codigo" value="" required placeholder="Código">
                    <input id="nome" type="text" name="nome" class="span3" required placeholder="Nome"><br>
                    <input id="login" type="text" name="login" class="span3" required placeholder="Login">
                    <input id="senha" type="text" name="senha" class="span3" required placeholder="Senha"><br><br>
                    <button type="submit" class="btn-telas" name="alterar">Alterar</button>
                    <button type="button" class="btn-telas" id="btn-fechar" onclick="fecharTela()">Fechar</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!--Modal Excluir-->
    <div id="tela-excluir" class="tela">
        <div>
            <h1>Excluir um Registro</h1>
            <div class="tela-content">
                <form action="excuser.php" method="POST">
                    <input id="codigo" type="text" name="codigo" value="" required placeholder="Código"><br><br>

                    <button type="submit" class="btn-telas" name="excluir">Excluir</button>
                    <button type="button" class="btn-telas" id="btn-fechar" onclick="fecharTela()">Fechar</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="lista-content">
        <button class="select-btn" onclick="mostrarListaUsuarios()" id="btn-lista">Lista de Usuários</button>
        <button type="button" value="register" class="select-btn" id="btn-cadastrar"
            onclick="mostrarTelaCadastro()">Cadastrar</button>
        <button type="button" value="alter" class="select-btn" id="btn-alterar"
            onclick="mostrarTelaAlterar()">Alterar</button>
        <button type="button" value="delete" class="select-btn" id="btn-excluir"
            onclick="mostrarTelaExcluir()">Excluir</button>

        <form action="CadUsuario.php" method="POST" class="form-list">
            <label class="search lista">
                <input type="text" id="nome" name="nome" placeholder="Nome..." />
                <button type="submit" name="pesquisar" value="pesquisar">
                    <ion-icon name="search-outline" id="icon-lupa"></ion-icon>
                </button>
            </label>

        </form>
        <table>
            <tr>
                <td>Codigo</td>
                <td>Nome</td>
                <td>Login</td>
                <td>Senha</td>
                <td>Operação</td>
            </tr>
            <tr>
                <?php
                if ((isset($_POST['pesquisar'])) or (isset($_POST['register']))) {

                    $consulta = "SELECT codigo, nome, login, senha FROM usuario";

                    if ($_POST['nome'] != '') {
                        $consulta = $consulta . " WHERE nome like '%" . $_POST['nome'] . "%'";

                    }

                    $result = mysqli_query($connect, $consulta);


                    while ($data = mysqli_fetch_array($result)) {
                        $strdados = $data['codigo'] . "*" . $data['nome'] . "*" . $data['login'] . "*" . $data['senha'];
                        ?>
                    <tr>
                        <td class="list-results"><?php echo $data['codigo'] ?></td>
                        <td class="list-results"><?php echo $data['nome'] ?></td>
                        <td class="list-results"><?php echo $data['login'] ?></td>
                        <td class="list-results"><?php echo $data['senha'] ?></td>
                        <td>
                            <?php
                            echo "<a href='excuser.php?id=" . $data['codigo'] . "'><button class='button-list' type='button' name='excluir' id='excluir'><ion-icon name='trash-outline'></ion-icon></button></a>";
                            ?>

                            <a href="" onclick="obterDadosModal('<?php echo $strdados ?>')">
                                <button type='button' id='alterar' name='alterar' class='button-list'>Alterar</button>
                            </a>
                        </td>
                    </tr>
                    <?php
                    }
                    mysqli_close($connect);
                }
                ?>
            </tr>
        </table>
    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
<div id="overlay" class="overlay"></div>

</html>