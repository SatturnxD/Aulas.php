<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Despesas - Pesquisa</title>
    <link rel="stylesheet" href="estilos_menu.css">
</head>
<body>
    <?php
        require "menu.php";
    echo "<h3>Listagem das Contas</h3>";
    require "conexao.php";
    $sql="SELECT * FROM contas ORDER BY Lancamento";
    $resultado=mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    echo "<table border='1' width='1000' align='center'>";

        echo "<tr>";
            echo "<th width='100' align='right'>Lançamento</th>";
            echo "<th width='300' align='left'>Código Cliente</th>";
            echo "<th width='100' align='left'>Data</th>";
            echo "<th width='100' align='left'>Valor</th>";
            echo "<th width='100' align='left'>Histórico</th>";
            echo "<th width='50' align='left'>Editar</th>";
        echo "</tr>";

        while($linha=mysqli_fetch_array($resultado)) {
            $lancamento         =   $linha["lancamento"];
            $codigo_cliente     =   $linha["codigo_cliente"];
            $data               =   $linha["data"];
            $valor              =   $linha["valor"];
            $historico          =   $linha["historico"];

            // Exibindo os dados
            echo "<tr>";
            echo "<td width='100' align='center'>$lancamento</td>";
            echo "<td width='300' align='center'>$codigo_cliente</td>";
            echo "<td width='100' align='center'>$data</td>";
            echo "<td width='250' align='center'>$valor</td>";
            echo "<td width='250' align='center'>$historico</td>";
            echo "<td width='50'><a href='contas_editar.php?codigo_cliente=$codigo_cliente'>Editar</td>";
            echo "<tr>";
        }
    echo "</table>";
    ?>
</body>
</html>