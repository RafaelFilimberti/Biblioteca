<?php
if(session()->has('message')){
    echo session()->getFlashdata('message');
}

?>

<h1>Lista de Livros</h1>
<table>
    <thead>
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Sinopse</th>
            <th>Categoria</th>
            <th>Ano</th>
        </tr>
    </thead>
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
                <td>
                    <!-- Adicione botões de editar e deletar aqui -->

                    <a href="<?= base_url('livros/editar/'.$livro->id) ?>">Editar</a>

                    <a href="<?= base_url('livros/deletar/'.$livro->id) ?>">Deletar</a>


                </td>
            </tr>
        <?php endforeach; 
        endif;?>
    </tbody>
</table>

