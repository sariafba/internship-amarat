<?php

namespace App\Services\Supervisor;

use App\Models\Piece;
use App\Services\BaseService;

class PieceService extends BaseService
{
    public function __construct(Piece $model)
    {
        $this->model = $model;
    }
}
