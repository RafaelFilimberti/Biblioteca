

<form method="post" action="<?php route_to('livros/editar/' . $livro->id); ?>">
        <div class="mb-3">
            <input type="hidden" name="id" value="<?php echo $livro->id; ?>">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $livro->nome; ?>" required>
        
        <label for="num_paginas" class="form-label">Número de páginas:</label>
        <input type="text" class="form-control" id="num_paginas" name="num_paginas" value="<?php echo $livro->num_paginas; ?>" required>
       
        <label for="autor" class="form-label">Autor:</label>
        <input type="text" class="form-control" id="autor" name="autor" value="<?php echo $livro->autor; ?>" required>
       
        <label for="editora" class="form-label">Editora:</label>
        <input type="text" class="form-control" id="editora" name="editora" value="<?php echo $livro->editora; ?>" required>
       
        <label for="edicao" class="form-label">Edição:</label>
        <input type="text" class="form-control" id="edicao" name="edicao" value="<?php echo $livro->edicao; ?>" required>
       
        <label for="sinopse" class="form-label">Sinopse:</label>
        <input type="text" class="form-control" id="sinopse" name="sinopse" value="<?php echo $livro->sinopse; ?>" required>
       
        <label for="categoria" class="form-label">Categoria:</label>
        <input type="text" class="form-control" id="categoria" name="categoria" value="<?php echo $livro->categoria; ?>" required>
       
        <label for="ano" class="form-label">Ano:</label>
        <input type="text" class="form-control" id="ano" name="ano" value="<?php echo $livro->ano; ?>" required>

        <label class="form-label" for="id_tipo_do_livro" required>Tipo da mídia:</label>
        <select class="form-select" name="id_tipo_do_livro" id="id_tipo_do_livro">
          <option value="1">Online</option>
          <option value="2">Físico</option>
        </select>
    
        <input type="submit" value="Editar">
    </form>