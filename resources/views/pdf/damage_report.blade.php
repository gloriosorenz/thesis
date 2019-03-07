<!DOCTYPE html>
<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<head>
	<title>Hi</title>
</head>
<body>
    <h1>Damage Report</h1>
    <h2>{{$dreport->regions->name}} - {{$dreport->provinces->name}}</h2>
    <p>Calamity: {{$dreport->calamity}}</p>
    <p>Narrative: {{$dreport->narrative}}</p>


    @foreach ($dlists as $d)
    <p>ID: {{$d->id}}</p>
    <p>Crop: {{$d->crop}}</p>
    <p>Crop Stage: {{$d->crop_stage}}</p>
    <p>Production: {{$d->production}}</p>
    <p>Animal: {{$d->animal}}</p>
    <p>Animal Head: {{$d->animal_head}}</p>
    <p>Fish: {{$d->fish}}</p>
    <p>Area: {{$d->area}}</p>
    <p>Fish Pieces: {{$d->fish_pieces}}</p>
    <br>
    @endforeach
  
</body>
</html>