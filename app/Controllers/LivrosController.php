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

        $data['livros'] = $this->_livrosService->getAllLivros();

        return view('listar_livros', $data);
    }

    public function adicionar()
    {
        if($this->request->getPost()){

            if ($this->_livrosService->createLivros($this->request->getPost())) {
                // Redireciona para a página de sucesso
                session()->setFlashdata('message', 'Livro adicionado com sucesso');
                return redirect()->to('/livros');
            } else {
                session()->setFlashdata('message', 'erro ao tentar adicionar o livro, verifique os campos');
                return redirect()->to('/livros/adicionar');
            }

        }else{
            return view('adicionar_livro');
        }
     
    }

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
            'imagem' => 'required|max_length[40]',
            
        ];
      
        if ($this->validate($validationRules)) { 
            
            $livroData = $this->request->getPost();
            if ($this->_livrosService->updateLivros($id, $livroData)) {
                // Redireciona para a página de sucesso
                session()->setFlashdata('message', 'Livro atualizado com sucesso');
                return redirect()->to('/livros');
            } else {
                // Adicione uma mensagem de erro mais detalhada, se necessário
                session()->setFlashdata('message', 'Erro ao tentar atualizar o livro');
                return redirect()->to("/livros/editar/$id");
            }
        } else {
            debug($this->validator->getErrors());
            // Redireciona de volta à página de edição para corrigir os erros de validação
            session()->setFlashdata('message', 'Erro ao tentar atualizar o livro, verifique os campos');
            return redirect()->to("/livros/editar/$id");
        }
    } else {
        $data['livro'] = $this->_model->find($id);
        return view('editar_livro', $data);
    }
}


    public function deletar($id = null)
    {
        if ($this->_model->delete($id)) {
            // Redireciona para a página de sucesso
            session()->setFlashdata('message', 'Livro excluído com sucesso');
            return redirect()->to('/livros');
        } else {
            session()->setFlashdata('message', 'erro ao excluir o livro');
            return redirect()->to('/livros/editar');
        }
    }
    }

