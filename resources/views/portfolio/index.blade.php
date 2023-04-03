<x-pilot-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl text-gray-800 leading-tight">
            {{ __('登録済みポートフォリオ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
            <a href="{{ route('pilot.portfolio.create') }}" :active="request()->routeIs('pilot.portfolio.create')" class="block text-center w-full py-3 mb-6  mt-6 font-medium tracking-widest text-black uppercase bg-white shadow-lg focus:outline-none hover:bg-gray-900 hover:text-white hover:shadow-none">
                {{ __('ポートフォリオ作成') }}
            </a>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="text-center w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">ポートフォリオ一覧</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($portfolios as $portfolio)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">

                                    <iframe width="560" height="315" src="{{ $portfolio->portfolio_url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                                    <a href="{{ route('pilot.portfolio.show',$portfolio->id) }}" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                        詳細
                                    </a>
                                    <div class="flex">
                                        <form action="{{ route('pilot.portfolio.edit',$portfolio->id) }}" method="GET" class="text-left">
                                            @csrf
                                            <button type="submit" class="mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-white py-1 px-2 focus:outline-none focus:shadow-outline">
                                                <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="black">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                        </form>
                                        <form action="{{ route('pilot.portfolio.destroy',$portfolio->id) }}" method="POST" class="text-left">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-white py-1 px-2 focus:outline-none focus:shadow-outline">
                                                <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="black">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        {{ $portfolios->links() }}
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-pilot-layout>