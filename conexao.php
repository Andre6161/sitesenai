<?php

$usuario = 'root';         // Nome do usuário do banco de dados
$senha = '';               // Senha do banco de dados
$host = 'localhost';       // Host do banco de dados

// Criar conexão com o banco de dados
$mysqli = new mysqli($host, $usuario, $senha);

// Verificar se houve erro na conexão
if ($mysqli->connect_error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->connect_error);
}

// Selecionar o banco de dados
$database = 'teste';       // Nome do banco de dados
if (!$mysqli->select_db($database)) {
    die("Banco de dados não encontrado: " . $mysqli->error);
}

echo "Conexão bem-sucedida ao banco de dados!";
