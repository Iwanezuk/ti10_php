<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");
// Selecionar o banco de dados
mysqli_select_db($conn_produtos,$database_conn);
// Selecionar os dados
$consulta   =   "SELECT *
                FROM tbtipos
                ORDER BY rotulo_tipo ASC";
// Fazer a lista completa dos dados
$lista      =   $conn_produtos->query($consulta);
// Separar os dados em linhas(row)
$row        =   $lista->fetch_assoc();
// Contar o total de linhas
$totalRows  =   ($lista)->num_rows;
?>
<!-- html:5 -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Tipos - Lista</title>
    <meta charset="UTF-8">
    <!-- Depois vamos inserir aqui o Bootstrap -->
</head>
<body>
<!-- main>h1 -->
<main>
    <h1>Lista de Tipos</h1>
    <table border="1">
        <!-- thead>tr>th*4 -->
        <thead><!-- cabeçalho da tabela -->
            <tr>
                <th>ID</th><!-- cabeça da coluna -->
                <th>SIGLA</th>
                <th>RÓTULO</th>
                <th>
                    <a href="tipos_insere.php" target="_self">
                        ADICIONAR
                    </a>
                </th>
            </tr>
        </thead>
        <!-- tbody>tr>td*4 -->
        <tbody><!-- corpo da tabela -->
            <!-- Abre a estrutura de repetição -->
            <?php do { ?>
            <tr><!-- linha da tabela -->
                <td><?php echo $row['id_tipo']; ?></td>
                <td><?php echo $row['sigla_tipo']; ?></td>
                <td><?php echo $row['rotulo_tipo']; ?></td>
                <td>ALTERAR|EXCLUIR</td>
            </tr>
            <?php } while ($row = $lista->fetch_assoc()); ?>
            <!-- Fecha a estrutura de repetição -->
        </tbody>
    </table>
</main>
</body>
</html>
<?php mysqli_free_result($lista); ?>