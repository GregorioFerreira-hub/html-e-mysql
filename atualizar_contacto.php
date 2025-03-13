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

// Coletar dados do formulário
$id_contacto = $_POST['id_contacto'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

// Atualizar os dados no banco de dados
$sql = "UPDATE tabelacontacto SET nome='$nome', email='$email', mensagem='$mensagem' WHERE id_contacto=$id_contacto";

if ($conn->query($sql) === TRUE) {
    echo "Contacto atualizado com sucesso!";
} else {
    echo "Erro ao atualizar contacto: " . $conn->error;
}

// Fechar conexão
$conn->close();

// Redirecionar de volta para a lista de contactos
header("Location: listar_editar_contacto.php");
?>