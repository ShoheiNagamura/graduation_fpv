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
                        <div class="mb-8">
                            <h2 class="mb-6 uppercase text-xl font-bold text-center text-grey-darkest">パイロット詳細</h2>
                            <div class="flex flex-wrap w-full mb-8">
                                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-3/5 px-4">
                                    <p class="text-left font-bold text-lg text-grey-dark">名前</p>
                                    <p class="m-6 text-lg">{{$pilot->name}}({{$pilot->age}})</p>
                                    <p class="text-left mb-4 font-bold text-lg text-grey-dark">活動拠点</p>
                                    <p class="m-6 text-lg">{{$pilot->work_area}}</p>
                                    <p class="text-left font-bold text-lg text-grey-dark">PRメッセージ</p>
                                    <p class="text-lg m-6"> {{$pilot->message_pr}}</p>
                                    <p class="text-left font-bold text-lg text-grey-dark">実績</p>
                                    <p class="text-lg m-6">{{$pilot->achievement}}</p>
                                </div>

                                <div class="sm:w-1/2 md:w-1/2 lg:w-2/5">
                                    <img class="rounded-full overflow-hidden w-300 h-300" src=" {{ asset('storage/' . $pilot->user_image) }}">
                                </div>
                            </div>

                            <h2 class="mb-6 uppercase font-bold text-xl text-center text-grey-darkest">作品</h2>
                            <div class="flex flex-wrap -mx-2 mt-6">
                                @foreach ($pilot->pilotPortfolios as $portfolio)
                                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3 px-4 mb-8"><iframe width="400" height="245" src="{{$portfolio->portfolio_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
                                @endforeach
                            </div>
                        </div>

                        <h2 class="mt-8 mb-4 uppercase font-bold text-center text-xl text-grey-darkest border-b-2 border-fuchsia-600">プラン一覧</h2>

                        <div class="flex flex-wrap -mx-2">
                            @foreach ($pilot->pilotShootingPlans as $ShootingPlans)
                            <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3 px-4 mb-8 border hover:bg-grey-lighter">
                                <div class="py-4 px-6 border-b border-grey-light">
                                    <div class="">
                                        <div>
                                            <h4 class="text-left font-bold text-lg text-grey-dark">ID : {{$ShootingPlans->id}}</h4>
                                        </div>
                                        <div>
                                            <h3 class="text-left font-bold text-lg text-grey-dark">プラン名 : {{$ShootingPlans->plan_name}}</h3>
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
                        <div class="mb-8">
                            <h2 class="mb-6 uppercase font-bold text-center text-xl  text-grey-darkest">パイロット詳細</h2>
                            <div class="flex flex-wrap w-full mb-8">
                                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-3/5 px-4">
                                    <p class="text-left font-bold text-lg text-grey-dark">名前</p>
                                    <p class="m-6 text-lg">{{$pilot->name}}({{$pilot->age}})</p>
                                    <p class="text-left mb-4 font-bold text-lg text-grey-dark">活動拠点</p>
                                    <p class="m-6 text-lg">{{$pilot->work_area}}</p>
                                    <p class="text-left font-bold text-lg text-grey-dark">PRメッセージ</p>
                                    <p class="text-lg m-6"> {{$pilot->message_pr}}</p>
                                    <p class="text-left font-bold text-lg text-grey-dark">実績</p>
                                    <p class="text-lg m-6">{{$pilot->achievement}}</p>
                                </div>


                                <div class="sm:w-1/2 md:w-1/2 lg:w-2/5">
                                    <img class="rounded-full overflow-hidden w-300 h-300" src=" {{ asset('storage/' . $pilot->user_image) }}">
                                </div>
                            </div>


                            <h2 class="mb-6 uppercase font-bold text-xl text-center text-grey-darkest">作品</h2>
                            <div class="flex flex-wrap -mx-2 mt-6">
                                @foreach ($pilot->pilotPortfolios as $portfolio)
                                <div class="  w-full sm:w-1/2 md:w-1/2 lg:w-1/3 px-4 mb-8"><iframe width="400" height="245" src="{{$portfolio->portfolio_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
                                @endforeach
                            </div>
                        </div>

                        <h2 class="mb-4 uppercase font-bold text-center text-xl text-grey-darkest border-b-2 border-fuchsia-600">プラン一覧</h2>

                        <div class="flex flex-wrap -mx-2">
                            @foreach ($pilot->pilotShootingPlans as $ShootingPlans)
                            <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3 px-4 mb-8 border hover:bg-grey-lighter">
                                <div class="py-4 px-6 border-b border-grey-light">
                                    <div class="flex">
                                        <div>
                                            <div>
                                                <h4 class="text-left font-bold text-lg text-grey-dark">ID : {{$ShootingPlans->id}}</h4>
                                            </div>
                                            <div>
                                                <h3 class="text-left font-bold text-lg text-grey-dark">プラン名 : {{$ShootingPlans->plan_name}}</h3>
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
                                            <div class="w-30 text-center">
                                                <a href="{{ route('shooting_plan.show',$ShootingPlans->id) }}" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                                    詳細
                                                </a>
                                                <form action="{{ route('orders.store') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="shooting_plan_id" value="{{ $ShootingPlans->id }}">
                                                    <button type="submit" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-blue-500 shadow-lg focus:outline-none hover:bg-gray-800 hover:shadow-none">申し込み</button>
                                                </form>
                                            </div>
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
</x-app-layout>

@endif