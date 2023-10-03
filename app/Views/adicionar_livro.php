<h2>Adicionar Livro</h2>
<?php
if(session()->has('message')){
    echo session()->getFlashdata('message');
}
?>



<form action="<?= route_to('livros/add') ?>" method="POST" enctype='multipart/form-data'> <!-- o action está pegando todo o formulario e enviando via POST para o insert_livro -->

<div class="mb-3">
  <label class="form-label" for="nome">Nome:</label>
  <input class="form-control" type="text" id="nome" name="nome" required>
</div>


<div class="mb-3">
  <label class="form-label" for="autor">Autor:</label>
  <input class="form-control" type="text" id="autor" name="autor" required>
</div>
<div class="mb-3">
  <label class="form-label" for="num_paginas">Número de Páginas:</label>
  <input class="form-control" type="text" id="num_paginas" name="num_paginas" required>
</div>
<div class="mb-3">
  <label class="form-label" for="editora">Editora:</label>
  <input class="form-control" type="text" id="editora" name="editora" required>
</div>
<div class="mb-3">
  <label class="form-label" for="edicao">Edição:</label>
  <input class="form-control" type="text" id="edicao" name="edicao" required>
</div>
<div class="mb-3">
  <label class="form-label" for="sinopse">Sinopse:</label>
  <textarea class="form-control" type="text" id="sinopse" name="sinopse" required>  </textarea>
</div>
<div class="mb-3">
  <label class="form-label" for="categoria">Categoria:</label>
  <input class="form-control" type="text" id="categoria" name="categoria" required>
</div>
<div class="mb-3">
  <label class="form-label" for="ano">Ano:</label>
  <input class="form-control" type="date" id="ano" name="ano" required>
</div>
<div class="mb-3">
  <label class="form-label" for="id_tipo_do_livro" required>Tipo da mídia:</label>
  <select class="form-select" name="id_tipo_do_livro" id="id_tipo_do_livro">
    <option value="1">Online</option>
    <option value="2">Físico</option>
  </select>
</div>
<div class="mb-3">
  <label class="form-label" for="imagem">Carregar imagem:</label>
  <input class="form-control" type="file" id="imagem" name="imagem">
</div>
<input class="btn btn-success" type="submit" value="Cadastrar">
</form>