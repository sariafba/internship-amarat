<?php

namespace App\Services\Supervisor;

use App\Models\Construction;
use App\Services\BaseService;

class ConstructionService extends BaseService
{
    public function __construct(Construction $model)
    {
        $this->model = $model;
    }

}
