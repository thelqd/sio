<x-header />
<h1>Stunden&uuml;bersicht: {{$project->name}}</h1>

<table>
    <thead>
        <th>Freelancer</th>
        <th>Begin</th>
        <th>Ende</th>
        <th>Aktionen</th>
    </thead>
    <tbody>
        @foreach($timeLogs as $timeLog)
            <tr>
                <td>{{$timeLog->freelancer->name}}</td>
                <td>{{$timeLog->start_time}}</td>
                <td>{{$timeLog->end_time}}</td>
                <td>
                    <a href="{{ route('timelog.edit', ['projectId' => $project->id, 'timeLogId' => $timeLog->id]) }}">Edit</a>
                    <a href="{{ route('timelog.delete', ['projectId' => $project->id, 'timeLogId' => $timeLog->id]) }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<x-footer />
