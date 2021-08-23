<x-header />
<div>
    Bitte Projekt w&auml;hlen:<br />
    @foreach($projects as $project)
        <a href="{{ route($url, ['projectId' => $project->id]) }}">{{$project->name}}</a><br />
    @endforeach
</div>
<x-footer />
