<x-pilot-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tweet Index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="text-center w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">登録済みプラン一覧</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pilots as $pilot)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">
                                    @foreach ($pilot->pilotPortfolios as $portfolio)
                                    <iframe width="560" height="315" src="{{$portfolio->portfolio_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    <div>
                                        <h3 class="text-left font-bold text-lg text-grey-dark">撮影者：{{$pilot->name}}({{$pilot->age}})</h3>
                                    </div>
                                    <a href="{{ route('pilot.pilot_list.show',$pilot->id) }}" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                        詳細
                                    </a>
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        {{ $pilots->links() }}
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-pilot-layout>