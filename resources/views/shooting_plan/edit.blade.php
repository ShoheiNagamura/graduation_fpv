<x-pilot-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tweet') }}
        </h2>
    </x-slot>


    <div class="flex justify-center bg-white p-6">
        <div class="w-1/4">
            <div class="flex flex-col justify-start">
                <a href="{{ route('pilot.profile.edit')}}" class="py-2 px-4 text-gray-800 hover:bg-gray-100">基本プロフィール</a>
                <a href="{{route('pilot.pilot_dashboard')}}" class="py-2 px-4 text-gray-800 hover:bg-gray-100">案件受注管理</a>
                <a href="{{route('pilot.shooting_plan.index')}}" class="py-2 px-4 text-gray-800 hover:bg-gray-100">プラン管理</a>
                <a href="{{route('pilot.portfolio.index')}}" class="py-2 px-4 text-gray-800 hover:bg-gray-100">ポートフォリオ管理</a>
                <a href="#" class="py-2 px-4 text-gray-800 hover:bg-gray-100">報酬管理</a>
                <a href="#" class="py-2 px-4 text-gray-800 hover:bg-gray-100">メッセージ</a>
            </div>
        </div>

        <div class="w-3/4">
            <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white">
                        @include('common.errors')
                        <form class="mb-6" action="{{ route('pilot.shooting_plan.update',$plan->id) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="flex flex-col mb-4">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="plan_name">{{ __('プラン名') }}</label>
                                <input class="border py-2 px-3 text-grey-darkest" id="plan_name" type="text" class="form-control @error('plan_name') is-invalid @enderror" name="plan_name" value="{{ $plan->plan_name }}" required autocomplete="plan_name" autofocus>
                                <!-- //バリデーションエラー -->
                                @error('plan_name')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="flex flex-col mb-4">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="plan_detail">{{ __('プラン内容') }}</label>
                                <textarea id="plan_detail" class="form-control @error('plan_detail') is-invalid @enderror" name="plan_detail" required>{{ $plan->plan_detail }}</textarea>
                                <!-- //バリデーションエラー -->
                                @error('plan_detail')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="flex flex-col mb-4">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="plan_fee">{{ __('料金') }}</label>
                                <input id="plan_fee" type="number" class="form-control @error('plan_fee') is-invalid @enderror" name=" plan_fee" value="{{$plan->plan_fee}}" required autocomplete="plan_fee">
                                <!-- //バリデーションエラー -->
                                @error('plan_fee')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="flex flex-col mb-4">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="application_date">{{ __('申込日') }}</label>
                                <input id="application_date" type="date" class="form-control @error('application_date') is-invalid @enderror" name="application_date" value="{{ $plan->application_date }}" required>
                                <!-- //バリデーションエラー -->
                                @error('application_date')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="flex flex-col mb-4">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="shooting_date">{{ __('撮影実施日') }}</label>
                                <input id="shooting_date" type="date" class="form-control @error('shooting_date') is-invalid @enderror" name="shooting_date" value="{{ $plan->shooting_date }}" required>
                                <!-- //バリデーションエラー -->
                                @error('shooting_date')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="flex flex-col mb-4">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="delivery_date">{{ __('納品日') }}</label>
                                <input id="delivery_date" type="date" class="form-control @error('delivery_date') is-invalid @enderror" name="delivery_date" value="{{ $plan->delivery_date }}" required>
                                <!-- //バリデーションエラー -->
                                @error('delivery_date')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="flex justify-evenly">
                                <a href="{{ url()->previous() }}" class="block text-center rounded-md  w-5/12 py-3 mt-6 font-medium tracking-widest text-black uppercase bg-gray-200 shadow-sm focus:outline-none hover:bg-gray-200 hover:shadow-none">
                                    戻る
                                </a>
                                <button type="submit" class="w-5/12 py-3 mt-6 rounded-md font-medium tracking-widest text-white uppercase bg-green-400 shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                    更新
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>









</x-pilot-layout>