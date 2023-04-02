<x-pilot-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Tweet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('common.errors')
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="text-center mb-6 uppercase font-bold text-lg text-grey-darkest">{{ __('ポートフォリオに登録') }}</div>

                            <div>
                                <form method="POST" action="{{ route('pilot.portfolio.store') }}">
                                    @csrf
                                    <div class="flex flex-col mb-4">
                                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="portfolio_url">{{ __('ポートフォリオURL') }}</label>
                                        <input class="border py-2 px-3 text-grey-darkest" id="portfolio_url" type="text" class="form-control @error('portfolio_url') is-invalid @enderror" name="portfolio_url" value="{{ old('portfolio_url') }}" required autocomplete="portfolio_url" autofocus>
                                        <!-- //バリデーションエラー -->
                                        @error('plan_name')
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                            追加
                                        </button>
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