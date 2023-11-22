<?php
if (session()->has('message')) {
  echo session()->getFlashdata('message');
}
?>


<!DOCTYPE html>

<html>

<head>
  <title>Adicionar Livro</title>
  <meta charset="UTF-8">
  <meta name="keywords" content="HTML, CSS, JavaScript">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?php echo base_url("assets/css/adicionar.css") ?>">
</head>

<body>


  <form action="<?= base_url('livros/adicionar') ?>" method="POST" enctype='multipart/form-data'> <!-- o action está pegando todo o formulario e enviando via POST para o insert_livro -->


    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>


    <label for="autor">Autor:</label>
    <input type="text" id="autor" name="autor" required>


    <label for="num_paginas">Número de Páginas:</label>
    <input type="text" id="num_paginas" name="num_paginas" required>


    <label for="editora">Editora:</label>
    <input type="text" id="editora" name="editora" required>


    <label for="edicao">Edição:</label>
    <input type="text" id="edicao" name="edicao" required>


    <label for="sinopse">Sinopse:</label>
    <textarea type="text" id="sinopse" name="sinopse" required>  </textarea>


    <label for="categoria">Categoria:</label>
    <input type="text" id="categoria" name="categoria" required>

    <label for="ano">Ano:</label>
    <input type="date" id="ano" name="ano" required>


    <label for="id_tipo_do_livro" required>Tipo da mídia:</label>
    <select  name="id_tipo_do_livro" id="id_tipo_do_livro">
      <option value="1">Online</option>
      <option value="2">Físico</option>
    </select>

    
 
      <label for="imagem">Escolha uma imagem:</label>
      <input type="file" name="imagem" id="imagem" />

    
   <!--  <label  for="imagem">Carregar imagem:</label>
    <input  type="file" id="imagem" name="imagem"> -->

    <input class="btn btn-success" type="submit" value="Cadastrar">
  </form>




</body>

</html>