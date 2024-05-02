<?php
$codigo = $_POST['codigo'];

$conectar = mysqli_connect('localhost', 'root', '', 'livraria');
$sql = "DELETE FROM autor WHERE codigo='$codigo'";
$resultado = mysqli_query($conectar, $sql);
?>

<script>
    alert('Deletado com Sucesso!');
    <?php
    echo "location.href='CadAutor.php'";
    ?>
</script>