<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");
// Selecionar os dados
$consulta   =   "SELECT *
                FROM vw_tbprodutos
                ORDER BY rotulo_tipo ASC,
                        destaque_produto ASC,
                        descri_produto ASC
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
    <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
</head>
<body class="fundofixo">
<?php include "menu_adm.php"; ?>
<main class="container">
    <h1 class="breadcrumb alert-danger">Lista de Produtos</h1>
   
    <?php 
    $tipo_atual = "";
          while($row = $lista->fetch_assoc()){if ($row["rotulo_tipo"] != $tipo_atual)
               echo ('<hr class="quebra"><h3 class="breadcrumb alert-danger">'.$row['rotulo_tipo'].'</h3>');        
    ?>
    
<div class="col-sm-4 col-md-3"><!-- dimensionamento -->
    <div class="thumbnail">
        <a href="produto_detalhe.php?id_produto=<?php echo $row['id_produto']; ?>">
            <img src="../imagens/<?php echo $row['imagem_produto']; ?>" alt="" class="img-responsive img-rounded" style="height: 10em;">
        </a>
        <div class="caption text-right">
            <h4 class="text-danger text-left">
                <strong><?php echo $row['descri_produto']; ?></strong>
            </h4>
            <p class="text-warning">
                <strong><?php echo $row['rotulo_tipo']; ?></strong>
            </p>
            <p class="text-left">
                <?php echo mb_strimwidth($row['resumo_produto'],0,32,'...'); ?>
            </p>
            <p>
                <button class="btn btn-default disabled" role="button" style="cursor: default;">
                    <?php echo number_format($row['valor_produto'],2,',','.'); ?>
                </button>
                <a href="../produto_detalhe.php?id_produto=<?php echo $row['id_produto']; ?>" class="btn btn-info" role="button">
                    
                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                </a>
                <a href="produtos_atualiza.php?id_produto=<?php echo $row['id_produto']; ?>" class="btn btn-warning ">
                        
                        <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                    </a>
                    <button data-nome="<?php echo $row['descri_produto'] ?>" data-id="<?php echo $row['id_produto'] ?>" class="delete btn btn-danger">
                        
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
            </p>
        </div><!-- fecha caption -->
    </div><!-- fecha thumbnail -->
</div><!-- fecha dimensionamento -->


    
            <?php 
                
                $tipo_atual = $row["rotulo_tipo"];
                };
            ?>
            <?php // } while ($row =   $lista->fetch_assoc()); ?>
            <!-- Fecha a Estrutura de repetição -->
            

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