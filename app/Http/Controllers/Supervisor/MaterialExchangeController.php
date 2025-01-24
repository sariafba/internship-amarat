<?php

namespace App\Http\Controllers\Supervisor;


use App\Exports\Supervisor\MaterialExchangeExcelExport;
use App\Exports\Supervisor\MaterialExchangePdfExport;
use App\Http\Controllers\BaseCRUDController;
use App\Http\Requests\Supervisor\MaterialExchangeExportRequest;
use App\Http\Requests\Supervisor\MaterialExchangeStoreRequest;
use App\Models\MaterialExchange;
use App\Services\Supervisor\MaterialExchangeService;
use Maatwebsite\Excel\Facades\Excel;

class MaterialExchangeController extends BaseCRUDController
{
    public function __construct(MaterialExchangeService $service)
    {
        $this->service = $service;
        $this->createRequest = MaterialExchangeStoreRequest::class ;
        $this->updateRequest = MaterialExchangeStoreRequest::class ;
    }

    public function export(MaterialExchangeExportRequest $request)
    {
        if($request->query->get('format') === 'pdf')
        {
            $html = view('supervisor/material-exchange-pdf', [
                    'data' => (new MaterialExchangeService(new MaterialExchange()))->getAll(),
                ]
            )->render();

            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            return $mpdf->Output('material-exchange.pdf', 'D');
        }

        else
            return Excel::download(new MaterialExchangeExcelExport(), 'material-exchange.xlsx');
    }
}
