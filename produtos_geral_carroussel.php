<!-- Salvar como: produtos_geral.php -->
<?php 
// Incluir arquivo para fazer a conexão
include("Connections/conn_produtos.php");

// Consulta para trazer os dados e se necessário filtrar
$tabela         = "vw_tbprodutos";
$campo_filtro   = "destaque_produto";
$filtro_select  = "Não";
$ordenar_por    = "descri_produto ASC";
$consulta   =   "SELECT *
                FROM ".$tabela."
                WHERE ".$campo_filtro."='".$filtro_select."'
                ORDER BY ".$ordenar_por."";
$lista      =   $conn_produtos->query($consulta);
$row        =   $lista->fetch_assoc();
$totalRows  =   ($lista)->num_rows;
?>
<!doctype html>
<html lang="pt-br">
<head>
<title>Área Administrativa</title>
<meta charset="utf-8">
<!-- Link arquivos Bootstrap css -->
<!-- CÓDIGO DESABILITADO PARA NÃO HAVER CONFLITOS 
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet"> -->


<!-- https://github.com/kenwheeler/slick -->
<!-- http://kenwheeler.github.io/slick/ -->
<link rel="stylesheet" type="text/css" href="./slick/slick.css">
  <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">
  <style type="text/css">
    html, body {
      margin: 0;
      padding: 0;
    }
    * {
      box-sizing: border-box;
    }
    .slider {
        width: 90%;
        margin: 20px auto;
    }
    .slick-slide {
      margin: 0px 20px;
    }
    .slick-slide:hover {
      opacity: .7;
    }  
    .slick-slide img {
      width: 100%;
    }
    .slick-prev:before,
    .slick-next:before {
      color: gray;
    }
    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: .2;
    }   
    .slick-active {
      opacity: 1;
    }
    .slick-current {
      opacity: 1;
    }
      .img-responsive:hover{
          width: 90%;
      } 

  </style>

<link href="css/meu_estilo.css" rel="stylesheet">

</head>
<body>
<h2 class="breadcrumb alert-danger">Vitrine</h2>
<section class="regular slider">
<?php do { ?>    
<div>
      <div class="row"><!-- manter as elementos na linha -->
<!-- Abre estrutura de repetição -->

<!-- Abre thumbnail/card -->
<!-- Dimensionamento -->
   <div class="thumbnail">
      <a href="produto_detalhe.php?id_produto=<?php echo $row['id_produto']; ?>">
          <img src="imagens/<?php echo $row['imagem_produto']; ?>" alt="" class="img-responsive img-rounded" style="height: 20em;">
      </a>
      <div class="caption text-right">
          <h3 class="text-danger">
              <strong><?php echo $row['descri_produto']; ?></strong>
          </h3>
          <p class="text-warning">
              <strong><?php echo $row['rotulo_tipo']; ?></strong>
          </p>
          <p class="text-left">
              <?php echo mb_strimwidth($row['resumo_produto'],0,35,'...');  ?>
          </p>
          <p>
              <button class="btn btn-default disabled" role="button">
                 <?php echo number_format($row['valor_produto'],2,',','.'); ?>                  
              </button>
              <a href="produto_detalhe.php?id_produto=<?php echo $row['id_produto']; ?>" class="btn btn-danger" role="button">
                  <span class="hidden-xs">Saiba mais...</span>
                  <span class="visible-xs glyphicon glyphicon-eye-open" aria-hidden="true"></span>
              </a>
          </p>
      </div> 
   </div>
<!-- fecha Dimensionamento -->
<!-- Fecha thumbnail/card -->

<!-- Fecha estrutura de repetição --> 
</div><!-- fecha row -->
    </div><?php } while ($row=$lista->fetch_assoc()); ?>
  </section>

  



<!-- Link arquivos Bootstrap js -->
<!-- CÓDIGO DESABILITADO PARA NÃO HAVER CONFLITOS        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>-->

</body>


</html>
<?php mysqli_free_result($lista); ?>