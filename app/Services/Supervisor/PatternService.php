<?php

namespace App\Services\Supervisor;

use App\Models\Pattern;
use App\Services\BaseService;

class PatternService extends BaseService
{
    public function __construct(Pattern $model)
    {
        $this->model = $model;
    }

}
