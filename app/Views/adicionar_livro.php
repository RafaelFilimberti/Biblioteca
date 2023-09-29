<h2>Adicionar Livro</h2>
<?php
if(session()->has('message')){
    echo session()->getFlashdata('message');
}
?>

<form action="<?= base_url('livros/add') ?>" method="post">
    Nome: <input type="text" name="nome"><br>
    Autor: <input type="text" name="autor"><br>
    Sinopse: <input type="text" name="sinopse"><br>
    Categoria: <input type="text" name="categoria"><br>
    Ano: <input type="text" name="ano"><br>
    <input type="submit" value="Adicionar">
</form>