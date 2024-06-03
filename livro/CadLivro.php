<?php
$connect = mysqli_connect('localhost', 'root', '', 'livraria');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css" />
    <script src="../script.js" defer></script>
    <title>Livros</title>
</head>

<body>

    <nav>
        <a id="logo"><ion-icon name="bookmark-outline"></ion-icon><span>Leiame</span></a>
        <div class="ancoras">
            <a href="../usuario/CadUsuario.php">Usuário</a>
            <a href="../autor/CadAutor.php">Autor</a>
            <a href="../categoria/CadCategoria.php">Categoria</a>
            <a href="../classificacao/CadClassificacao.php">Classificação</a>
            <a href="#">Livro</a>
        </div>
    </nav>

    <!--Modal Cadastrar-->
    <div id="tela-cadastro" class="tela">
        <div>
            <h1>Adicionar um registro</h1>
            <div class="tela-content">
                <form action="addlivro.php" method="POST" enctype="multipart/form-data">

                    <input type="text" id="titulo" name="titulo" value="" required placeholder="Título"><br>
                    <input type="number" id="codcategoria" name="codcategoria" value="" required
                        placeholder="Código Da Categoria" placeholder="Endereço"><br>
                    <input type="number" id="codclassificacao" name="codclassificacao" value="" required
                        placeholder="Código da Classificacao"><br>
                    <input type="number" id="codautor" name="codautor" value="" required
                        placeholder="Código do Autor"><br>
                    <input type="text" id="ano" name="ano" value="" required placeholder="Ano"><br>
                    <input type="text" id="edicao" name="edicao" value="" required placeholder="Edição"><br>
                    <input type="text" id="editora" name="editora" value="" required placeholder="Editora"><br>
                    <input type="number" id="paginas" name="paginas" value="" required placeholder="Páginas"><br>
                    <input type="file" name="fotocapa" id="fotocapa" />
                    <input type="text" id="valor" name="valor" value="" required placeholder="Valor"><br>

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
                <form class="form-group well" action="altautor.php" method="POST">
                    <input id="codigo" type="text" name="codigo" value="" required placeholder="Código">
                    <input type="text" id="nome" name="nome" value="" required placeholder="Nome"><br>
                    <input type="text" id="endereco" name="endereco" value="" required placeholder="Endereço"><br>
                    <input type="text" id="cidade" name="cidade" value="" required placeholder="Cidade"><br>
                    <input type="text" id="estado" name="estado" value="" required placeholder="Estado"><br>
                    <input type="text" id="pais" name="pais" value="" required placeholder="País"><br>
                    <input type="text" id="nacionalidade" name="nacionalidade" value="" required
                        placeholder="Nacionalidade"><br>
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
        <button class="select-btn" onclick="mostrarListaUsuarios()" id="btn-lista">Lista de Livros</button>
        <button type="button" value="register" class="select-btn" id="btn-cadastrar"
            onclick="mostrarTelaCadastro()">Cadastrar</button>
        <button type="button" value="alter" class="select-btn" id="btn-alterar"
            onclick="mostrarTelaAlterar()">Alterar</button>
        <button type="button" value="delete" class="select-btn" id="btn-excluir"
            onclick="mostrarTelaExcluir()">Excluir</button>

        <form action="CadLivro.php" method="POST" class="form-list">
            <label class="search lista">
                <input type="text" id="nome" name="nome" placeholder="Nome..." />
                <button type="submit" name="pesquisar" value="pesquisar">
                    <ion-icon name="search-outline" id="icon-lupa"></ion-icon>
                </button>
            </label>

        </form>
        <table class="table-nav">
            <tr>
                <td>Código</td>
                <td>Título</td>
                <td>Cód. Categoria</td>
                <td>Cód. Classificação</td>
                <td>Cód. Autor</td>
                <td>Ano</td>
                <td>Edição</td>
                <td>Editora</td>
                <td>Páginas</td>
                <td>Valor</td>
                <td>Categoria</td>
            </tr>
            <tr>
                <?php
                if ((isset($_POST['pesquisar'])) or (isset($_POST['register']))) {

                    $consulta = "SELECT codigo, titulo, codcategoria, codclassificacao, ano, edicao, codautor, editora, paginas,valor FROM livro";

                    if ($_POST['nome'] != '') {
                        $consulta = $consulta . " WHERE titulo like '%" . $_POST['nome'] . "%'";

                    }

                    $result = mysqli_query($connect, $consulta);


                    while ($data = mysqli_fetch_array($result)) {
                        $strdados = $data['codigo'] . "*" . $data['titulo'] . "*" . $data['codcategoria'] . "*" . $data['codclassificacao'] . "*" . $data['ano'] . "*" . $data['edicao'] . $data['codautor'] . $data['editora'] . $data['paginas'] . $data['valor'];
                        ?>
                    <tr>
                        <td class="list-results"><?php echo $data['codigo'] ?></td>
                        <td class="list-results"><?php echo $data['titulo'] ?></td>
                        <td class="list-results"><?php echo $data['codcategoria'] ?></td>
                        <td class="list-results"><?php echo $data['codclassificacao'] ?></td>
                        <td class="list-results"><?php echo $data['ano'] ?></td>
                        <td class="list-results"><?php echo $data['edicao'] ?></td>
                        <td class="list-results"><?php echo $data['codautor'] ?></td>
                        <td class="list-results"><?php echo $data['editora'] ?></td>
                        <td class="list-results"><?php echo $data['paginas'] ?></td>
                        <td class="list-results"><?php echo $data['valor'] ?></td>
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