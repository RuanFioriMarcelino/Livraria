<?php
$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$pais = $_POST['pais'];
$nacionalidade = $_POST['nacionalidade'];

$conectar = mysqli_connect('localhost', 'root', '', 'livraria');
$sql = "UPDATE autor SET nome='$nome', endereco='$endereco', cidade='$cidade', estado='$estado', pais='$pais', nacionalidade='$nacionalidade' WHERE codigo='$codigo'";
$resultado = mysqli_query($conectar, $sql);
?>

<script>
    alert('Alterado com Sucesso!');
    <?php
    echo "location.href='CadAutor.php'";
    ?>
</script>