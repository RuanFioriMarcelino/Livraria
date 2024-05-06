<?php
$titulo = $_POST['titulo'];
$codcategoria = $_POST['codcategoria'];
$codclassificacao = $_POST['codclassificacao'];
$ano = $_POST['ano'];
$edicao = $_POST['edicao'];
$codautor = $_POST['codautor'];
$editora = $_POST['editora'];
$paginas = $_POST['paginas'];
$fotocapa = $_POST['fotocapa'];
$valor = $_FILES['valor'];

$diretorio = "../img/";

$extensao = strtolower(substr($_FILES['foto']['name'], -4));
$novo_nome = md5(time()) . $extensao;
move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio . $novo_nome);

$conectar = mysqli_connect('localhost', 'root', '', 'livraria');
$sql = "insert into livro (titulo,codcategoria,codclassificacao,ano,edicao,codautor,editora,paginas,fotocapa,valor) values ('$titulo','$codcategoria','$codclassificacao','$ano','$edicao','$codautor','$editora','$paginas','$novo_nome','$valor')";
$resultado = mysqli_query($conectar, $sql);

if ($resultado === TRUE) {
    echo "Cadastro realizado com sucesso";
} else {
    echo "Erro ao cadastrar.";
}

?>

<script>
    alert('Adicionado com Sucesso!');
    <?php
    echo "location.href='CadLivro.php'";
    ?>
</script>