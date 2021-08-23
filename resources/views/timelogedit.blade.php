<x-header />
<div>
    <form method="post" action="/timelog/">
        @csrf
        @method('PATCH')
        <label for="freelancer">Freelancer: </label>
        <select name="freelancer" id="freelancer">
            @foreach($freelancers as $freelancer)
                <option value="{{$freelancer->id}}" @if($freelancerId == $freelancer->id)selected="selected"@endif>{{$freelancer->name}}</option>
            @endforeach
        </select>
        <label for="date">Datum (TT.MM.JJJJ):</label>
        <input type="text" name="date" id="date" value="{{$date}}" />
        <label for="startTime">Startzeit: </label>
        <select name="startTime" id="startTime">
            @for($i=0; $i < 24; $i++)
                <option value="{{$i}}" @if($startTime == $i)selected="selected"@endif>{{$i}} Uhr</option>
            @endfor
        </select>
        <label for="endTime">Endzeit: </label>
        <select name="endTime" id="endTime">
            @for($i=0; $i < 24; $i++)
                <option value="{{$i}}" @if($endTime == $i)selected="selected"@endif>{{$i}} Uhr</option>
            @endfor
        </select>
        <input type="hidden" name="projectId" value="{{$projectId}}" />
        <input type="hidden" name="timeLogId" value="{{$timeLogId}}" />
        <input type="submit" value="Bearbeiten" />
    </form>
</div>
<x-footer />

