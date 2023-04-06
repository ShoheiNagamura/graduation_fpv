<!-- //カラムにtype追加判定に使う -->


<!-- パイロットユーザー -->
@if ($user->type === 1)

<x-pilot-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl text-gray-800 leading-tight">
            {{ __('作品（パイロットリスト）') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="p-4 bg-white">
            <div class="flex flex-wrap -mx-4">
                @foreach ($portfolios as $portfolio)
                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3 px-4 mb-8">
                    <div class="border border-grey-light rounded-lg overflow-hidden">
                        <iframe width="100%" height="225" src="{{$portfolio->portfolio_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <div class="p-4 bg-gray-800">
                            <h3 class="text-lg font-bold text-gray-200 mb-2">撮影者：{{$portfolio->pilot->name}}({{$portfolio->pilot->age}})</h3>
                            <a href="{{ route('pilot.pilot_list.show',$portfolio->pilot->id) }}" class="block rounded-lg py-2 px-8 font-medium text-black bg-gray-100 shadow-lg focus:outline-none hover:bg-gray-300 hover:shadow-none">
                                →
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{ $portfolios->links() }}
    </div>
</x-pilot-layout>

<!-- 一般ユーザー -->
@elseif($user->type === 0)

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl text-gray-800 leading-tight">
            {{ __('作品（パイロットリスト）') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto">
            <div class="overflow-hidden shadow-sm sm:rounded-sm">
                <div class="p-2 bg-black border-b border-gray-200">
                    <table class="text-center w-full border-collapse">
                        <!-- <div>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-center text-grey-dark border-b border-grey-light">作品（パイロットリスト）</th>
                        </div> -->
                        @foreach ($pilots as $pilot)
                        <tr class="hover:bg-grey-lighter">
                            <td class="flex px-2 border-b border-grey-light">
                                @foreach ($pilot->pilotPortfolios as $portfolio)
                                <div class="p-2 flex-1">
                                    <iframe width="395" height="225" src="{{$portfolio->portfolio_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    <div>
                                        <h3 class="text-left mt-4 font-bold text-lg text-gray-200">撮影者：{{$pilot->name}}({{$pilot->age}})</h3>
                                    </div>
                                    <div class="p-4">
                                        <a href="{{ route('pilot_list.show',$pilot->id) }}" class="rounded-lg text-center py-2 px-8 font-medium text-black bg-gray-100 shadow-lg focus:outline-none hover:bg-gray-300 hover:shadow-none">
                                            →
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                </div>
                {{ $pilots->links() }}
                </table>
            </div>
        </div>
    </div>
</x-app-layout>


@endif