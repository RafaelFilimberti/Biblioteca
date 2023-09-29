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
        <?php foreach ($livros as $livro) : ?>
            <tr>
                <td><?= $livro['titulo']; ?></td>
                <td><?= $livro['autor']; ?></td>
                <td><?= $livro['sinopse']; ?></td>
                <td><?= $livro['categoria']; ?></td>
                <td><?= $livro['ano']; ?></td>
                <td>
                    <!-- Adicione botões de editar e deletar aqui -->

                    <input type="submit" value="Editar">

                    <input type="submit" value="Deletar">


                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

