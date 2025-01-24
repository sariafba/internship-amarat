<?php

namespace App\Http\Controllers\WarehouseKeeper;

use App\Http\Controllers\BaseIndexController;
use App\Services\WarehouseKeeper\SupervisorService;

class SupervisorController extends BaseIndexController
{
    public function __construct(SupervisorService $service)
    {
        $this->service = $service;
    }

}
