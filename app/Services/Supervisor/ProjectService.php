<?php

namespace App\Services\Supervisor;

use App\Models\Project;
use App\Services\BaseService;

class ProjectService extends BaseService
{
    public function __construct(Project $model)
    {
        $this->model = $model;
    }
}
