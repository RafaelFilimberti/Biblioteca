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
