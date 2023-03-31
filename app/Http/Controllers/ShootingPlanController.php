<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShootingPlan;
use Validator;
use Illuminate\Support\Facades\Auth;

class ShootingPlanController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */

    // 登録済み一覧画面 --------------------------------------------
    public function index(Request $request)
    {
        // ログインユーザーのIDを取得
        $userId = $request->user()->id;

        // ログインユーザーの発注用プランを取得
        $plans = ShootingPlan::where('pilot_id', $userId)->get();

        // ビューにデータを渡す
        return view('shooting_plan.index', ['plans' => $plans]);
    }

    /**
     * @return \Illuminate\Http\Response
     */

    // プラン登録画面遷移 ----------------------------------------------
    public function create()
    {
        return view('shooting_plan.create');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */




    //プランの登録処理-----------------------------------------------
    public function store(Request $request)
    {
        // バリデーション
        $validator = Validator::make($request->all(), [
            'plan_name' => 'required|max:255',
            'plan_detail' => 'required | max:500',
            'plan_fee' => 'required|integer',
            'application_date' => 'required|date',
            'shooting_date' => 'required|date',
            'delivery_date' => 'required|date',
        ]);
        // バリデーションに引っかかった場合実行される
        if ($validator->fails()) {
            return redirect()
                ->route('shooting_plan.create')
                ->withInput()
                ->withErrors($validator);
        }

        session()->flash('success', '新しいプランが作成されました。');
        // create()は最初から用意されている関数
        // 戻り値は挿入されたレコードの情報
        $data = $request->merge(['pilot_id' => Auth::user()->id])->all();
        $result = ShootingPlan::create($data);
        return redirect()->route('pilot.shooting_plan.index');
    }




    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  プラン詳細画面 -----------------------------------------
    public function show($id)
    {
        $plan = ShootingPlan::find($id);
        return view('shooting_plan.show', compact('plan'));
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




    // プラン編集画面 ------------------------------------------
    public function edit($id)
    {
        $plan = ShootingPlan::find($id);
        return view('shooting_plan.edit', compact('plan'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




    // プラン更新 ------------------------------------------------------
    public function update(Request $request, $id)
    {
        // バリデーション
        $validator = Validator::make($request->all(), [
            'plan_name' => 'required|max:255',
            'plan_detail' => 'required | max:500',
            'plan_fee' => 'required|integer',
            'application_date' => 'required|date',
            'shooting_date' => 'required|date',
            'delivery_date' => 'required|date',
        ]);
        // バリデーションに引っかかった場合実行される
        if ($validator->fails()) {
            return redirect()
                ->route('shooting_plan.create')
                ->withInput()
                ->withErrors($validator);
        }
        //データ更新処理
        $result = ShootingPlan::find($id)->update($request->all());
        return redirect()->route('pilot.shooting_plan.index');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




    //プラン削除機能------------------------------------------------------
    public function destroy($id)
    {
        $result = ShootingPlan::find($id)->delete();
        return redirect()->route('pilot.shooting_plan.index');
    }
}
