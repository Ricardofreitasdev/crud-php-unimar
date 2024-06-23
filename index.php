<?php
include 'config.php';

$sql = "SELECT * FROM filmes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listar Filmes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'components/header.php';?>
    <div class="container">
        <?php
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Título</th><th>Diretor</th><th>Ano</th><th>Gênero</th><th>Ações</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['titulo']}</td>
                    <td>{$row['diretor']}</td>
                    <td>{$row['ano']}</td>
                    <td>{$row['genero']}</td>
                    <td>
                        <a class='btn btn-info' href='update.php?id={$row['id']}'>Editar</a>
                        <a class='btn btn-danger' href='delete.php?id={$row['id']}'>Excluir</a>
                    </td>
                    </tr>";
    }
    echo "</table>";
} else {
    echo "<p>Nenhum filme encontrado</p>";
}
?>
    </div>
</body>
</html>
