<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <h2>BirdBoard</h2>
        <ul>
            @foreach($projects as $project)
                <li>{{$project->title}}</li>
            @endforeach
        </ul>
    </body>
</html>
