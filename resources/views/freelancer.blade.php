<x-header />
<div>
    <h1>Stunden&uuml;bersicht f&uuml;r {{$freelancer->name}}</h1>
    @foreach($stats as $stat)
        <h2>Project: {{$stat['name']}} - Gesamtstunden: {{$stat['countHours']}}</h2>
        <table>
            <thead>
                <th>Startzeit</th>
                <th>Endzeit</th>
                <th>Stunden</th>
            </thead>
            <tbody>
            @foreach($stat['timeLogs'] as $timeLog)
                <tr>
                    <td>{{$timeLog['startTime']}}</td>
                    <td>{{$timeLog['endTime']}}</td>
                    <td>{{$timeLog['hours']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endforeach
</div>
<x-footer />
