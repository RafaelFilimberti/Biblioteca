<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReservasModel;

class reservas extends BaseController
{
    protected $_model;

    public function __construct()
    {
        $this->_model = new ReservasModel();
    }

}