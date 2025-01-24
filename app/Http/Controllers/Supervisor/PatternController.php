<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\BaseIndexController;
use App\Http\Requests\Supervisor\PatternFilterRequest;
use App\Services\Supervisor\PatternService;

class PatternController extends BaseIndexController
{
    public function __construct(PatternService $service)
    {
        $this->service = $service;
        $this->filterRequest = PatternFilterRequest::class;
    }
}
