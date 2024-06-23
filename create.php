<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $diretor = $_POST['diretor'];
    $ano = $_POST['ano'];
    $genero = $_POST['genero'];

    $sql = "INSERT INTO filmes (titulo, diretor, ano, genero) VALUES ('$titulo', '$diretor', $ano, '$genero')";

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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'components/header.php';?>
    <div class="container">
        <form method="post" action="">
            Título: <input type="text" name="titulo" required><br>
            Diretor: <input type="text" name="diretor" required><br>
            Ano: <input type="number" id="ano" name="ano" min="1900" max="2030" step="1" required><br>
            Gênero:
            <select name="genero" required>
                <option value="Ação">Ação</option>
                <option value="Comédia">Comédia</option>
                <option value="Drama">Drama</option>
                <option value="Fantasia">Fantasia</option>
                <option value="Ficção Científica">Ficção Científica</option>
                <option value="Romance">Romance</option>
                <option value="Suspense">Suspense</option>
                <option value="Terror">Terror</option>
            </select><br>
            <button class="btn btn-info" type="submit">Adicionar Filme</button>
        </form>
    </div>
</body>
</html>
