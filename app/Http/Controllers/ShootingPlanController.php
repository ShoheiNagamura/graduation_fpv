<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShootingPlanController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */

    // 登録済み一覧画面 ----------------------------
    public function index()
    {
        return view('shooting_plan.index');
    }

    /**
     * @return \Illuminate\Http\Response
     */

    // プラン登録画面 ---------------------------------
    public function create()
    {
        return view('shooting_plan.create');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //-----------------------------------------------
    public function store(Request $request)
    {
        //
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  プラン詳細画面 ------------------------------------
    public function show($id)
    {
        //
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // プラン編集画面 -------------------------------------
    public function edit($id)
    {
        //
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // ------------------------------------------------
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //-----------------------------------------------------
    public function destroy($id)
    {
        //
    }
}
