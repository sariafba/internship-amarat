<!DOCTYPE html>
<html>
<body>
<table>
    <thead>
    <tr>
        <th>المشروع</th>
        <th>النموذج</th>
        <th>القطعة</th>
        <th>البناء</th>
        <th>الطابق</th>
        <th>العمل</th>
        <th>عمال</th>
        @if($withWorkers)
            <th>الاسم</th>
            <th>المدة</th>
        @endif
    </tr>
    </thead>
    <tbody>
    @foreach($data as $mission)
        <tr>
            <td>{{ $mission->work->construction->piece->pattern->project->name }}</td>
            <td>{{ $mission->work->construction->piece->pattern->name }}</td>
            <td>{{ $mission->work->construction->piece->name }}</td>
            <td>{{ $mission->work->construction->name }}</td>
            <td>{{ $mission->work->floorName->name }}</td>
            <td>{{ $mission->work->workType->name }}</td>
            <td>{{ $mission->materialExchangeWorkers->isNotEmpty() ? 'يوجد' : 'لا يوجد' }}</td>
        </tr>
        @if($withWorkers)
            @if($mission->materialExchangeWorkers->isNotEmpty())
                @foreach($mission->materialExchangeWorkers as $worker)
                    <tr>
                        <td colspan="7"></td>
                        <td>{{ $worker->worker->name }}</td>
                        <td>{{ $worker->duration === 'day' ? 'يوم' : 'نصف يوم'}}</td>
                    </tr>
                @endforeach
            @endif
        @endif
    @endforeach
    </tbody>
</table>
</body>
</html>
