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

// Consulta para selecionar todos os contactos
$sql = "SELECT id_contacto, nome, email, mensagem FROM tabelacontacto";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Lista de Contactos</h1>";
    echo "<table border='1'>";
    echo "<tr><th>ID_CONTACTO</th><th>Nome</th><th>Email</th><th>Mensagem</th><th>Ações</th></tr>";

    // Exibir cada contacto
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id_contacto"] . "</td>";
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["mensagem"] . "</td>";
     
        echo "<td>
                <a href='editar_contacto.php?id_contacto=" . $row["id_contacto"] . "'>Editar</a> | 
                <a href='eliminar_contacto.php?id_contacto=" . $row["id_contacto"] . "' onclick='return confirm(\"Tem certeza que deseja eliminar este contacto?\")'>Eliminar</a>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum contacto encontrado.";
}

// Fechar conexão
$conn->close();
?>