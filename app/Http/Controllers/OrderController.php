<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShootingPlan;
use App\Models\Order;
use App\Models\Pilot;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Auth_id = Auth::id();
        $data = Pilot::with('pilotShootingPlans.orders.user')->find($Auth_id);
        return view('pilot.pilot_dashboard', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ログインしているユーザー情報
        $user_id = $request->user()->id;
        //申し込むプランのID
        $shooting_plan_id = $request->input('shooting_plan_id');
        // 申込日
        $today = now();

        $data = [
            'shooting_plan_id' => $shooting_plan_id,
            'user_id' => $user_id,
            'application_date' => $today
        ];

        Order::create($data);
        return view('user_dashboard');
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
