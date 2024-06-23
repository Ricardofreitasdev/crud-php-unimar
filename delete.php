<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM filmes WHERE id=$id";

    if ($conn->query($sql) === true) {
        header('Location: index.php');
        exit;
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Filme</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'components/header.php';?>
    <div class="container">
        <a href="read.php">Voltar para a lista de filmes</a>
    </div>
</body>
</html>
