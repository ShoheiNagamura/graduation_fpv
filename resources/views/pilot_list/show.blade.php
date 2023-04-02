<x-pilot-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Tweet Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <div class="flex flex-col mb-4">
                            <h2 class="mb-4 uppercase font-bold text-lg text-grey-darkest">パイロット詳細</h2>
                            <div>
                                <h3 class="text-left font-bold text-lg text-grey-dark">撮影者：{{$pilot->name}}({{$pilot->age}})</h3>
                                <h3 class="text-left font-bold text-lg text-grey-dark">活動拠点：{{$pilot->work_area}}</h3>
                            </div>

                            @foreach ($pilot->pilotPortfolios as $portfolio)
                            <iframe width="560" height="315" src="{{$portfolio->portfolio_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            @endforeach
                        </div>
                        <a href="{{ url()->previous() }}" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-pilot-layout>