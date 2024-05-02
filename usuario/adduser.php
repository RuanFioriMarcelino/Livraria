<?php
$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = $_POST['senha'];

$conectar = mysqli_connect('localhost', 'root', '', 'livraria');
$sql = "insert into usuario (nome,login,senha) values ('$nome','$login','$senha')";
$resultado = mysqli_query($conectar, $sql);
?>

<script>
    alert('Adicionado com Sucesso!');
    <?php
    echo "location.href='CadUsuario.php'";
    ?>
</script>