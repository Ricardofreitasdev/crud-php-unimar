<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM filmes WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $diretor = $_POST['diretor'];
    $ano = $_POST['ano'];
    $genero = $_POST['genero'];

    $sql = "UPDATE filmes SET titulo='$titulo', diretor='$diretor', ano=$ano, genero='$genero' WHERE id=$id";

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
    <title>Editar Filme</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'components/header.php';?>
    <div class="container">
    <form method="post" action="">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    Título: <input type="text" name="titulo" value="<?php echo $row['titulo']; ?>" required><br>
    Diretor: <input type="text" name="diretor" value="<?php echo $row['diretor']; ?>" required><br>
    Ano: <input type="number" id="ano" name="ano" min="1900" max="2030" step="1" value="<?php echo $row['ano']; ?>" required><br>

    Gênero:
    <select name="genero" required>
        <option value="Ação" <?php if ($row['genero'] == 'Ação') {
    echo 'selected';
}
?>>Ação</option>
        <option value="Comédia" <?php if ($row['genero'] == 'Comédia') {
    echo 'selected';
}
?>>Comédia</option>
        <option value="Drama" <?php if ($row['genero'] == 'Drama') {
    echo 'selected';
}
?>>Drama</option>
        <option value="Fantasia" <?php if ($row['genero'] == 'Fantasia') {
    echo 'selected';
}
?>>Fantasia</option>
        <option value="Ficção Científica" <?php if ($row['genero'] == 'Ficção Científica') {
    echo 'selected';
}
?>>Ficção Científica</option>
        <option value="Romance" <?php if ($row['genero'] == 'Romance') {
    echo 'selected';
}
?>>Romance</option>
        <option value="Suspense" <?php if ($row['genero'] == 'Suspense') {
    echo 'selected';
}
?>>Suspense</option>
        <option value="Terror" <?php if ($row['genero'] == 'Terror') {
    echo 'selected';
}
?>>Terror</option>
    </select><br>
    <button class="btn btn-info" type="submit">Atualizar Filme</button>
</form>
    </div>
</body>
</html>
