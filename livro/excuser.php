<?php
$conectar = mysqli_connect('localhost', 'root', '', 'livraria');

if (isset($_GET['id'])) {
    $codigo = $_GET['id'];
    $sql = "DELETE FROM livro WHERE codigo='$codigo'";
    $resultado = mysqli_query($conectar, $sql);

} else if (isset($_POST['codigo'])) {
    $codigo = $_POST['codigo'];
    $sql = "DELETE FROM livro WHERE codigo='$codigo'";
    $resultado = mysqli_query($conectar, $sql);
}
?>

<script>
    <?php
    echo "location.href='CadLivro.php'";
    ?>
</script>