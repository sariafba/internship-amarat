<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\BaseIndexController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Supervisor\FloorFilterRequest;
use App\Services\Supervisor\FloorNameService;

class FloorNameController extends BaseIndexController
{
    public function __construct(FloorNameService $service)
    {
        $this->service = $service;
        $this->filterRequest = FloorFilterRequest::class;
    }
}
