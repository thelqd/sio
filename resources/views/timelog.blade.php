<x-header />
<div>
    <form method="post" action="/timelog/">
        @csrf
        @method('POST')
        <label for="freelancer">Freelancer: </label>
        <select name="freelancer" id="freelancer">
            @foreach($freelancers as $freelancer)
                <option value="{{$freelancer->id}}">{{$freelancer->name}}</option>
            @endforeach
        </select>
        <label for="date">Datum (TT.MM.JJJJ):</label>
        <input type="text" name="date" id="date" value="{{$date ?? ''}}" />
        <label for="startTime">Startzeit: </label>
        <select name="startTime" id="startTime">
            @for($i=0; $i < 24; $i++)
                <option value="{{$i}}">{{$i}} Uhr</option>
            @endfor
        </select>
        <label for="endTime">Endzeit: </label>
        <select name="endTime" id="endTime">
            @for($i=0; $i < 24; $i++)
                <option value="{{$i}}">{{$i}} Uhr</option>
            @endfor
        </select>
        <input type="hidden" name="projectId" value="{{$projectId}}" />
        <input type="submit" value="Erfassen" />
    </form>
</div>
<x-footer />
