<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\BaseCRUDController;
use App\Http\Requests\Supervisor\MaterialExchangeWorkerFilterRequest;
use App\Http\Requests\Supervisor\MaterialExchangeWorkerStoreRequest;
use App\Services\Supervisor\MaterialExchangeWorkerService;

class MaterialExchangeWorkerController extends BaseCRUDController
{
    public function __construct(MaterialExchangeWorkerService $service)
    {
        $this->service = $service;
        $this->filterRequest = MaterialExchangeWorkerFilterRequest::class;
        $this->createRequest = MaterialExchangeWorkerStoreRequest::class ;
    }
}
