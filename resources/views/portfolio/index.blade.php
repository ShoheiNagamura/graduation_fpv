<x-pilot-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl text-gray-800 leading-tight">
            {{ __('登録済みポートフォリオ') }}
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
            <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-7/8">
                <a href="{{ route('pilot.portfolio.create') }}" :active="request()->routeIs('pilot.portfolio.create')" class="block text-center w-full py-3 mb-6  mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:text-white hover:shadow-none">
                    {{ __('ポートフォリオ作成') }}
                </a>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-2 bg-white border-b border-gray-200">
                        <div class="text-center w-full border-collapse">
                            <div>
                                <div>
                                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">ポートフォリオ一覧</th>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                @foreach ($portfolios as $portfolio)
                                <div class="hover:bg-grey-lighter w-full sm:w-1/3 md:w-1/3 lg:w-1/3 px-2 mb-8">
                                    <div class="border-b border-grey-light">
                                        <iframe width="100%" height="200" src="{{ $portfolio->portfolio_url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                        <a href="{{ route('pilot.portfolio.show',$portfolio->id) }}" class="block rounded-md text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                            詳細
                                        </a>
                                        <div class="flex">
                                            <form action="{{ route('pilot.portfolio.edit',$portfolio->id) }}" method="GET" class="w-1/2 text-center mt-2">
                                                @csrf
                                                <button type="submit" class="rounded-md  text-sm hover:shadow-none bg-green-400  text-center text-white py-3 px-8 focus:outline-none focus:shadow-outline">
                                                    変更
                                                </button>
                                            </form>
                                            <form action="{{ route('pilot.portfolio.destroy',$portfolio->id) }}" method="POST" class="w-1/2 text-center mt-2">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="rounded-md  text-sm hover:shadow-none bg-red-400  text-center text-white py-3 px-8 focus:outline-none focus:shadow-outline">
                                                    削除
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            {{ $portfolios->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-pilot-layout>