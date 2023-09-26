<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Despesas - Editar</title>
    <link rel="stylesheet" href="estilos_menu.css">
</head>

<body>
    <?php
    require "menu.php";
    echo "<h3>Editar Cadastro de Clientes</h3>";
    require "conexao.php";

    $codigo_cliente = $_REQUEST["codigo_cliente"]; // Recupera o código selecionado na pesquisa de clientes
    $sql="SELECT * FROM contas WHERE codigo_cliente='$codigo_cliente'";
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    $linha = mysqli_fetch_array($resultado);

    $data               =   $linha["data"];
    $valor              =   $linha["valor"];
    $historico          =   $linha["historico"];

    echo "<form name='cadastro' method='post' action=''>";
        echo "<table align='center'>";
            
            echo "<tr>";
                echo "<td><label for='data'>Data:</label>";
                echo "<td><input type='date' name='data' value='$data' size='30' maxlength='30' required>";
            echo "</tr>";
            echo "<tr>";
                echo "<td><label for='valor'>Valor:</label>";
                echo "<td><input type='number' name='valor' value='$valor' size='14' maxlength='14' required>";
            echo "</tr>";
            echo "<tr>";
                echo "<td><label for='historico'>Histórico:</label>";
                echo "<td><input type='text' name='historico' value='$historico' size='30' maxlength='30' required>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan='2' align='center'><input type='submit' name='salvar' value='Salvar'></td>";
            echo "</tr>";
        echo "<table>";
    echo "</form>";
    if(isset($_POST["salvar"]))
    {
        $data           =   $_POST["data"];
        $valor          =   $_POST["valor"];
        $historico      =   $_POST["historico"];

        require "conexao.php";

        $sql="UPDATE contas SET  data='$data', valor='$valor', historico='$historico'  WHERE codigo_cliente='$codigo_cliente'";
        mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        echo "<script type =\"text/javascript\">alert('Conta editada com sucesso!');</script>";
            echo "<p align='center'><a href='home.php'>Voltar</a></p>";
    }
    ?>
</body>

</html>