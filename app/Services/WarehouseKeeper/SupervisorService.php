<?php

namespace App\Services\WarehouseKeeper;

use App\Models\Supervisor;
use App\Services\BaseService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SupervisorService extends BaseService
{
    public function __construct(Supervisor $model)
    {
        $this->model = $model;
    }

    public function getAll($filters = [])
    {

        return DB::table('material_exchanges')
            ->join('supervisors', 'material_exchanges.supervisor_id', '=', 'supervisors.id')
            ->select('material_exchanges.supervisor_id', 'supervisors.name',
                DB::raw("DATE(material_exchanges.created_at) as date"),
                DB::raw('COUNT(*) as missions_count')
            )
            ->groupBy('material_exchanges.supervisor_id', 'supervisors.name', 'date')
            ->orderBy('date', 'desc')
            ->get()
            ->groupBy(function ($exchange) {
                return $exchange->date === today()->toDateString() ? 'today' : 'other_days';
            });


//        return DB::table('material_exchanges')
//            ->select(DB::raw('DATE(created_at) as date'),
//                DB::raw('COUNT(*) as count'))->groupBy('date')->get();

//        return MaterialExchange::query()
//            ->whereDay('created_at', today())
//            ->with(['supervisor'])
//            ->get();
    }


}
