<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LivrosModel;
use App\Services\LivrosService;

class LivrosController extends BaseController
{

    protected $_model;
    protected $_livrosService;

    public function __construct()
    {
        $this->_model = new LivrosModel();
        $this->_livrosService = new LivrosService();
    }


    public function index()
    {
<<<<<<< Updated upstream

=======
        /* debug('este gsfvuhasdgfvuiaruilicpkjgu'); */
>>>>>>> Stashed changes
        $data['livros'] = $this->_livrosService->getAllLivros();

        return view('listar_livros', $data);
    }

    public function adicionar()
    {
        if ($this->request->getPost()) {

            if ($this->_livrosService->createLivros($this->request->getPost())) {
                // Redireciona para a página de sucesso
                session()->setFlashdata('message', 'Livro adicionado com sucesso');
                return redirect()->to('/livros');
            } else {
                session()->setFlashdata('message', 'erro ao tentar adicionar o livro, verifique os campos');
                return redirect()->to('/livros/adicionar');
            }
        } else {
            return view('adicionar_livro');
        }
    }

<<<<<<< Updated upstream
    public function editar($id = null)
    {


        if ($this->request->getMethod() === 'post') {
            if ($this->_model->update($id, $this->request->getPost())) {
                // Redireciona para a página de sucesso
                session()->setFlashdata('message', 'Livro atualizado com sucesso');
                return redirect()->to('/livros');
            } else {
                session()->setFlashdata('message', 'erro ao tentar atualizar o livro, verifique os campos');
                return redirect()->to('/livros/editar');
            }
        } else {
            $data['livro'] = $this->_model->find(1);
            return view('editar_livro', $data);
        }
      
    }
  
=======
    public function editar($id)
    {
        if ($this->request->getMethod() === 'post') {
            // Defina as regras de validação para os campos do formulário
            $validationRules = [
                'nome' => 'required|min_length[3]',
                'autor' => 'required|min_length[3]',
                'num_paginas' => 'required|numeric',
                'editora' => 'required|min_length[3]',
                'edicao' => 'required|min_length[1]',
                'sinopse'  => 'required|max_length[50]',
                'categoria' => 'required|min_length[3]',
                'ano' => 'required|max_length[4]',
                'imagem' => 'uploaded[imagem] |max_size[imagem,1024]|ext_in[imagem,png,jpg,gif]'

            ];


            if ($this->validate($validationRules)) {

                $livroData = $this->request->getPost();
                if ($this->_livrosService->updateLivros($id, $livroData)) {

                    session()->setFlashdata('message', 'Livro atualizado com sucesso');
                    return redirect()->to('/livros');
                } else {

                    session()->setFlashdata('message', 'Erro ao tentar atualizar o livro');
                    return redirect()->to("/livros/editar/$id");
                }
            } else {
                /* debug($this->validator->getErrors()); */
                // Redireciona de volta à página de edição para corrigir os erros de validação
                session()->setFlashdata('message', 'Erro ao tentar atualizar o livro, verifique os campos');

                /* $validationErrors = $this->validator->getErrors();
                session()->setFlashdata('errors', $validationErrors); */
                return redirect()->to("/livros/editar/$id");
            }
        } else {
            $data['livro'] = $this->_model->find($id);
            return view('editar_livro', $data);
        }
    }

>>>>>>> Stashed changes

    public function deletar($id = null)
    {
        if ($this->_model->delete($id)) {
<<<<<<< Updated upstream
            // Redireciona para a página de sucesso
=======

>>>>>>> Stashed changes
            session()->setFlashdata('message', 'Livro excluído com sucesso');
            return redirect()->to('/livros');
        } else {
            session()->setFlashdata('message', 'erro ao excluir o livro');
            return redirect()->to('/livros/editar');
        }
    }
}
