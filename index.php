<!-- html:5 -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Produtos</title>
    <meta charset="UTF-8">
    <!-- Link arquivos Bootstrap CSS -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="css/meu_estilo.css">

    <link rel="stylesheet" type="text/css" href="./slick/slick.css">
  <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">


</head>
<body class="fundofixo">
<!-- ÁREA DO MENU -->
<?php include('menu_publico.php'); ?>
<a name="home">&nbsp;</a>
<main class="container">

    <!-- ÁREA DO CARROUSSEL -->
    <?php include('carroussel.php'); ?>

    <!-- ÁREA DE DESTAQUES -->
    <a name="destaques">&nbsp;</a>
    <hr>
    <?php include('produtos_destaque.php'); ?>

    <!-- ÁREA DE PRODUTOS EM GERAL -->
    <a name="produtos">&nbsp;</a>
    <hr>
    <?php //include('produtos_geral.php'); ?>

        <!-- ÁREA DE PRODUTOS EM GERAL -->
        <?php include('produtos_geral_carroussel.php'); ?>

    <!-- Rodapé -->
    <footer class="panel-footer" style="background: none;">
        <?php include('rodape.php'); ?>
        <a name="contato">&nbsp;</a>
    </footer>
</main> 
    
<!-- Link arquivos Bootstrap js 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>-->

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).on('ready', function() {
      $(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
    });
</script>

</body>
</html>