<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\BaseIndexController;
use App\Http\Controllers\Controller;
use App\Services\Supervisor\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends BaseIndexController
{
    public function __construct(ProjectService $service)
    {
        $this->service = $service;
    }
}
