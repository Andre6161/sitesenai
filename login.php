<?php
// Dados de conexão com o banco de dados MySQL
$servername = "localhost"; // Host do banco de dados
$username = "root"; // Nome de usuário do banco de dados
$password = ""; // Senha do banco de dados
$dbname = "teste"; // Nome do banco de dados

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

// Criar conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta SQL com prepared statement
$sql = "SELECT * FROM login WHERE email = ? AND senha = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $senha);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['isAdmin'] == 1) {
        header("Location: index.html");
        exit;
    } else {
        // Se não for administrador, redirecionar para outra página (por exemplo, error.html)
        header("Location: error.html");
        exit; // Encerrar o script após o redirecionamento
    }
} else {
    // Usuário não encontrado, redirecionar para outra página (por exemplo, error.html)
    header("Location: error.html");
    exit;
}

$conn->close();
?>
