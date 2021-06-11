<!-- html:5 -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Verificação do Contato</title>
    <meta charset="UTF-8">
    <!-- Após 15 segundos a página sera redirecionada para index.php -->
    <meta http-equiv="refresh" content="15;URL=index.php">
    <!-- Link arquivos Bootstrap CSS -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="css/meu_estilo.css">
</head>
<body class="fundofixo">
<?php include('menu_publico.php'); ?>
<main class="container">
<section>
    <div class="jumbotron alert-danger">
        <h1>Agradecemos seu contato!</h1>
        <?php 
            $destino        =   "contato@chuletaquente.com.br";
            $nome_contato   =   $_POST['nome_contato'];
            $email_contato  =   $_POST['email_contato'];
            $msg_contato    =   "mensagem de: ".$_POST['nome_contato']."\n".$_POST['comentarios_contato'];
            $mailsend   =   mail("$destino","Formulário de comentários","$msg_contato","De: $email_contato");

            echo "<p class='text-center'>Obrigado por enviar seus comentários, <b>$nome_contato</b>!</p>";
            echo "<p class='text-center'>Mensagem enviada com sucesso!</p>";
        ?>
        <h5 class="text-center">
            Caso não visualize a mensagem de agradecimento, entre em contato através do email
            <br>
            <b><i><?php echo $destino; ?></i></b>
        </h5>
    </div><!-- fecha jumbotron -->
</section>

<!-- Rodapé -->
<footer class="panel-footer" style="background: none;">
    <?php include('rodape.php'); ?>
</footer>
</main>  
    
<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>