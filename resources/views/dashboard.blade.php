@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
    <!-- Begin Page Content -->
    {{-- <div class="container-fluid"> --}}
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
              {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
            </div>

            <h5> Hi {{ Auth::user()->first_name }}!</h5>


          

            <br>
      

                

        @if(Auth::user()->roles_id == 1)

        <!-- Content Row -->
        <div class="row">

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Farmer Groups</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $farmers }}</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

  
              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Number of Orders (Season {{$last_com_season->id}} )</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$complete_orders}}</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pending Orders</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pending_orders}}</div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-hashtag fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
  
              <!-- Earnings (Monthly) Card Example -->
              {{-- <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Season 4 Progresion</div>
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">100%</div>
                          </div>
                          <div class="col">
                            <div class="progress progress-sm mr-2">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div> --}}
  
              <!-- Pending Requests Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Cancelled Orders</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$cancomorders}}</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-file fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

        </div>
          
  
        <!-- Content Row -->
        <div class="row">

              <!-- Area Chart -->
              <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Total Order Overview</h6>
                    
                  </div>

                  <!-- Total Order Overview -->
                  <div class="card-body">
                      {!! Charts::styles() !!}
                      <div class="container">
                        <div class="app">
                            <center>
                                {!! $totalorderline->html() !!}
                            </center>
                        </div>
                      </div>
                        {!! Charts::scripts() !!}
                        {!! $totalorderline->script() !!}
                  </div>

                </div>
              </div>
  
            <!-- Pie Chart -->
            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Product Output for Season {{$last_com_season->id}}</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    {!! Charts::styles() !!}
                  <div class="container">
                    <div class="app">
                        <center>
                            {!! $prodoppie->html() !!}
                        </center>
                    </div>
                  </div>
                    <!-- End Of Main Application -->
                    {!! Charts::scripts() !!}
                    {!! $prodoppie->script() !!}
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Most Valuable Customers (MVC)</h6>
                </div>

                <div class="card-body">
                    {!! Charts::styles() !!}
                  <div class="container">
                    <div class="app">
                        <center>
                            {!! $mvcbarchart->html() !!}
                        </center>
                    </div>
                  </div>
                    <!-- End Of Main Application -->
                    {!! Charts::scripts() !!}
                    {!! $mvcbarchart->script() !!}
                    
                  </div>
              </div>
            </div>

            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Best Selling Farmer</h6>
                  </div>

                  <div class="card-body">
                      {!! Charts::styles() !!}
                    <div class="container">
                      <div class="app">
                          <center>
                              {!! $bestfarmerbarchart->html() !!}
                          </center>
                      </div>
                    </div>
                      <!-- End Of Main Application -->
                      {!! Charts::scripts() !!}
                      {!! $bestfarmerbarchart->script() !!}   
                    </div>
                </div>
            </div>
        
        </div>































                  <!-- FARMER DASHBOARD -->
                  @elseif(Auth::user()->roles_id == 2)

                  <div class="row">

                      <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Current Season </div>
                                    @php
                                      $seasonstatus = App\SeasonStatus::findOrFail($curr_season->season_statuses_id);
                                    @endphp
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Season {{ $curr_season->id }} ({{ $seasonstatus->status }})</div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
        
            
                      <!-- Earnings (Monthly) Card Example -->
                      <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pending Orders  </div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendordperfarmer }}</div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Incomplete Confirmed Orders  </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $confordperfarmer }}</div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-file fa-2x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
          
              
                      <!-- Earnings (Monthly) Card Example -->
                      <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Current Income (Season {{$curr_seasonid}})</div>
                                @foreach ($ricesoldpricurrseason as $rspcs)
                                  <div class="h5 mb-0 font-weight-bold text-gray-800"> {{presentPrice($rspcs)}}</div>

                                @endforeach
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>


                  </div>
                  

              
              <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-6 col-lg-6">
                  <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Production Overview</h6>
                      
                    </div>

                    <!-- Total Order Overview -->
                    <div class="card-body">
                        {!! Charts::styles() !!}
                        <div class="container">
                          <div class="app">
                              <center>
                                  {!! $riceprodline->html() !!}
                              </center>
                          </div>
                        </div>
                          {!! Charts::scripts() !!}
                          {!! $riceprodline->script() !!}
                    </div>

                    <!-- Total Order Overview -->
                    <div class="card-body">
                      {!! Charts::styles() !!}
                      <div class="container">
                        <div class="app">
                            <center>
                                {!! $origcurrprodbar->html() !!}
                            </center>
                        </div>
                      </div>
                        {!! Charts::scripts() !!}
                        {!! $origcurrprodbar->script() !!}
                    </div>

                  </div> <!--End card -->
                </div> <!-- End col -->




                <div class="col-xl-6 col-lg-6">
                    <div class="card shadow mb-4">

                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary">Product Sales Overview</h6>
                        </div>

                      <!-- Card Header - Dropdown -->
                      <!-- Total Order Overview -->
                    <div class="card-body">
                        {!! Charts::styles() !!}
                        <div class="container">
                          <div class="app">
                              <center>
                                  {!! $orderlinechart->html() !!}
                              </center>
                          </div>
                        </div>
                          {!! Charts::scripts() !!}
                          {!! $orderlinechart->script() !!}
                    </div>

                    <div class="card-body">
                      {!! Charts::styles() !!}
                      <div class="container">
                        <div class="app">
                            <center>
                                {!! $revlinechart->html() !!}
                            </center>
                        </div>
                      </div>
                        {!! Charts::scripts() !!}
                        {!! $revlinechart->script() !!}
                    </div>

                  </div>
                </div>

                
              </div> <!-- End row -->

                  <!-- Column 2 for Farmer -->

                  <div class="row">
                
                  

                  </div>
              
  

            
            <!-- Content Row -->
            {{-- <div class="row"> --}}
  
              <!-- Content Column -->
              {{-- <div class="col-lg-6 mb-4"> --}}
  
                <!-- Project Card Example -->
                {{-- <div class="card shadow mb-4">
                  <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Season {{$seasons}}</h6>
                  </div>
                  <div class="card-body">
                    <h4 class="small font-weight-bold">Farmer 1 <span class="float-right">20%</span></h4>
                    <div class="progress mb-4">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Farmer 2 <span class="float-right">40%</span></h4>
                    <div class="progress mb-4">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Farmer 3 <span class="float-right">60%</span></h4>
                    <div class="progress mb-4">
                      <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Farmer 4<span class="float-right">80%</span></h4>
                    <div class="progress mb-4">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Farmer 5 <span class="float-right">Complete!</span></h4>
                    <div class="progress">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
  
                <!-- Color System -->
                <div class="row">
                  <div class="col-lg-6 mb-4">
                    <div class="card bg-primary text-white shadow">
                      <div class="card-body">
                        Primary
                        <div class="text-white-50 small">#4e73df</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                    <div class="card bg-success text-white shadow">
                      <div class="card-body">
                        Success
                        <div class="text-white-50 small">#1cc88a</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                    <div class="card bg-info text-white shadow">
                      <div class="card-body">
                        Info
                        <div class="text-white-50 small">#36b9cc</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                    <div class="card bg-warning text-white shadow">
                      <div class="card-body">
                        Warning
                        <div class="text-white-50 small">#f6c23e</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                    <div class="card bg-danger text-white shadow">
                      <div class="card-body">
                        Danger
                        <div class="text-white-50 small">#e74a3b</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                    <div class="card bg-secondary text-white shadow">
                      <div class="card-body">
                        Secondary
                        <div class="text-white-50 small">#858796</div>
                      </div>
                    </div>
                  </div>
                </div>
  
              </div>
  
              <div class="col-lg-6 mb-4"> --}}
  
                <!-- Illustrations -->
                {{-- <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                  </div>
                  <div class="card-body">
                    <div class="text-center">
                      <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
                    </div>
                    <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>
                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw &rarr;</a>
                  </div>
                </div> --}}
  
                <!-- Approach -->
                {{-- <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Notifications</h6>
                  </div>
                  <div class="card-body">
                    <p>{{auth()->user()->notifications}}</p>
                    <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
                  </div>
                </div> --}}
  
              {{-- </div> --}}
            {{-- </div> --}}

          {{-- </div> --}}
          <!-- /.container-fluid -->
  
        {{-- </div> --}}
        <!-- End of Main Content -->
  
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Your Website 2019</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
  
      </div>
      <!-- End of Content Wrapper -->
      @endif
</div>
@endsection


