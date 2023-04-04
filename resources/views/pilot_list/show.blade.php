<!-- //カラムにtype追加判定に使う -->

<!-- パイロットユーザー -->
@if ($user->type === 1)
<x-pilot-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl text-gray-800 leading-tight">
            {{ __('パイロットの詳細') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <div class="flex flex-col mb-4">
                            <h2 class="mb-4 uppercase font-bold text-center text-grey-darkest">パイロット詳細</h2>
                            <div>
                                <h3 class="text-left font-bold text-lg text-grey-dark">お名前：{{$pilot->name}}({{$pilot->age}})</h3>
                                <h3 class="text-left font-bold text-lg text-grey-dark">活動拠点：{{$pilot->work_area}}</h3>
                            </div>

                            <div class="flex">
                                @foreach ($pilot->pilotPortfolios as $portfolio)
                                <div class="flex-1"><iframe width="400" height="245" src="{{$portfolio->portfolio_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
                                @endforeach
                            </div>
                        </div>

                        <h2 class="mb-4 uppercase font-bold text-lg text-grey-darkest">プラン一覧</h2>

                        <div class="flex">
                            @foreach ($pilot->pilotShootingPlans as $ShootingPlans)
                            <div class="flex-1 hover:bg-grey-lighter">
                                <div class="py-4 px-6 border-b border-grey-light">
                                    <div class="">
                                        <div>
                                            <h4 class="text-left font-bold text-lg text-grey-dark">ID : {{$ShootingPlans->id}}</h4>
                                        </div>
                                        <div>
                                            <h3 class="text-left font-bold text-lg text-grey-dark">プラン名 : {{$ShootingPlans->plan_name}}</h3>
                                        </div>
                                        <div>
                                            <p>報酬 : {{number_format($ShootingPlans->plan_fee)}}</p>
                                        </div>
                                        <div>
                                            <p>申込日 : {{$ShootingPlans->application_date}}</p>
                                        </div>
                                        <div>
                                            <p>撮影日 : {{$ShootingPlans->shooting_date}}</p>
                                        </div>
                                        <div>
                                            <p>納品日 : {{$ShootingPlans->delivery_date}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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


<!-- 一般ユーザー -->
@elseif($user->type === 0)

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl text-gray-800 leading-tight">
            {{ __('パイロットの詳細') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <div class="flex flex-col mb-4">
                            <h2 class="mb-4 uppercase font-bold text-center text-grey-darkest">パイロット詳細</h2>
                            <div>
                                <h3 class="text-left font-bold text-lg text-grey-dark">お名前：{{$pilot->name}}({{$pilot->age}})</h3>
                                <h3 class="text-left font-bold text-lg text-grey-dark">活動拠点：{{$pilot->work_area}}</h3>
                            </div>

                            <div class="flex">
                                @foreach ($pilot->pilotPortfolios as $portfolio)
                                <div class="flex-1"><iframe width="400" height="245" src="{{$portfolio->portfolio_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
                                @endforeach
                            </div>
                        </div>

                        <h2 class="mb-4 uppercase font-bold text-lg text-grey-darkest">プラン一覧</h2>

                        <div class="flex">
                            @foreach ($pilot->pilotShootingPlans as $ShootingPlans)
                            <div class="flex-1 hover:bg-grey-lighter">
                                <div class="py-4 px-6 border-b border-grey-light">
                                    <div class="">
                                        <div>
                                            <h4 class="text-left font-bold text-lg text-grey-dark">ID : {{$ShootingPlans->id}}</h4>
                                        </div>
                                        <div>
                                            <h3 class="text-left font-bold text-lg text-grey-dark">プラン名 : {{$ShootingPlans->plan_name}}</h3>
                                        </div>
                                        <div>
                                            <p>報酬 : {{number_format($ShootingPlans->plan_fee)}}</p>
                                        </div>
                                        <div>
                                            <p>申込日 : {{$ShootingPlans->application_date}}</p>
                                        </div>
                                        <div>
                                            <p>撮影日 : {{$ShootingPlans->shooting_date}}</p>
                                        </div>
                                        <div>
                                            <p>納品日 : {{$ShootingPlans->delivery_date}}</p>
                                        </div>
                                        <a href="{{ route('pilot_list.show',$pilot->id) }}" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                            申し込み
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>


                        <a href="{{ url()->previous() }}" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                            戻る
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@endif