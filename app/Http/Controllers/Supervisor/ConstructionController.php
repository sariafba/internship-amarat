<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\BaseIndexController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Supervisor\ConstructionFilterRequest;
use App\Models\Construction;
use App\Services\Supervisor\ConstructionService;

class ConstructionController extends BaseIndexController
{
    public function __construct(ConstructionService $service)
    {
        $this->service = $service;
        $this->filterRequest = ConstructionFilterRequest::class;
    }

}
