<?php

namespace App\Services;

use App\Entities\Livros;
use App\Models\LivrosModel;
use CodeIgniter\Config\Factories;

class LivrosService{

    protected $livrosModel;

    public function __construct()
    {
        $this->livrosModel = Factories::models(LivrosModel::class);
    }
    
    public function getAllLivros(){
        return $this->livrosModel->findAll();
    }

    public function createLivros($dados){

        $livros = new Livros($dados);
    
        if($id = $this->livrosModel->insertLivro($livros)){
            return $id;
        }else{
            return redirect()->back()->withInput()->with('errors', $this->livrosModel->errors()); 
        }

    }

    public function updateLivros($id, $dados){
       
        $livros = $this->livrosModel->find($id);
       
        $livros->fill($dados);
        if($livros->hasChanged()){
            if($this->livrosModel->updateLivros($livros)){
                session()->setFlashdata('success', 'Livro atualizado com sucesso');
                return redirect()->to('/');
            }else{
                return redirect()->back()->withInput()->with('errors', $this->livrosModel->errors()); 
            }
        
        }else{
            session()->setFlashdata('success', 'Livro atualizado com sucesso');
            return redirect()->to('/');
        }
    }


    

}