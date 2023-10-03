<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LivroModel;

class Livros extends BaseController
{

    protected $_model;

    public function __construct()
    {
        $this->_model = new LivroModel();
    }


    public function index(){

        $data['livros'] = $this->_model->findAll();

        return view('listar_livros', $data);
    }


    public function adicionar(){
        return view('adicionar_livro');
    }

    public function add()
    {

        if ($this->_model->insert($this->request->getPost())) {
            // Redireciona para a página de sucesso
            session()->setFlashdata('message', 'Livro adicionado com sucesso');
            return redirect()->to('/livros');
        } else {
            session()->setFlashdata('message', 'erro ao tentar adicionar o livro, verifique os campos');
            return redirect()->to('/livros/adicionar');
        }
    
    }

    public function editar($id = null){


        if($this->request->getMethod() === 'post'){
            if($this->_model->update($id, $this->request->getPost())){
                // Redireciona para a página de sucesso
                session()->setFlashdata('message', 'Livro atualizado com sucesso');
                return redirect()->to('/livros');
            } else {
                session()->setFlashdata('message', 'erro ao tentar atualizar o livro, verifique os campos');
                return redirect()->to('/livros/editar');
            }
           
        }else{
            $data['livro'] = $this->_model->find(1);
            return view('editar_livro', $data);
        }

    }

    public function deletar($id = null)
    {
        if($this->_model->delete($id)){
            // Redireciona para a página de sucesso
            session()->setFlashdata('message', 'Livro atualizado com sucesso');
            return redirect()->to('/livros');
        } else {
            session()->setFlashdata('message', 'erro ao tentar atualizar o livro, verifique os campos');
            return redirect()->to('/livros/editar');
        }
    }

  

}







