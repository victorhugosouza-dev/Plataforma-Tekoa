<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];
    $autor_id = $_SESSION['usuario_id'];

    // Upload de imagem
    $imagem = '';
    if (isset($_FILES['imagem'])) {
        $imagem_nome = time() . '_' . $_FILES['imagem']['name'];
        move_uploaded_file($_FILES['imagem']['tmp_name'], 'uploads/' . $imagem_nome);
        $imagem = 'uploads/' . $imagem_nome;
    }

    $query = $pdo->prepare("INSERT INTO conteudos (titulo, descricao, categoria, imagem, autor_id, data_publicacao) 
                            VALUES (:titulo, :descricao, :categoria, :imagem, :autor_id, NOW())");
    $query->bindParam(':titulo', $titulo);
    $query->bindParam(':descricao', $descricao);
    $query->bindParam(':categoria', $categoria);
    $query->bindParam(':imagem', $imagem);
    $query->bindParam(':autor_id', $autor_id);
    $query->execute();

    echo "Conteúdo adicionado com sucesso!";
}
?>

<h2>Adicionar Conteúdo Cultural</h2>
<form method="post" enctype="multipart/form-data">
    Título: <input type="text" name="titulo" required><br>
    Descrição: <textarea name="descricao" required></textarea><br>
    Categoria: 
    <select name="categoria">
        <option value="historia">História</option>
        <option value="rituais">Rituais</option>
        <option value="idiomas">Idiomas</option>
        <option value="artefatos">Artefatos</option>
    </select><br>
    Imagem: <input type="file" name="imagem"><br>
    <input type="submit" value="Adicionar">
</form>
