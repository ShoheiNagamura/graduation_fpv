<!-- //カラムにtype追加判定に使う -->


@if ($user->type === 1)
<x-pilot-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Tweet Detail') }}
        </h2>
    </x-slot>

    <div class="py-12 flex ">
        <div class="max-w-7xl mx-auto sm:w-2/12 md:w-1/4 lg:w-6/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <div class="flex flex-col mb-4">
                            <h2 class="mb-4 uppercase font-bold text-center text-grey-darkest">パイロット詳細</h2>
                            <div>
                                <h3 class="text-left font-bold text-lg text-grey-dark">お名前：{{$pilot->name}}({{$pilot->age}})</h3>
                                <h3 class="text-left font-bold text-lg text-grey-dark">活動拠点：{{$pilot->work_area}}</h3>
                            </div>

                            <div class="py-4 flex">
                                @foreach ($pilot->pilotPortfolios as $portfolio)
                                <iframe class="mr-2" width="380" height="225" src="{{$portfolio->portfolio_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                @endforeach
                            </div>
                        </div>
                        <a href="{{ url()->previous() }}" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                            戻る
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-pilot-layout>

@elseif($user->type === 0)

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Tweet Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-6/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <div class="flex flex-col mb-4">
                            <h2 class="mb-4 uppercase font-bold text-center text-grey-darkest">パイロット詳細</h2>
                            <div>
                                <h3 class="text-left font-bold text-lg text-grey-dark">お名前：{{$pilot->name}}({{$pilot->age}})</h3>
                                <h3 class="text-left font-bold text-lg text-grey-dark">活動拠点：{{$pilot->work_area}}</h3>
                            </div>

                            <div class="py-4 flex">
                                @foreach ($pilot->pilotPortfolios as $portfolio)
                                <iframe class="mr-2" width="380" height="225" src="{{$portfolio->portfolio_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                @endforeach
                            </div>
                        </div>



                        <h2 class="mb-4 uppercase font-bold text-lg text-grey-darkest">プラン一覧</h2>


                        @foreach ($pilot->pilotShootingPlans as $ShootingPlans)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">

                                <div>
                                    <div>
                                        <h3 class="text-left font-bold text-lg text-grey-dark">{{$ShootingPlans->plan_name}}</h3>
                                    </div>
                                    <div>
                                        <p>{{number_format($ShootingPlans->plan_fee)}}</p>
                                    </div>
                                    <div>
                                        <p>{{$ShootingPlans->application_date}}</p>
                                    </div>
                                    <div>
                                        <p>{{$ShootingPlans->shooting_date}}</p>
                                    </div>
                                    <div>
                                        <p>{{$ShootingPlans->delivery_date}}</p>
                                    </div>
                                    <a href="{{ route('pilot_list.show',$pilot->id) }}" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                        申し込み
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach


                        <a href="{{ url()->previous() }}" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@endif