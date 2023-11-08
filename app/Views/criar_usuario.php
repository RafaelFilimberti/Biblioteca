<!DOCTYPE html>
<html>
<head>
  <title>Usuários</title>
  <meta charset="UTF-8">
  <meta name="keywords" content="HTML, CSS, JavaScript">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> 
  <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css") ?>"> 
</head>
<head>
    <title>Criar Usuário</title>
</head>
<body>
    <h2>Criar Usuário</h2>

    <?php if(session()->get('success')): ?>
        <div class="alert alert-success"><?= session()->get('success') ?></div>
    <?php endif; ?>

    <?php if(session()->get('error')): ?>
        <div class="alert alert-danger"><?= session()->get('error') ?></div>
    <?php endif; ?>

    <?php echo form_open('usuario/criarUsuario'); ?>

    <label for="nome">Nome:</label>
    <input type="nome" name="nome" required>
    
    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="cpf">CPF:</label>
    <input type="cpf" name="cpf" required>

    <label for="telefone">Telefone:</label>
    <input type="telefone" name="telefone" required>

    <label for="data_nascimento">Data De Nascimento:</label>
    <input type="data_nascimento" name="data_nascimento" required>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" required>

    <button type="submit">Criar Usuário</button>

    <?php echo form_close(); ?>
</body>
</html>
