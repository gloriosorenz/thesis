<!DOCTYPE html>
<html>
<head>
	<title>Hi</title>
</head>
<body>
    <h1>Damage Report</h1>
    <h2>{{$dreport->regions->name}} - {{$dreport->provinces->name}}</h2>
    <p>Calamity: {{$dreport->calamity}}</p>
    <p>Narrative: {{$dreport->narrative}}</p>
    <p>Crop: {{$dreport->crop}}</p>
    <p>Crop Stage: {{$dreport->crop_stage}}</p>
    <p>Production: {{$dreport->production}}</p>
    <p>Animal: {{$dreport->animal}}</p>
    <p>Animal Head: {{$dreport->animal_head}}</p>
    <p>Fish: {{$dreport->fish}}</p>
    <p>Area: {{$dreport->area}}</p>
    <p>Fish Pieces: {{$dreport->fish_pieces}}</p>
</body>
</html>