<!DOCTYPE html>
<html>
<head>
 
  <meta charset="UTF-8">
  <meta name="keywords" content="HTML, CSS, JavaScript">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" inegtrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?php echo base_url("assets/css/login.css") ?>">
</head>
<head>
    
</head>
<body>
    



    <form action="<?= route_to('reservas/add') ?>" method="POST" enctype='multipart/form-data'>
    <h1>Reservas</h1>
        <a for="id_livro">Livro:</a>
        
        <a for="data_inicio">Data início:</a>
        <input type="date" id="data_inicio" name="data_inicio" required>

        <a for="data_fim">Data final:</a>
        <input type="date" id="data_fim" name="data_fim" required>

        <div class="alert alert-danger visually-hidden" id="message_disponivel" role="alert"><span id="text-message"></span></div>
        </div>

        <a for="email">e-mail:</a>
        <input type="text" id="email" name="email" required>

        <a class="btn btn-info">Cadastrar</a>
       
    </form>