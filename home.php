<?php
$connect = mysqli_connect("localhost", "root", "", "livraria");

$sql_livro = "SELECT livro.titulo, livro.fotocapa, livro.valor, livro.valor, categoria.nome, classificacao.nome, autor.nome FROM livro, categoria, classificacao, autor
WHERE livro.codautor = autor.codigo
AND livro.codclassificacao = classificacao.codigo
AND livro.codcategoria = categoria.codigo";
$livro = mysqli_query($connect, $sql_livro);


if (isset($_POST['p'])) {
  $autor = (empty($_POST['autor'])) ? 'null' : $_POST['autor'];
  $categoria = (empty($_POST['categoria'])) ? 'null' : $_POST['categoria'];
  $classificacao = (empty($_POST['classificacao'])) ? 'null' : $_POST['classificacao'];
  $valor = (empty($_POST['valor'])) ? 'null' : $_POST['valor'];
  $titulo = (empty($_POST['buscaLivro'])) ? 'null' : $_POST['buscaLivro'];



  if ($autor <> 'null') {
    $autorsql = 'and autor.codigo = ' . $autor . '';
  } else {
    $autorsql = '';
  }

  if ($categoria <> 'null') {
    $categoriasql = 'and categoria.codigo = ' . $categoria . '';
  } else {
    $categoriasql = '';
  }

  if ($classificacao <> 'null') {
    $classificacaosql = 'and classificacao.codigo = ' . $classificacao . '';
  } else {
    $classificacaosql = '';
  }

  if ($valor <> 'null') {
    $valorsql = 'and livro.valor ' . $valor . '';
  } else {
    $valorsql = '';
  }

  if ($titulo <> 'null') {
    $titulosql = " and titulo like '%" . $titulo . "%'";
  } else {
    $titulosql = '';
  }


  $sql_livro = "SELECT livro.titulo, livro.fotocapa, livro.valor, categoria.nome, classificacao.nome, autor.nome 
    FROM livro, categoria, classificacao, autor
    WHERE livro.codautor = autor.codigo
    AND livro.codclassificacao = classificacao.codigo
    AND livro.codcategoria = categoria.codigo
    $autorsql
    $classificacaosql
    $categoriasql
    $valorsql
    $titulosql";
  $livro = mysqli_query($connect, $sql_livro);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style2.css" />
  <script src="script.js" defer></script>
  <title>Leiame</title>
</head>

<body>
  <nav>
    <a id="logo"><ion-icon name="bookmark-outline"></ion-icon><span>Leiame</span></a>
    <form method="POST" action="">
      <label class="search">
        <input type="text" name="buscaLivro" id="buscaLivro" placeholder="O que você está procurando?" />
        <button type="submit" name="p" value="pesquisar">
          <ion-icon name="search-outline" id="icon-lupa"></ion-icon>
        </button>
      </label>
    </form>



    <div id="selecoes">
      <a class="selecao"><ion-icon name="heart-outline"></ion-icon>
        <p>Favoritos</p>
      </a>

    </div>
  </nav>

  <section class="slider">
    <div class="slider-content">
      <input type="radio" name="btn-radio" id="radio1" />
      <input type="radio" name="btn-radio" id="radio2" />
      <input type="radio" name="btn-radio" id="radio3" />

      <div class="slide-box primeiro">
        <img
          src="https://lojasaraivanew.vtexassets.com/assets/vtex.file-manager-graphql/images/c4c180fc-d8c6-4e1f-8cb9-c5d2358abc25___2673ef185d3c965ee1a2bc39dd827426.png"
          alt="slide1" />
      </div>
      <div class="slide-box">
        <img
          src="https://lojasaraivanew.vtexassets.com/assets/vtex.file-manager-graphql/images/62f79e97-17bb-4e69-9608-6bc580f9d1b5___f15e558a8490f37be090baadcfb49f93.png"
          alt="slide2" />
      </div>
      <div class="slide-box">
        <img
          src="https://lojasaraivanew.vtexassets.com/assets/vtex.file-manager-graphql/images/d2951a33-6fe5-42ff-8215-6bd317f7c508___59c9ed7fd0c623c0d914eb3685c1a30b.png"
          alt="slide3" />
      </div>
      <div class="nav-auto">
        <div class="auto-btn1"></div>
        <div class="auto-btn2"></div>
        <div class="auto-btn3"></div>
      </div>
      <div class="nav-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
      </div>
    </div>
  </section>

  <div class="body-content">
    <div class="left-content">
      <form method="POST" action="">

        <!-- Filtro Autor -->
        <label for="">Autor </label>
        <select name="autor" class="">
          <option value="" selected="selected">Selecione...</option>
          <?php
          $query = mysqli_query($connect, "SELECT codigo, nome FROM autor");
          while ($autor = mysqli_fetch_array($query)) { ?>
            <option value="<?php echo $autor['codigo'] ?>">
              <?php echo $autor['nome'] ?>
            </option>
          <?php }
          ?>
        </select>

        <!-- Filtro Categoria -->
        <label for="">Categoria</label>
        <select name="categoria" class="">
          <option value="" selected="selected">Selecione...</option>
          <?php
          $query2 = mysqli_query($connect, "SELECT codigo, nome FROM categoria");
          while ($categoria = mysqli_fetch_array($query2)) { ?>
            <option value="<?php echo $categoria['codigo'] ?>">
              <?php echo $categoria['nome'] ?>
            </option>
          <?php }
          ?>
        </select>

        <!-- Filtro Classificacao -->
        <label for="">Classificação</label>
        <select name="classificacao" class="">
          <option value="" selected="selected">Selecione...</option>
          <?php
          $query3 = mysqli_query($connect, "SELECT codigo, nome FROM classificacao");
          while ($classificacao = mysqli_fetch_array($query3)) { ?>
            <option value="<?php echo $classificacao['codigo'] ?>">
              <?php echo $classificacao['nome'] ?>
            </option>
          <?php }
          ?>
        </select>

        <!-- Filtro Classificacao -->
        <label for="">Valor</label>
        <select name="valor" class="">
          <option value="" selected="selected">Selecione...</option>
          <option value=">= 0 and livro.valor <= 50">Até 50</option>
          <option value=">= 50 and livro.valor <= 100">Entre 50 e 100</option>
          <option value=">= 100 and livro.valor <= 200">Entre 100 e 200</option>
          <option value=">= 200 and livro.valor <= 300">Entre 200 e 300</option>
        </select>

        <input type="submit" name="p" value="Filtrar">
      </form>
    </div>

    <div class="right-content">
      <?php
      while ($resultado = mysqli_fetch_array($livro)) {
        echo ' <section class="produto">
                    <div class="content-produto">
                      <div class="content-image">
                        <img src="img/' . $resultado['fotocapa'] . '" alt="" class="imagem-produto" width="180px" height="180x" />
                        <ion-icon name="heart-outline"></ion-icon>
                      </div>
                      <h3 class="textH">' . utf8_encode($resultado[0]) . '</h3>
                      <button>Comprar</button>
                    </div>
                </section>';
      }
      ?>
    </div>
  </div>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>