<?php
$connect = mysqli_connect('localhost', 'root', '', 'livraria');

$sql_livro = "SELECT codigo, titulo, valor FROM livro";
$livro = mysqli_query($connect, $sql_livro);
$quantidade = 1;
$totalqtd = 0;
$total_valor = 0;
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
            <tr class="box-tr">
                <td class="box-td">
                    <div class="grid">
                        <label>Cliente:<input /></label>
                        <label>Valor Total R$:<span id="total-valor">0</span></label>
                        <label>Data:<input type="date" /></label>
                    </div>
                    <div class="grid2">
                        <label>Hora:<input type="date" /></label>
                        <label>Endereço:<input type="" /></label>
                        <label>Valor desconto:<input /></label>
                    </div>
                </td>
            </tr>

        </table>
        <table class="tabela2">
            <thead class="box-tr-2">
                <th class="td-title">Código</th>
                <th class="td-title">Título</th>
                <th class="td-title">Quantidade</th>
                <th class="td-title">Preço</th>
                <th class="td-title"></th>
            </thead>

            <tbody>
                <?php
                while ($resultado = mysqli_fetch_array($livro)) {
                    $codigo = $resultado['codigo'];
                    $titulo = $resultado['titulo'];
                    $valor = $resultado['valor'];

                    echo '
                    <tr>
                      <td class="td-result">' . $codigo . '</td>
                      <td class="td-result">' . $titulo . '</td>
                      <td class="td-result quantidade" data-preco="' . $valor . '">1</td>
                      <td class="td-result">' . $valor . '</td>
                      <td class="td-result">
                      <button class="increment">+</button>
                      <button class="decrement">-</button></td>
                    </tr>
                    ';
                }
                ?>
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="4">Total Quantidade: <span id="total-quantidade">0</span></td>
                    <td>Total: R$<span id="total">0.00</span></td>
                </tr>
            </tfoot>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const updateTotal = () => {
                let totalQuantidade = 0;
                let totalValor = 0;
                document.querySelectorAll('.quantidade').forEach(td => {
                    const quantidade = parseInt(td.textContent);
                    const preco = parseFloat(td.getAttribute('data-preco'));
                    totalQuantidade += quantidade;
                    totalValor += quantidade * preco;
                });
                document.getElementById('total-quantidade').textContent = totalQuantidade;
                document.getElementById('total').textContent = totalValor.toFixed(2);
                document.getElementById('total-valor').textContent = totalValor.toFixed(2);
            };

            document.querySelectorAll('.increment').forEach(button => {
                button.addEventListener('click', (e) => {
                    let quantidadeTd = e.target.closest('tr').querySelector('.quantidade');
                    let quantidade = parseInt(quantidadeTd.textContent);
                    quantidade++;
                    quantidadeTd.textContent = quantidade;
                    updateTotal();
                });
            });

            document.querySelectorAll('.decrement').forEach(button => {
                button.addEventListener('click', (e) => {
                    let quantidadeTd = e.target.closest('tr').querySelector('.quantidade');
                    let quantidade = parseInt(quantidadeTd.textContent);
                    if (quantidade > 0) {
                        quantidade--;
                        quantidadeTd.textContent = quantidade;
                        updateTotal();
                    }
                });
            });

            // Initialize total
            updateTotal();
        });
    </script>
</body>

</html>