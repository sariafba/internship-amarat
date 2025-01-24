<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\BaseCRUDController;
use App\Http\Requests\Supervisor\WorkFilterRequest;
use App\Services\Supervisor\WorkService;

class WorkController extends BaseCRUDController
{
    public function __construct(WorkService $service)
    {
        $this->service = $service;
        $this->filterRequest = WorkFilterRequest::class;
    }
}
