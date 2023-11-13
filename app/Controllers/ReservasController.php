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
    


public function index()
    {
        return view('reservas');
    }
public function ReservarLivro($livroId)
{
    // Verifica se o livro está disponível para reserva
    if ($this->livrosModel->isLivroDisponivel($livroId)) {
        // Realiza a reserva do livro
        $reservaBemSucedida = $this->livrosModel->reservarLivro($livroId);

        if ($reservaBemSucedida) {
            $this->notificarUsuarioReservaSucesso();
            // Lógica adicional, como notificar o usuário sobre a reserva bem-sucedida
            return redirect()->to('/livros')->with('success', 'Livro reservado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Erro ao realizar a reserva. Tente novamente.');
        }
    } else {
        // Lógica para lidar com o caso em que o livro não está disponível
        return redirect()->back()->with('error', 'Livro não disponível para reserva.');
    }
    public function check_disponibilidade()
{
    $livroId = $this->request->getPost('id_livro');
    $livroModel = new LivrosModel(); // Certifique-se de carregar o modelo corretamente

    $response = [
        'indisponivel' => !$livroModel->isLivroDisponivel($livroId)
    ];

    return $this->response->setJSON($response);
}

}
}