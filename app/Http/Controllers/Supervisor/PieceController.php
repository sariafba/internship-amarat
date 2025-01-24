<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\BaseIndexController;
use App\Http\Requests\Supervisor\PieceFilterRequest;
use App\Services\Supervisor\PieceService;

class PieceController extends BaseIndexController
{
    public function __construct(PieceService $service)
    {
        $this->service = $service;
        $this->filterRequest = PieceFilterRequest::class;
    }
}
