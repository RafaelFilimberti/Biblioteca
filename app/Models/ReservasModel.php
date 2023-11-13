<?php

namespace App\Models;

use App\Entities\Reservaservice;
use CodeIgniter\Model;

class ReservasModel extends Model
{
public function reservarLivro($livroId)
{
    // Recupera as informações do livro pelo ID
    $livro = $this->find($livroId);

    // Verifica se o livro existe
    if ($livro) {
        // Verifica se o livro está disponível
        if ($livro['disponivel'] == 1) {
            // Atualiza o status do livro para reservado
            $livro['disponivel'] = 0; // Assumindo que 0 significa reservado
            $this->update($livroId, $livro);

            // Retorno livro foi reservado com sucesso
            return true;
        } else {
            // Retorno não estiver disponível
            return false;
        }
    } else {
        // Retorna false se o livro não for encontrado
        return false;
    }
}
}