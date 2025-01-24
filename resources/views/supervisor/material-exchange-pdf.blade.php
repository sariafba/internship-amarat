<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'amiri', sans-serif;
            direction: rtl;
            text-align: right;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 100%;
            padding: 20px;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 15px;
            padding: 15px;
            background-color: #f9f9f9;
            page-break-inside: avoid;
        }
        .card-header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }
        .card-body {
            font-size: 14px;
            line-height: 1.5;
        }
        .item {
            margin-bottom: 5px;
        }
        .item span {
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    @foreach($data as $mission)
        <div class="card">
            <div class="card-header">{{ $mission->work->construction->piece->pattern->project->name }}</div>
            <div class="card-body">
                <div class="item"><span>النموذج:</span> {{ $mission->work->construction->piece->pattern->name }}</div>
                <div class="item"><span>القطعة:</span> {{ $mission->work->construction->piece->name }}</div>
                <div class="item"><span>البناء:</span> {{ $mission->work->construction->name }}</div>
                <div class="item"><span>الطابق:</span> {{ $mission->work->floorName->name }}</div>
                <div class="item"><span>العمل:</span> {{ $mission->work->workType->name }}</div>
                <div class="item"><span>عمال:</span> {{ $mission->materialExchangeWorkers->isNotEmpty() ? 'يوجد' : 'لا يوجد' }}</div>

                @if($mission->materialExchangeWorkers->isNotEmpty())
                    <div class="item"><span>العمال:</span>
                        <ul>
                            @foreach($mission->materialExchangeWorkers as $worker)
                                <li>{{ $worker->worker->name }} - {{ $worker->duration === 'day' ? 'يوم' : 'نصف يوم' }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
</body>
</html>
