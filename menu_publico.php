<?php
// Incluir arquivo para fazer a conexão
include("Connections/conn_produtos.php");

// Consulta para trazer os dados e se necessário filtrar
$tabela_tipos       =   "tbtipos";
$ordenar_por_tipos  =   "rotulo_tipo ASC";
$consulta_tipos     =   "SELECT *
                        FROM ".$tabela_tipos."
                        ORDER BY ".$ordenar_por_tipos."
                        ";
$lista_tipos      =   $conn_produtos->query($consulta_tipos);
$row_tipos        =   $lista_tipos->fetch_assoc();
$totalRows_tipos  =   ($lista_tipos)->num_rows;
?>
<!-- html:5 -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Menu público</title>
    <meta charset="UTF-8">
    <!-- Link arquivos Bootstrap CSS -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="css/meu_estilo.css">
</head>
<body>
<!-- Abre a barra de navegação -->
<nav class="navbar navbar-inverse">
<div class="container-fluid">
    <!-- Agrupamento MOBILE -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menuPublico" aria-expanded="false">
            <span class="sr-only">Toogle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="index.php" class="navbar-brand">
            <img src="imagens/logochurrascopequeno.png" alt="">
        </a>
    </div><!-- fecha nav-header -->
    <!-- fecha Agrupamento MOBILE -->
    <!-- Nav Direita -->
    <div class="collapse navbar-collapse" id="menuPublico">
        <ul class="nav navbar-nav navbar-right">
            <li class="active">
                <a href="index.php">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li><a href="index.php#destaques">DESTAQUES</a></li>
            <li><a href="index.php#produtos">PRODUTOS</a></li>
            <!-- Início DropDown -->
            <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    TIPOS
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <!-- Abre estrutura de repetição -->
                    <?php do { ?>
                    <li>
                        <a href="produtos_por_tipo.php?id_tipo=<?php echo $row_tipos['id_tipo']; ?>">
                            <?php echo $row_tipos['rotulo_tipo']; ?>
                        </a>
                    </li>
                    <?php } while ($row_tipos=$lista_tipos->fetch_assoc()); ?>
                    <!-- Fecha estrutura de repetição -->
                </ul>
            </li>
            <!-- Fim DropDown -->
            <li><a href="index.php#contato">CONTATO</a></li>
            <!-- Início form de busca -->
            <form action="produtos_busca.php" method="GET" name="form_busca" id="form_busca" class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <div class="input-group">
                        <input type="search" name="buscar" id="buscar" size="9" class="form-control" aria-label="search" placeholder="Busca produto" required>
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </div>
                    </div><!-- fecha input-group -->
                </div><!-- fecha form-group -->
            </form>

            <!-- Fim form de busca -->
            <li class="active">
                <a href="admin/index.php">
                    <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;ADMIN
                </a>
            </li>
        </ul>
    </div><!-- fecha navbar-collapse -->
    <!-- Fecha Nav Direita -->
</div><!-- fecha container-fluid -->

</nav>
<!-- Fecha a barra de navegação --> 

<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php mysqli_free_result($lista_tipos); ?>