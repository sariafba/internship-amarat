<?php

namespace App\Http\Controllers\WarehouseKeeper;

use App\Http\Controllers\BaseIndexController;
use App\Http\Requests\WarehouseKeeper\MaterialExchangeWorkerFilterRequest;
use App\Services\WarehouseKeeper\MaterialExchangeWorkerService;

class MaterialExchangeWorkerController extends BaseIndexController
{
    public function __construct(MaterialExchangeWorkerService $service)
    {
        $this->service = $service;
        $this->filterRequest = MaterialExchangeWorkerFilterRequest::class;
    }

}
