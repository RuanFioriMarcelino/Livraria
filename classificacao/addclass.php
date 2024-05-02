<?php
$nome = $_POST['nome'];

$conectar = mysqli_connect('localhost', 'root', '', 'livraria');
$sql = "insert into classificacao (nome) values ('$nome')";
$resultado = mysqli_query($conectar, $sql);
?>

<script>
    alert('Adicionado com Sucesso!');
    <?php
    echo "location.href='CadClassificacao.php'";
    ?>
</script>