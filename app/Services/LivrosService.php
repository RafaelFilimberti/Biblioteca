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

        $livros = new Livros($dados);
    
        if($this->livrosModel->update($id, $livros)){
            session()->setFlashdata('success', 'Livro atualizado com sucesso');
            return redirect()->to('/');
        }else{
            return redirect()->back()->withInput()->with('errors', $this->livrosModel->errors()); 
        }

    }

/* 
    public function obterLivroPorId($postId) {
        // Lógica para consultar o banco de dados e obter informações do livro
        $this->pinkside->where('id', $postId);
        $query = $this->pinkside->get('livros');
    
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Retorna um array com as informações do livro
        } else {
            return null; // Retorna null se o livro não for encontrado
        }
    }
 */

 public function insertImage($image)
    {
        if ($image !== null) {
            if (is_object($image) && method_exists($image, 'isValid') && $image->isValid() && !$image->hasMoved()) {
                return $this->saveImage($image);
            } elseif (is_string($image) && file_exists($image) && getimagesize($image)) {

                return $this->saveImageFromFile($image);
            }
        }

        return null;
    }


    public function saveImageFromFile($imagePath)
    {

        if (file_exists($imagePath)) {

            $destinationDirectory = FCPATH . 'assets/imgs';



            $filename = uniqid() . '_' . basename($imagePath);


            $destinationPath = $destinationDirectory . $filename;


            if (rename($imagePath, $destinationPath)) {

                return $destinationPath;
            } else {

                return null;
            }
        }


        return null;
    }

    public function moveImage($image, $newName = null)
    {
        $diretorioDestino = 'public/assets/imgs';

        if ($image !== null) {
            if ($image->isValid() && !$image->hasMoved()) {
                if ($newName === null) {
                    $newName = $image->getName();
                }

                if ($image->move($diretorioDestino, $newName)) {
                    return $newName;
                }
            }
        }

        return null;
    }


    public function renameImage($originalName)
    {
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        $newName = time() . '.' . $extension;
        return $newName;
    }

    private function saveImage($image)
    {
        // Lógica para inserção de imagem

        if ($image->getError() === UPLOAD_ERR_OK) {
            $diretorioDestino = 'assets/imgs';
            $extension = pathinfo($image->getName(), PATHINFO_EXTENSION);
            $nomeUnico = time() . '.' . $extension;

            if ($image->move($diretorioDestino, $nomeUnico)) {

                return $nomeUnico;
            }
        } else {
            return false;
        }
    }
    
}