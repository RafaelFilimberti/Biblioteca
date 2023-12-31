<?php
if (session()->has('message')) {
    echo session()->getFlashdata('message');
}

?>
<!DOCTYPE html> 

<html>

<head>
    <title> Livros</title>
    <meta charset="UTF-8">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/livros.css") ?>">
</head>

<body>
    <h1>Lista de Livros</h1>

    <a href="<?= base_url('/livros/adicionar/'); ?>" class="adicionar">Adicionar Livros</a>

    <table>
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
                        <th>Ações</th> <!-- Adicionei uma coluna para ações, como a reserva do livro -->
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($livros as $livro) : ?>
                        <tr>
                            <td><?= $livro->nome; ?></td>
                            <td><?= $livro->autor; ?></td>
                            <td><?= $livro->sinopse; ?></td>
                            <td><?= $livro->categoria; ?></td>
                            <td><?= $livro->ano; ?></td>
                            <td><img src="<?php echo base_url('assets/imgs'). '/'. $livro->imagem; ?>" alt="<?php echo $livro->nome; ?>"></td>
                            <td>
                            
                                    <a href="<?= base_url('/livros/reservas/' . $livro->id); ?>" class="btn btn-success">Reservar</a>
                                <a href="<?= base_url('livros/editar/'.$livro->id) ?>" class="btn btn-success">Editar</a>
                                 <a href="<?= base_url('livros/deletar/'.$livro->id) ?>" class="btn btn-success">Deletar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </table>