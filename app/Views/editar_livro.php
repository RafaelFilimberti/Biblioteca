<h2>Editar Livro</h2>
<form action="<?= base_url('livros/editar/' . $livro['id']) ?>" method="post">
    Título: <input type="text" name="nome" value="<?= $livro['nome'] ?>"><br>
    Autor: <input type="text" name="autor" value="<?= $livro['autor'] ?>"><br>
    Sinopse: <input type="text" name="sinopse" value="<?= $livro['sinopse'] ?>"><br>
    Categoria: <input type="text" name="categoria" value="<?= $livro['categoria'] ?>"><br>
    Ano: <input type="text" name="ano" value="<?= $livro['ano'] ?>"><br>
    <input type="submit" value="Editar">
</form>

