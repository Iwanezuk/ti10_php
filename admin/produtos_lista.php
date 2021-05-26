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
    <!-- Link arquivos Bootstrap CSS -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Link para CSS específico -->

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
                <td>ALTERAR|
                    <button data-nome="<?php echo $row['descri_produto'] ?>" data-id="<?php echo $row['id_produto'] ?>" class="delete btn btn-danger btn-xs">
                        <span class="hidden-xs">EXCLUIR</span>
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                    
                </td>
            </tr>
            <?php } while ($row =   $lista->fetch_assoc()); ?>
            <!-- Fecha a Estrutura de repetição -->
        </tbody>
    </table>
</main>  
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title text-danger">ATENÇÃO!</h4>
            </div><!-- fecha modal-header -->
            <div class="modal-body">
                Deseja mesmo EXCLUIR o item?
                <h4><span class="nome text-danger"></span></h4>
            </div><!-- fecha modal-body -->
            <div class="modal-footer">
                <a href="#" type="button" class="btn btn-danger delete-yes">
                    Confirmar
                </a>
                <button class="btn btn-success" data-dismiss="modal">
                    Cancelar
                </button>
            </div><!-- fecha modal-footer -->
        </div><!-- fecha modal-content -->
    </div><!-- Fecha modal-dialog -->
</div><!-- Fecha Modal -->


<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<!-- Script para o Modal -->
<script type="text/javascript">
    $('.delete').on('click',function(){
        var nome    =   $(this).data('nome');
        // buscar o valor do atributo data-nome
        var id      =   $(this).data('id');
        // buscar o valor do atributo data-id
        $('span.nome').text(nome);
        // Inserir o nome do item na pergunta de confirmação
        $('a.delete-yes').attr('href','produtos_exclui.php?id_produto='+id);
        // mandar dinamicamente o id do link no botão confirmar
        $('#myModal').modal('show'); // Modal abre
    });
</script>
</body>
</html>
<?php mysqli_free_result($lista); ?>