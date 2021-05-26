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
    <!-- Link arquivos Bootstrap CSS -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Link para CSS específico -->
    
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
                <td>ALTERAR|
                    <button data-nome="<?php echo $row['rotulo_tipo'] ?>" data-id="<?php echo $row['id_tipo'] ?>" class="delete btn btn-danger btn-xs">
                        <span class="hidden-xs">EXCLUIR</span>
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </td>
            </tr>
            <?php } while ($row = $lista->fetch_assoc()); ?>
            <!-- Fecha a estrutura de repetição -->
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
        $('a.delete-yes').attr('href','tipos_exclui.php?id_tipo='+id);
        // mandar dinamicamente o id do link no botão confirmar
        $('#myModal').modal('show'); // Modal abre
    });
</script>

</body>
</html>
<?php mysqli_free_result($lista); ?>