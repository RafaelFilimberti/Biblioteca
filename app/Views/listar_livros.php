<?php
if(session()->has('message')){
    echo session()->getFlashdata('message');
}

?>
<<<<<<< Updated upstream
=======
<!DOCTYPE html> 
>>>>>>> Stashed changes

<h1>Lista de Livros</h1>
<table>
<<<<<<< Updated upstream
    <thead>
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Sinopse</th>
            <th>Categoria</th>
            <th>Ano</th>
        </tr>
    </thead>
=======
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Autor</th>
                <th>Sinopse</th>
                <th>Categoria</th>
                <th>Ano</th>
                <th>Imagem</th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livros as $livro): ?>
                <tr>
                    <td><?= $livro->nome; ?></td>
                    <td><?= $livro->autor; ?></td>
                    <td><?= $livro->sinopse; ?></td>
                    <td><?= $livro->categoria; ?></td>
                    <td><?= $livro->ano; ?></td>
                    <td><?= $livro->imagem; ?></td>
                    
                    <td>
                    <?php if ($livro->disponivel): ?>
        <a href="<?= base_url('/reservas/reservarLivro/' . $livro->id); ?>" class="btn btn-success">Reservar</a>
    
        <?php else: ?>
        <!-- <span class="badge badge-danger">Indisponível</span> -->
    <?php endif; ?>
    
    
    <a href="<?= base_url('/livros/reservas/' . $livro->id); ?>" class="btn btn-info">Reservar</a>
</td>
                </tr>
                
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
>>>>>>> Stashed changes
    <tbody>
        <?php 
        if($livros):
        foreach ($livros as $livro) : ?>
            <tr>
                <td><?= $livro->nome; ?></td>
                <td><?= $livro->autor; ?></td>
                <td><?= $livro->sinopse; ?></td>
                <td><?= $livro->categoria; ?></td>
                <td><?= $livro->ano; ?></td>
                <td><?= $livro->imagem; ?></td>
                <td>
                    <!-- Adicione botões de editar e deletar aqui -->

                    <!-- <input type="submit" value="Editar"> -->

<<<<<<< Updated upstream
=======
                    <a href="<?= base_url('livros/editar/'.$livro->id) ?>" class="btn btn-success">Editar</a>
>>>>>>> Stashed changes

                    <a href="<?= base_url('livros/deletar/'.$livro->id) ?>" class="btn btn-success">Deletar</a>


                </td>
            </tr>
        <?php endforeach; 
        endif;?>
    </tbody>
</table>

