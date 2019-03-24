<!DOCTYPE html>
<html>
    
<head>
    <title>Season Report {{\Carbon\Carbon::now()->format('Y-m')}}</title>
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
            <h3><strong>SEASON {{$season->id}} RICE PRODUCTION REPORT</strong></h3>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <strong>
                <p>City of Sta. Rosa</p>
                <p>Cropping Season: {{$season->season_types->type}}</p>
                <p>Season Start: {{$season->season_start}}</p>
                <p>Season End: {{$season->season_end}}</p>
                </strong>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped">
                    <thead>
                        <th width="11.25">Barangay</th>
                        <th width="11.25">Planned Hectares</th>
                        <th width="11.25">Planned No. of Farmers</th>
                        <th width="11.25">Planned Quantity</th>
                        <th width="11.25">Actual Hectares</th>
                        <th width="11.25">Actual No. of Farmers</th>
                        <th width="11.25">Actual Quantity</th>
                    </thead>
                    <tbody>
                        @foreach ($lists as $data)
                        <tr>
                            @php
                                $barangay = App\Barangay::findOrFail($data->barangays_id);
                            @endphp
                            <td>{{$barangay->name}}</td>                            
                            <td>{{$data->planned_hectares}}</td>
                            <td>{{$data->planned_num_farmers}}</td>
                            <td>{{$data->planned_qty}}</td>
                            <td>{{$data->actual_hectares}}</td>
                            <td>{{$data->actual_num_farmers}}</td>
                            <td>{{$data->actual_qty}}</td>
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