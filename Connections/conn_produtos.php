<?php
// Definindo as variáveis para conexão bd
$hostname_conn  =   "localhost";
$database_conn  =   "iwane047_ti10";
$username_conn  =   "iwane047_ti10";
$password_conn  =   "senacti10";
$charset_conn   =   "utf8";

// Definindo os parâmetros da conexão
$conn_produtos  =   new mysqli($hostname_conn, $username_conn, $password_conn, $database_conn);

// Definindo o conjunto de caracteres da conexão
mysqli_set_charset($conn_produtos,$charset_conn);

// Verificando possíveis erros na conexão
if($conn_produtos->connect_error){
    echo "ATENÇÃO ERRO: ".$conn_produtos->connect_error;
};
// Não deixar espaço vazio depois do fechamento do PHP causa erro HEADER
?>