<x-pilot-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ポートフォリオを編集') }}
        </h2>
    </x-slot>

    <div class="flex justify-center bg-white p-6">
        <div class="w-1/4 flex justify-center">
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
                    <div class="p-6 bg-white border-b border-gray-200">
                        @include('common.errors')
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="text-center mb-6 uppercase font-bold text-lg text-grey-darkest">{{ __('ポートフォリオを変更') }}</div>

                                <div>
                                    <form method="POST" action="{{ route('pilot.portfolio.update',$portfolio->id) }}">
                                        @method('put')
                                        @csrf
                                        <div class=" flex flex-col mb-4">
                                            <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="portfolio_url">{{ __('ポートフォリオURL(YouTube)') }}</label>
                                            <input class="border py-2 px-3 text-grey-darkest" id="portfolio_url" type="text" class="form-control @error('portfolio_url') is-invalid @enderror" name="portfolio_url" value="{{ $portfolio->portfolio_url }}" required autocomplete="portfolio_url" autofocus>
                                            <!-- //バリデーションエラー -->
                                            @error('plan_name')
                                            <span role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="flex justify-center">
                                            <div>
                                                <div class="form-group mb-4">
                                                    <button type="submit" class="w-full rounded-md py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                                        更新
                                                    </button>
                                                </div>
                                                <a href="{{ url()->previous() }}" class="rounded-md text-center py-3 px-4 mt-6 font-medium tracking-widest text-black bg-gray-200 uppercase  shadow-lg focus:outline-none hover:bg-gray-800 hover:shadow-none">
                                                    戻る
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-pilot-layout>