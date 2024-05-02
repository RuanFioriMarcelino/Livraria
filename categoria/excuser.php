<?php
$codigo = $_POST['codigo'];

$conectar = mysqli_connect('localhost', 'root', '', 'livraria');
$sql = "DELETE FROM categoria WHERE codigo='$codigo'";
$resultado = mysqli_query($conectar, $sql);
?>

<script>
    alert('Deletado com Sucesso!');
    <?php
    echo "location.href='CadCategoria.php'";
    ?>
</script>