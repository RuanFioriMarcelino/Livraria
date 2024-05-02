<?php
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$pais = $_POST['pais'];
$nacionalidade = $_POST['nacionalidade'];

$conectar = mysqli_connect('localhost', 'root', '', 'livraria');
$sql = "insert into autor (nome,endereco,cidade,estado,pais,nacionalidade) values ('$nome','$endereco','$cidade','$estado','$pais','$nacionalidade')";
$resultado = mysqli_query($conectar, $sql);
?>

<script>
    alert('Adicionado com Sucesso!');
    <?php
    echo "location.href='CadAutor.php'";
    ?>
</script>