<?php

namespace App\Http\Controllers\WarehouseKeeper;

use App\Exports\WarehouseKeeper\MaterialExchangeExcelExport;
use App\Exports\WarehouseKeeper\MaterialExchangePdfExport;
use App\Http\Controllers\BaseIndexController;
use App\Http\Requests\WarehouseKeeper\MaterialExchangeExportRequest;
use App\Http\Requests\WarehouseKeeper\MaterialExchangeFilterRequest;
use App\Models\MaterialExchange;
use App\Services\WarehouseKeeper\MaterialExchangeService;
use Maatwebsite\Excel\Facades\Excel;

class MaterialExchangeController extends BaseIndexController
{
    public function __construct(MaterialExchangeService $service)
    {
        $this->service = $service;
        $this->filterRequest = MaterialExchangeFilterRequest::class;
    }

    public function export(MaterialExchangeExportRequest $request)
    {
        if($request->query->get('format') === 'pdf')
        {
            $html = view('WarehouseKeeper/material-exchange-pdf',
                [
                    'data' => (new MaterialExchangeService(new MaterialExchange()))->getAll($request->validated()),
                    'withWorkers' => (bool) $request->get('with_workers')
                ]
            )->render();

            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            return $mpdf->Output('material-exchange.pdf', 'D');
        }

        else
            return Excel::download(new MaterialExchangeExcelExport($request), 'material-exchange.xlsx');
    }
}
