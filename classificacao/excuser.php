<?php
$codigo = $_POST['codigo'];

$conectar = mysqli_connect('localhost', 'root', '', 'livraria');
$sql = "DELETE FROM classificacao WHERE codigo='$codigo'";
$resultado = mysqli_query($conectar, $sql);
?>

<script>
    alert('Deletado com Sucesso!');
    <?php
    echo "location.href='CadClassificacao.php'";
    ?>
</script>