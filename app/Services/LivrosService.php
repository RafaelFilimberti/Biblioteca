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
    
        if($this->livrosModel->insert($livros)){
            session()->setFlashdata('success', 'Login criado com sucesso');
            return redirect()->to('/');
        }else{
            return redirect()->back()->withInput()->with('errors', $this->livrosModel->errors()); 
        }

    }


    

}