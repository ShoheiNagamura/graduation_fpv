<x-pilot-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl text-gray-800 leading-tight">
            {{ __('登録済みプラン') }}
        </h2>
    </x-slot>


    <div class="flex justify-center items-center bg-white p-6">
        <div class="w-1/4">
            <div class="flex flex-col justify-start">
                <a href="#" class="py-2 px-4 text-gray-800 hover:bg-gray-100">マイページ</a>
                <a href="{{route('pilot.pilot_dashboard')}}" class="py-2 px-4 text-gray-800 hover:bg-gray-100">オファー管理</a>
                <a href="{{route('pilot.shooting_plan.index')}}" class="py-2 px-4 text-gray-800 hover:bg-gray-100">プラン管理</a>
                <a href="{{route('pilot.portfolio.index')}}" class="py-2 px-4 text-gray-800 hover:bg-gray-100">ポートフォリオ管理</a>
                <a href="#" class="py-2 px-4 text-gray-800 hover:bg-gray-100">報酬管理</a>
                <a href="#" class="py-2 px-4 text-gray-800 hover:bg-gray-100">メッセージ</a>
            </div>
        </div>
        <div class="w-3/4">
            <table class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
                <a href="{{ route('pilot.shooting_plan.create') }}" :active="request()->routeIs('pilot.shooting_plan.create')" class="block text-center w-full py-3 mb-6 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                    プラン作成
                </a>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="w-full border-collapse border border-gray-200 text-center">
                        <thead>
                            <tr>
                                <th class="py-4 px-6 border-b border-gray-200 text-left font-bold text-lg text-gray-700">ID</th>
                                <th class="py-4 px-6 border-b border-gray-200 text-left font-bold text-lg text-gray-700">案件名</th>
                                <th class="py-4 px-6 border-b border-gray-200 text-left font-bold text-lg text-gray-700">報酬</th>
                                <th class="py-4 px-6 border-b border-gray-200 text-left font-bold text-lg text-gray-700">申込日</th>
                                <th class="py-4 px-6 border-b border-gray-200 text-left font-bold text-lg text-gray-700">撮影実施日</th>
                                <th class="py-4 px-6 border-b border-gray-200 text-left font-bold text-lg text-gray-700">納品日</th>
                                <th class="py-4 px-6 border-b border-gray-200 text-left font-bold text-lg text-gray-700"></th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($plans as $plan)
                            <tr class="hover:bg-gray-100">
                                <td class="py-4 px-6 border-b border-gray-200">{{ $plan->id }}</td>
                                <td class="py-4 px-6 border-b border-gray-200">{{ $plan->plan_name }}</td>
                                <td class="py-4 px-6 border-b border-gray-200">￥{{ number_format($plan->plan_fee) }}</td>
                                <td class="py-4 px-6 border-b border-gray-200">{{ $plan->application_date }}</td>
                                <td class="py-4 px-6 border-b border-gray-200">{{ $plan->shooting_date }}</td>
                                <td class="py-4 px-6 border-b border-gray-200">{{ $plan->delivery_date }}</td>
                                <td class="py-4 px-6 border-b border-gray-200">
                                    <a href="{{ route('pilot.shooting_plan.show', $plan->id) }}" class="block text-center w-full py-3 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                        詳細
                                    </a>
                                    <div class="flex">
                                        <!-- 更新ボタン -->
                                        <form action="{{ route('pilot.shooting_plan.edit',$plan->id) }}" method="GET" class="text-left">
                                            @csrf
                                            <button type="submit" class="mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-white py-1 px-2 focus:outline-none focus:shadow-outline">
                                                <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="black">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                        </form>
                                        <!-- 削除ボタン -->
                                        <form action="{{ route('pilot.shooting_plan.destroy',$plan->id) }}" method="POST" class="text-left">
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
                        {{ $plans->links() }}
                        </tbody>
                </div>
            </table>
        </div>
    </div>

</x-pilot-layout>