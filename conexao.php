<?php


$servidor = "localhost";
$porta = "5432";
$bancoDeDados = "crudformulariophp";
$usuario = "postgres";
$senha = "";

$conexao = new PDO("pgsql:host=$servidor port=$porta dbname=$bancoDeDados user=$usuario password=$senha");

if (!$conexao) {
    die ("Não foi possível conectar ao servidor PostGreSQL");
}

echo "Conexão efetuada com sucesso!!";
?>