<?php
$connect = mysqli_connect('localhost', 'root', '', 'livraria');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/vendas.css" />
    <script src="../script.js" defer></script>
    <title>Meu Carrinho</title>
</head>

<body>
    <nav>
        <a id="logo"><ion-icon name="bookmark-outline"></ion-icon><span>Leiame</span></a>
        <div class="ancoras">
            <br>
        </div>
    </nav>
    <div class="container">
        <table>
            <tr>
                <td>
                    <div class="grid">
                        <label>Cliente:<input /></label>
                        <label>Valor Total R$:<input /></label>
                        <label>Data:<input type="date" /></label>
                    </div>
                    <div class="grid2">
                        <label>Hora:<input type="date" /></label>
                        <label>Endereço:<input type="" /></label>
                        <label>Valor desconto:<input /></label>
                    </div>
                </td>
                <td>
                    <p>dsadas </p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>