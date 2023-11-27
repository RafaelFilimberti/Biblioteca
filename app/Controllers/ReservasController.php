<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Reservas;
use App\Models\LivrosModel;
use App\Models\ReservasModel;
use App\Services\ReservasService;

class ReservasController extends BaseController
{
    protected $reservasModel;
    protected $livrosModel;
    protected $reservasService;

    public function __construct()
    {
        $this->reservasModel = new ReservasModel();
        $this->livrosModel = new LivrosModel();
        $this->reservasService = new ReservasService();
    }
    public function index($id)
    {
        $livroModel = new LivrosModel(); 

        $livro = $livroModel->find($id);
        
        return view('reservas');
    }
    public function ReservarLivro($livroId)
    {
        if ($this->request->getPost()) {
        if ($this->livrosModel->isLivroDisponivel($livroId)) {
            // Realiza a reserva do livro
            $reservaBemSucedida = $this->livrosModel->reservarLivro($livroId);

            if ($reservaBemSucedida) {
                $this->notificarUsuarioReservaSucesso();
                return redirect()->to('/livros')->with('success', 'Livro reservado com sucesso!');
            } else {
                return redirect()->back()->with('error', 'Erro ao realizar a reserva. Tente novamente.');
            }
        
        }
    }

}
}
