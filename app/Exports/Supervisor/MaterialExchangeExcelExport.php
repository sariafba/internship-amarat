<?php

namespace App\Exports\Supervisor;

use App\Models\MaterialExchange;
use App\Services\Supervisor\MaterialExchangeService;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MaterialExchangeExcelExport implements FromView
{
    public function view(): View
    {
        $data = (new MaterialExchangeService(new MaterialExchange()))->getAll();

        return view('supervisor/material-exchange-excel', [
            'data' => $data,
        ]);
    }
}
