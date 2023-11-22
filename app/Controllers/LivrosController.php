<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LivrosModel;
use App\Services\LivrosService;
use CodeIgniter\Controller;
use CodeIgniter\CodeIgniter\Loader\MyLoader;



use function PHPUnit\Framework\isNull;

class LivrosController extends BaseController
{

    protected $ci;
    protected $_model;
    protected $_livrosService;

    public function __construct()
    {
        $this->_model = new LivrosModel();
        $this->_livrosService = new LivrosService();
        
    }


    public function index()
    {
        /* debug('este gsfvuhasdgfvuiaruilicpkjgu'); */
        $data['livros'] = $this->_livrosService->getAllLivros();

        return view('listar_livros', $data);
    }

    public function adicionar()
    {
        if ($this->request->getPost()) {

            if ($id_livro = $this->_livrosService->createLivros($this->request->getPost())) {

                $this->upload_image($this->request->getFile('imagem'), $id_livro);
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
                'ano' => 'required|max_length[4]'

            ];

            if ($this->validate($validationRules)) {

                $livroData = $this->request->getPost();

                if ($this->_livrosService->updateLivros($id, $livroData)) {

                    if ($this->request->getFile('imagem')) {
                        $this->upload_image($this->request->getFile('imagem'), $id);
                    } else {
                        session()->setFlashdata('message', 'Livro atualizado com sucesso');
                        return redirect()->to('/livros');
                    }
                } else {

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

            session()->setFlashdata('message', 'Livro excluído com sucesso');
            return redirect()->to('/livros');
        } else {
            session()->setFlashdata('message', 'erro ao excluir o livro');
            return redirect()->to('/livros/editar');
        }
    }






    private function upload_image($image, $postId)
    {
        $destinationDirectory = 'assets/imgs/';

        $filename = uniqid() . '_' . preg_replace('/\s+/', '', $image->getName());

        if ($image->move($destinationDirectory, $filename)) {
            if ($this->_livrosService->updateLivros($postId, ['imagem' => $filename])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


   /*  public function mostrarImagem($postId)
    {
        // Suponha que você tenha um model ou serviço chamado '_livrosService'
        $livro = $this->_livrosService->obterLivroPorId($postId);

        // Verifica se o livro e a imagem existem
        if ($livro && $livro['imagem']) {
            $data['imagem_url'] = base_url('assets/imgs/' . $livro['imagem']);
            $this->load->view('listar_livro', $data);
        } else {
            // Lógica para lidar com o caso em que a imagem não foi encontrada
            echo "Imagem não encontrada.";
        }
    } */

    public function mostrarImagem()
    {
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $imagem = $this->request->getFile('imagem');

            // Validação de imagem e salvamento
            if ($imagem->isValid() && !$imagem->hasMoved()) {
                $caminho = FCPATH . 'assets/imgs';

                if (!is_dir($caminho)) {
                    mkdir($caminho, 0777, true);
                }

                $nomeImagem = time() . '_' . $imagem->getName();
                $imagem->move($caminho, $nomeImagem);

                $data['imagem'] = $nomeImagem;

                // Agora, você também precisa incluir a categoria_id selecionada no $data.
                $data['categoria_id'] = $this->request->getPost('categoria_id');

                // Chame createProduct com ambos os argumentos
                $this->_livrosService->createLivros($data, $nomeImagem);
            } else {
                // Lida com erros de imagem aqui, se necessário.
            }
        }

        return redirect()->to('/livros/adicionar');
    }


}
