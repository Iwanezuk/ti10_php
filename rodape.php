<!-- html:5 -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Produtos</title>
    <meta charset="UTF-8">
    <!-- Link arquivos Bootstrap CSS -->
    <!-- CÓDIGO DESABILITADO PARA NÃO HAVER CONFLITOS
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/meu_estilo.css">
    -->
</head>
<body class="fundofixo">
<!-- Abre o painel de Rodapé -->
<div class="row panel-footer" style="background-color: rgba(255,255,255,0.8);">

<!-- Abre ÁREA DE LOCALIZAÇÃO -->
<div class="col-sm-6 col-md-4">
    <div class="panel-footer" style="background: none;">
        <img src="imagens/logochurrascopequeno.png" alt="">
        <br>
        <i>O melhor churrasco da região!</i>
        <address>
            <i>Rua Dom Joaquim, 495 - Centro - Itapetininga - SP - CEP 182000-000</i>
            <br>
            <span class="glyphicon glyphicon-phone-alt"></span>
            &nbsp;Fone: (15) 3511 1200
            <br>
            <span class="glyphicon glyphicon-envelope"></span>
            &nbsp;Email:
            <a href="mailto:contato@chuletaquente.com.br?subject=Contato&cc=seuemail@hotmail.com">
                contato@chuletaquente.com.br
            </a>
        </address>
        <div class="embed-responsive embed-responsive-16by9">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.3527067162086!2d-48.054867884475236!3d-23.591680368598958!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c5cc93b46246ed%3A0x6ec0870ce87bb6fd!2sSenac%20Itapetininga!5e0!3m2!1spt-BR!2sbr!4v1568163169642!5m2!1spt-BR!2sbr" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div><!-- fecha div embed-responsive -->
    </div><!-- Fecha panel-footer  -->
</div><!-- Fecha ÁREA DE LOCALIZAÇÃO -->


<!-- Abre ÁREA DE NAVEGAÇÃO -->
<div class="col-sm-6 col-md-4">
    <div class="panel-footer" style="background: none;">
        <h4>Links</h4>
        <!-- ul>li>a>span -->
        <ul class="nav nav-pills nav-stacked">
            <li>
                <a href="index.php#home" class="text-danger">
                    <span class="glyphicon glyphicon-home" aria-hidden="true">&nbsp;HOME</span>
                </a>
            </li>
            <li>
                <a href="index.php#destaques" class="text-danger">
                    <span class="glyphicon glyphicon-ok-sign" aria-hidden="true">&nbsp;DESTAQUES</span>
                </a>
            </li>
            <li>
                <a href="index.php#produtos" class="text-danger">
                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true">&nbsp;PRODUTOS</span>
                </a>
            </li>
            <li>
                <a href="index.php#contato" class="text-danger">
                    <span class="glyphicon glyphicon-envelope" aria-hidden="true">&nbsp;CONTATO</span>
                </a>
            </li>
            <li>
                <a href="admin/index.php" class="text-danger">
                    <span class="glyphicon glyphicon-user" aria-hidden="true">&nbsp;ADMINISTRAÇÃO</span>
                </a>
            </li>
        </ul>
    </div><!-- Fecha panel-footer  -->
</div><!-- Fecha ÁREA DE NAVEGAÇÃO -->

<!-- Abre ÁREA DE FORM CONTATO -->
<div class="col-sm-6 col-md-4">
    <div class="panel-footer" style="background: none;">
        <h4>Contato</h4>
        <form action="rodape_contato_envia.php" name="form_contato" id="form_contato" method="POST">
            <!-- input group nome -->
            <p>
                <span class="input-group">
                    <span class="input-group-addon" id="basic-addon1">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    </span>
                    <input type="text" name="nome_contato" id="nome_contato" placeholder="Digite seu nome" aria-describedby="basic-addon1" class="form-control" required>
                </span>
            </p>
            <!-- fecha input group nome -->

            <!-- utilizando o mesmo padrão do input nome contato -->
            <!-- CONSTRUA O INPUT GROUP EMAIL Use glyphicon-envelope -->
            <!-- Input group email -->
            <p>
                <span class="input-group">
                    <span class="input-group-addon" id="basic-addon2">
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                    </span>
                    <input type="email" name="email_contato" id="email_contato" placeholder="Digite seu email" aria-describedby="basic-addon2" class="form-control" required>
                </span>
            </p>
            <!-- Fecha Input group email -->

            <!-- CONSTRUA O TEXTAREA COMENTÁRIOS Use glyphicon-pencil -->
            <!-- textarea comentarios_contato -->
            <p>
                <span class="input-group">
                    <span class="input-group-addon" id="basic-addon3">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </span>
                    <textarea name="comentarios_contato" id="comentarios_contato" cols="30" rows="5" placeholder="Comentários, dúvidas e/ou sugestões." aria-describedby="basic-addon3" class="form-control" required></textarea>
                </span>
            </p>
            <!-- fecha textarea comentarios_contato -->

            <!-- CONSTRUA O BOTÃO ENVIAR Use glyphicon-send -->
            <!-- button enviar -->
            <p>
                <button class="btn btn-danger btn-block" aria-label="Enviar" role="button">
                    Enviar
                    <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                </button>
            </p>
            <!-- fecha button enviar -->
        </form>
    </div><!-- Fecha panel-footer  -->
</div><!-- Fecha ÁREA DE FORM CONTATO -->

<!-- Abre ÁREA DO DESNVOLVEDOR -->
<div class="col-sm-12">
    <div class="panel-footer" style="background: none;">
        <h6 class="text-danger text-center">
            Desenvolvido por Iwanezuk&trade; 2021.
            <br>
            <a href="http://www.iwanezuk.com.br" target="_blank">
                iwanezuk.com.br
            </a>
        </h6>
    </div><!-- Fecha panel-footer  -->
</div><!-- Fecha ÁREA DO DESENVOLVEDOR -->

</div><!-- Fecha o painel de Rodapé -->
    
<!-- Link arquivos Bootstrap js -->
<!-- CÓDIGO DESABILITADO PARA NÃO HAVER CONFLITOS
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
-->
</body>
</html>