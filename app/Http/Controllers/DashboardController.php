<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\RiceFarmer;
use App\Customer;
use App\Season;
use App\SeasonList;
use Khill\Lavacharts\Lavacharts;



class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::count();
        $seasons = Season::count();

        // $product_lists = ProductList::where('products_id', '!=', 3) 
        //                 ->where('curr_quantity', '>', 0)
        //                 ->get();

        $farmers = User::where('roles_id','=',2)
            ->count();

        // dd($users);

        $lava = new Lavacharts;
        $season_start = Season::count();

        $data = $lava->DataTable();

        $data->addDateColumn('Day of Month')
            ->addNumberColumn('Rice')
            ->addNumberColumn('Withered');

        for ($a = 1; $a < 30; $a++) {
                $rowData = [
                "2017-4-$a", rand(200,500), rand(200,500)
                ];
        // Random Data For Example
        // for ($a = 1; $a < 30; $a++) {
        //     $rowData = [
        //     "2017-4-$a", rand(800,1000), rand(800,1000)
        //     ];

            $data->addRow($rowData);
}

        $lava->LineChart('Stocks', $data, [
            'title' => 'Product Sale',
            'animation' => [
                'startup' => true,
                'easing' => 'inAndOut'
            ],
            'colors' => ['#3CB371', '#FFD700']
        ]);

        return view('dashboard')
            ->with('farmers',$farmers)
            ->with('lava',$lava)
            ->with('data',$data)

            ->with('seasons', $seasons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
