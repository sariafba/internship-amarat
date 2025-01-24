<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\BaseIndexController;
use App\Services\Supervisor\WorkerService;

class WorkerController extends BaseIndexController
{
    public function __construct(WorkerService $service)
    {
        $this->service = $service;
    }

}
