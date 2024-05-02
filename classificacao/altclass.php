<?php
$codigo = $_POST['codigo'];
$nome = $_POST['nome'];


$conectar = mysqli_connect('localhost', 'root', '', 'livraria');
$sql = "UPDATE categoria SET nome='$nome' WHERE codigo='$codigo'";
$resultado = mysqli_query($conectar, $sql);
?>

<script>
    alert('Alterado com Sucesso!');
    <?php
    echo "location.href='CadCategoria.php'";
    ?>
</script>