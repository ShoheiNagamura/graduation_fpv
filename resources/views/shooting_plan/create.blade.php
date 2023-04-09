<x-pilot-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl text-gray-800 leading-tight">
            {{ __('新しいプランを登録') }}
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
            <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-8/12">
                <div class="bg-white">
                    @include('common.errors') <div class="text-center mb-6 uppercase font-bold text-lg text-grey-darkest">{{ __('プラン情報登録') }}</div>
                    <form method="POST" action="{{ route('pilot.shooting_plan.store') }}" class="flex">
                        @csrf
                        <div class="flex flex-wrap">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="plan_name" for="plan_name">{{ __('プラン名') }}</label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('plan_name') is-invalid @enderror" id="plan_name" type="text" name="plan_name" value="{{ old('plan_name') }}" required autocomplete="plan_name" autofocus> <!-- //バリデーションエラー -->
                                @error('plan_name')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="plan_detail">{{ __('プラン内容') }}</label>
                                <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('plan_detail') is-invalid @enderror" id="plan_detail" name="plan_detail" required>{{ old('plan_detail') }}</textarea>
                                @error('plan_detail')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-wrap">
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="plan_fee">{{ __('料金') }}</label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('plan_fee') is-invalid @enderror" id="plan_fee" type="number" name="plan_fee" value="{{ old('plan_fee') }}" required autocomplete="plan_fee">
                                <!-- バリデーションエラー -->
                                @error('plan_fee')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="application_date">{{ __('申込日') }}</label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('application_date') is-invalid @enderror" id="application_date" type="date" name="application_date" value="{{ old('application_date') }}" required>
                                @error('application_date')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="shooting_date">{{ __('撮影実施日') }}</label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('shooting_date') is-invalid @enderror" id="shooting_date" type="date" name="shooting_date" value="{{ old('shooting_date') }}" required>
                                @error('shooting_date')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="delivery_date">{{ __('納品日') }}</label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('delivery_date') is-invalid @enderror" id="delivery_date" type="date" name="delivery_date" value="{{ old('delivery_date') }}" required>
                                @error('delivery_date')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex justify-center">
                                <button class="bg-black hover:bg-gray-900 text-white font-medium py-3 px-6 rounded-lg shadow-lg focus:outline-none">
                                    プランを作成
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-pilot-layout>