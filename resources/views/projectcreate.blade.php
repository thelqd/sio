<x-header />
<div>
    <form method="post" action="{{ route('project.add') }}">
        @csrf
        @method('POST')
        <label for="projectName">Projectname: </label>
        <input type="text" name="projectName" id="projectName" />
        <input type="submit" value="Erstellen" />
    </form>
</div>
<x-footer />

