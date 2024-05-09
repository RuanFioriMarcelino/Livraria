<?php


$conectar = mysqli_connect('localhost', 'root', '', 'livraria');



if(isset($_GET['id'])) {
    $codigo = $_GET['id'];
    $sql = "DELETE FROM usuario WHERE codigo='$codigo'";
    $resultado = mysqli_query($conectar, $sql);
    
}else if (isset($_POST['codigo'])) {
    $codigo = $_POST['codigo'];
    $sql = "DELETE FROM usuario WHERE codigo='$codigo'";
    $resultado = mysqli_query($conectar, $sql);
}

echo "<script>location.href='CadUsuario.php';</script>";
?>
