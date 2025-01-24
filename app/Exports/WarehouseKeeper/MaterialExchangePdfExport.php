<?php

namespace App\Exports\WarehouseKeeper;

use App\Models\MaterialExchange;
use App\Services\WarehouseKeeper\MaterialExchangeService;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MaterialExchangePdfExport implements FromView
{
    public function __construct($request)
    {
        $this->request = $request;
    }

    public function view(): View
    {
        $filter = $this->request->validated();

        $data = (new MaterialExchangeService(new MaterialExchange()))->getAll($filter);

        return view('WarehouseKeeper/material-exchange-pdf', [
            'data' => $data,
            'withWorkers' => (bool) $this->request->get('with_workers')
        ]);
    }
}
