<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");
// Selecionar os dados
$consulta   =   "SELECT *
                FROM tbprodutos
                ORDER BY descri_produto ASC
                ";
// Fazer a lista completa dos dados
$lista  = $conn_produtos->query($consulta);
// Separar os dados em linhas(row)
$row    = $lista->fetch_assoc();
// Contar o total de linhas
$totalRows  = ($lista)->num_rows;
?>
<!doctype html>
<!-- html>head>title -->
<html lang="pt-br">
<head>
    <title>Produtos - Lista</title>
    <meta charset="utf-8">
    <!-- Depois vamos inserir aqui o Bootstrap -->
</head>
<body>
<main>
    <h1>Lista de Produtos</h1>
    <table border="1">
        <!-- thead>tr>th*8 -->
        <thead><!-- cabeçalho da tabela -->
            <tr>
                <th>ID</th><!-- cabeça da coluna -->
                <th>TIPO</th>
                <th>DESTAQUE</th>
                <th>DESCRIÇÃO</th>
                <th>RESUMO</th>
                <th>VALOR</th>
                <th>IMAGEM</th>
                <th>
                    <a href="produtos_insere.php" target="_self">
                        ADICIONAR
                    </a>
                </th>
            </tr>
        </thead>
        <!-- tbody>tr>td*8 -->
        <tbody><!-- corpo da tabela -->
            <!-- Abre a Estrutura de repetição -->
            <?php do { ?>
            <tr><!-- linha da tabela -->
                <td><?php echo $row['id_produto']; ?></td>
                <td><?php echo $row['id_tipo_produto']; ?></td>
                <td><?php echo $row['destaque_produto']; ?></td>
                <td><?php echo $row['descri_produto']; ?></td>
                <td><?php echo $row['resumo_produto']; ?></td>
                <td><?php echo $row['valor_produto']; ?></td>
                <!-- 
                    Para exibir a imagem insira em 'src' o
                    diretório qu está armazenada e a
                    variável com seu nome 
                -->
                <td>
                    <img src="../imagens/<?php echo $row['imagem_produto']; ?>" alt="<?php echo $row['descri_produto']; ?>" width="100px">
                </td>
                <td>ALTERAR|EXCLUIR</td>
            </tr>
            <?php } while ($row =   $lista->fetch_assoc()); ?>
            <!-- Fecha a Estrutura de repetição -->
        </tbody>
    </table>
</main>  
</body>
</html>
<?php mysqli_free_result($lista); ?>