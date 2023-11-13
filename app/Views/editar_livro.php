<?php
if (session()->has('message')) {
  echo session()->getFlashdata('message');
}

?>
<!DOCTYPE html> 

<html>

<head>
  <title>Editar Livro</title>
  <meta charset="UTF-8">
  <meta name="keywords" content="HTML, CSS, JavaScript">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css") ?>">
</head>

<body>
  <?= validation_list_errors() ?>
  <form method="post" action="<?php route_to('livros/editar/' . $livro->id); ?>">

    <input type="hidden" name="id" value="<?php echo $livro->id; ?>">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?php echo $livro->nome; ?>" required>

    <label for="num_paginas">Número de páginas:</label>
    <input type="text" id="num_paginas" name="num_paginas" value="<?php echo $livro->num_paginas; ?>" required>

    <label for="autor">Autor:</label>
    <input type="text" id="autor" name="autor" value="<?php echo $livro->autor; ?>" required>

    <label for="editora">Editora:</label>
    <input type="text" id="editora" name="editora" value="<?php echo $livro->editora; ?>" required>

    <label for="edicao">Edição:</label>
    <input type="text" id="edicao" name="edicao" value="<?php echo $livro->edicao; ?>" required>

    <label for="sinopse">Sinopse:</label>
    <input type="text" id="sinopse" name="sinopse" value="<?php echo $livro->sinopse; ?>" required>

    <label for="categoria">Categoria:</label>
    <input type="text" id="categoria" name="categoria" value="<?php echo $livro->categoria; ?>" required>

    <label for="ano">Ano:</label>
    <input type="text" id="ano" name="ano" value="<?php echo $livro->ano; ?>" required>

    <label for="id_tipo_do_livro" required>Tipo da mídia:</label>
    <select class="form-select" name="id_tipo_do_livro" id="id_tipo_do_livro">
      <option value="1">Online</option>
      <option value="2">Físico</option>
    </select>

    <form action="upload.php" method="post" enctype="multipart/form-data">
      <label for="arquivo">Selecione uma imagem:</label>
      <input type="file" id="imagem" value="<?php echo $livro->imagem;  ?>" required>
    </form>

    <input type="submit" value="Editar">
  </form>