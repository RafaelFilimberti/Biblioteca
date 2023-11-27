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
    

    <?php if(session()->get('success')): ?>
        <div class="alert alert-success"><?= session()->get('success') ?></div>
    <?php endif; ?>

    <?php if(session()->get('error')): ?>
        <div class="alert alert-danger"><?= session()->get('error') ?></div>
    <?php endif; ?>

    <?php echo form_open('registrar'); ?>
    <h2>Criar Usuário</h2>

    <a for="nome">Nome:</a>
    <input type="nome" name="nome" required>
    
    <a for="email">Email:</a>
    <input type="email" name="email" required>

    <a for="cpf">CPF:</a>
    <input type="cpf" name="cpf" required>

    <a for="telefone">Telefone:</a>
    <input type="telefone" name="telefone" required>

    <a  for="data_nascimento">Data De Nascimento:</a>
  <input  type="date" id="ano" name="ano" required>

    <a for="senha">Senha:</a>
    <input type="password" name="senha" required>

    <button  class="btn btn-primary">Criar Usuário</button>
    
    <a href="<?php echo base_url('login'); ?>" class="btn btn-primary">Fazer Login</a>


    <?php echo form_close(); ?>
</body>
</html>
