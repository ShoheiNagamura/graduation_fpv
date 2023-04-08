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
        <div class="p-4 bg-black">
            <div class="flex flex-wrap -mx-2">
                @foreach ($portfolios as $portfolio)
                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3 px-4 mb-8">
                    <div class="rounded-sm overflow-hidden">
                        <iframe width="100%" height="225" src="{{$portfolio->portfolio_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <div class="p-4 bg-gray-800">
                            <h3 class="text-lg font-bold text-gray-200 mb-4">撮影者：{{$portfolio->pilot->name}}({{$portfolio->pilot->age}})</h3>
                            <div class="flex justify-center">
                                <a href="{{ route('pilot.pilot_list.show',$portfolio->pilot->id) }}" class="block w-1/2 rounded-lg py-2 px-4 text-black bg-gray-100 shadow-lg focus:outline-none hover:bg-gray-300 hover:shadow-none">
                                    詳しくはこちら
                                </a>
                            </div>
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
        <div class="p-4 bg-black">
            <div class="flex flex-wrap -mx-2">
                @foreach ($portfolios as $portfolio)
                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3 px-4 mb-8">
                    <div class="rounded-sm overflow-hidden">
                        <iframe width="100%" height="225" src="{{$portfolio->portfolio_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <div class="p-4 bg-gray-800">
                            <h3 class="text-lg font-bold text-gray-200 mb-4">撮影者：{{$portfolio->pilot->name}}({{$portfolio->pilot->age}})</h3>
                            <div class="flex justify-center">
                                <a href="{{ route('pilot_list.show',$portfolio->pilot->id) }}" class="block w-1/2 rounded-lg py-2 px-4 text-black bg-gray-100 shadow-lg focus:outline-none hover:bg-gray-300 hover:shadow-none">
                                    詳しくはこちら
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{ $portfolios->links() }}
    </div>


</x-app-layout>


@endif