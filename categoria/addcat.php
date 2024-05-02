<?php
$nome = $_POST['nome'];

$conectar = mysqli_connect('localhost', 'root', '', 'livraria');
$sql = "insert into categoria (nome) values ('$nome')";
$resultado = mysqli_query($conectar, $sql);
?>

<script>
    alert('Adicionado com Sucesso!');
    <?php
    echo "location.href='CadCategoria.php'";
    ?>
</script>