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

// Verificar se o ID foi passado via URL
if (isset($_GET['id_contacto'])) {
    $id = $_GET['id_contacto'];

    // Consulta para eliminar o contacto
    $sql = "DELETE FROM tabelacontacto WHERE id_contacto = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Contacto eliminado com sucesso!";
    } else {
        echo "Erro ao eliminar contacto: " . $conn->error;
    }
} else {
    echo "ID do contacto não fornecido.";
}

// Fechar conexão
$conn->close();

// Redirecionar de volta para a lista de contactos
header("Location: listar_contactos.php");
?>