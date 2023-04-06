<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pilot;
use App\Models\Portfolio;
use Auth;

class PilotListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pilots = Pilot::with(['pilotPortfolios', 'pilotShootingPlans'])->paginate(3);
        // return view('pilot_list.index', ['pilots' => $pilots]);

        $pilots = Pilot::with(['pilotPortfolios', 'pilotShootingPlans'])->paginate(3);
        // $portfolios = Portfolio::all()->paginate(3);
        $user = Auth::user();
        return view('pilot_list.index', ['pilots' => $pilots,  'user' => $user]);
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
        $pilot = Pilot::with(['pilotPortfolios', 'pilotShootingPlans'])->find($id);
        $user = Auth::user();
        return view('pilot_list.show', compact('pilot', 'user'));
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
