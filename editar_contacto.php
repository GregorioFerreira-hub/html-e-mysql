<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contacto";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se o ID_CONTACTO foi passado via URL
if (isset($_GET['id_contacto'])) {
    $id_contacto = $_GET['id_contacto'];

    // Consulta para selecionar o contacto pelo ID_CONTACTO
    $sql = "SELECT id_contacto, nome, email, mensagem FROM tabelacontacto WHERE id_contacto = $id_contacto";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row["nome"];
        $email = $row["email"];
        $mensagem = $row["mensagem"];
    } else {
        echo "Contacto não encontrado.";
        exit;
    }
} else {
    echo "ID_CONTACTO do contacto não fornecid_contactoo.";
    exit;
}

// Fechar conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wid_contactoth=device-wid_contactoth, initial-scale=1.0">
    <title>Editar Contacto</title>
</head>
<body>
    <h1>Editar Contacto</h1>
    <form action="atualizar_contacto.php" method="post">
        <input type="hid_contactoden" name="id_contacto" value="<?php echo $id_contacto; ?>">

        <label for="nome">Nome:</label>
        <input type="text" id_contacto="nome" name="nome" value="<?php echo $nome; ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id_contacto="email" name="email" value="<?php echo $email; ?>" required><br><br>

        <label for="mensagem">Mensagem:</label>
        <textarea id_contacto="mensagem" name="mensagem" required><?php echo $mensagem; ?></textarea><br><br>

        <input type="submit" value="Atualizar">
    </form>
</body>
</html>