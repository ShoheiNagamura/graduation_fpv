<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;


class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // ログインユーザーのIDを取得
        $userId = $request->user()->id;

        // ログインユーザーの発注用プランを取得
        $portfolios = Portfolio::where('pilot_id', $userId)->paginate(3);

        // ビューにデータを渡す
        return view('portfolio.index', ['portfolios' => $portfolios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション
        $validator = Validator::make($request->all(), [
            'portfolio_url' => 'required|max:255',
        ]);
        // バリデーションに引っかかった場合実行される
        if ($validator->fails()) {
            return redirect()
                ->route('portfolio.create')
                ->withInput()
                ->withErrors($validator);
        }

        session()->flash('success', 'ポートフォリオに追加されました');
        // create()は最初から用意されている関数
        // 戻り値は挿入されたレコードの情報
        $data = $request->merge(['pilot_id' => Auth::user()->id])->all();



        // iframeで読み込めないため、対応できるよう書き換える
        $url = $data['portfolio_url'];
        $converted_url = str_replace('https://youtu.be/', 'https://www.youtube.com/embed/', $url);
        $data['portfolio_url'] = $converted_url;


        $result = Portfolio::create($data);
        return redirect()->route('pilot.portfolio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $portfolio = Portfolio::find($id);
        return view('portfolio.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfolio = Portfolio::find($id);
        return view('portfolio.edit', compact('portfolio'));
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
        // バリデーション
        $validator = Validator::make($request->all(), [
            'portfolio_url' => 'required|max:255',
        ]);
        // バリデーションに引っかかった場合実行される
        if ($validator->fails()) {
            return redirect()
                ->route('portfolio.edit')
                ->withInput()
                ->withErrors($validator);
        }
        //データ更新処理
        $result = Portfolio::find($id)->update($request->all());
        return redirect()->route('pilot.portfolio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Portfolio::find($id)->delete();
        return redirect()->route('pilot.portfolio.index');
    }
}
