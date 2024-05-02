<?php
$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = $_POST['senha'];

$conectar = mysqli_connect('localhost', 'root', '', 'livraria');
$sql = "UPDATE usuario SET nome='$nome', login='$login', senha='$senha' WHERE codigo='$codigo'";
$resultado = mysqli_query($conectar, $sql);
?>

<script>
    alert('Alterado com Sucesso!');
    <?php
    echo "location.href='CadUsuario.php'";
    ?>
</script>