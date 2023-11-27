<?php

namespace App\Models;

use App\Entities\Reservaservice;
use CodeIgniter\Model;

class ReservasModel extends Model
{
public function reservarLivro($id)
{
    // Recupera as informações do livro pelo ID
    $livro = $this->find($id);

    
    if ($livro) {
        // Verifica se o livro está disponível
        if ($livro['disponivel'] == 1) {
            // Atualiza o status do livro para reservado
            $livro['disponivel'] = 0; // Assumindo que 0 significa reservado
            $this->update($id, $livro);

            
            return true;
        } else {
        
            return false;
        }
    } else {
   
        return false;
    }
}
}