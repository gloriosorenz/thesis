<!DOCTYPE html>
<html>
    
<head>
    <title>Damage Report {{\Carbon\Carbon::now()->format('Y-m')}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


</head>
<body>
<div class="wrapper">
        <br>
        <div class="row text-center">
            <div class="col-lg-12">
                <h5><small>CITY COOPERATIVE DEVELOPMENT OFFICE</small> <br>
                    <strong>SAMAHAN NG MAGSASAKA STA. ROSA LAGUNA</strong>
                </h5>
            </div>
        </div>

        <div class="row text-center">
            <h3><strong>RICE PRODUCTION REPORT</strong></h3>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <strong>
                <p>City of Sta. Rosa</p>
                {{-- <p>Cropping Season: {{$season->season_types->type}}</p> --}}
                <p>For the month of {{$preport->created_at->format('M-Y')}}</p>
                {{-- <p>Season End: {{$season->season_end}}</p> --}}
                </strong>
            </div>
        </div>


    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped">
                <thead>
                    <th width="11.25">Barangay</th>
                    <th width="11.25">Plant Area</th>
                    <th width="11.25">Farmers</th>
                </thead>
                <tbody>
                    @foreach ($pdatas as $d)
                    <tr>
                        @php
                            $bang = App\Barangay::findOrFail($d->barangays_id);
                        @endphp

                        <td>{{ $bang->name }}</td>
                        <td>{{ $d->plant_area }}</td>
                        <td>{{ $d->farmers }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- End col-lg-12 -->
    </div>
    <!-- End row -->


    <br>
    <br>

    <div class="row">
        <div class="col-lg-6">
            <p><strong>Submitted By: </strong></p>
        </div>
        <div class="col-lg-6 ">
            <p><strong>Noted By:</strong></p>
        </div>
    </div>
</div>
<!-- End wrapper -->
</body>
</html>

