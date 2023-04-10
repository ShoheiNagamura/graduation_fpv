<x-pilot-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl text-gray-800 leading-tight">
            {{ __('登録済みプラン') }}
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


                        <div>
                            @foreach ($plans as $plan)
                            <tr class="hover:bg-gray-100">
                                <td class="py-4 px-6 border-b border-gray-200">{{ $plan->id }}</td>
                                <td class="py-4 px-6 border-b border-gray-200">{{ $plan->plan_name }}</td>
                                <td class="py-4 px-6 border-b border-gray-200">￥{{ number_format($plan->plan_fee) }}</td>
                                <td class="py-4 px-6 border-b border-gray-200">{{ $plan->application_date }}</td>
                                <td class="py-4 px-6 border-b border-gray-200">{{ $plan->shooting_date }}</td>
                                <td class="py-4 px-6 border-b border-gray-200">{{ $plan->delivery_date }}</td>
                                <td class="py-4 px-6 border-b border-gray-200">
                                    <a href="{{ route('pilot.shooting_plan.show', $plan->id) }}" class="rounded-md block text-center w-full py-3 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                        詳細
                                    </a>
                                    <div class="flex">
                                        <!-- 更新ボタン -->
                                        <form action="{{ route('pilot.shooting_plan.edit',$plan->id) }}" method="GET" class="w-1/2 text-center mt-2">
                                            @csrf
                                            <button type="submit" class="rounded-md  text-sm hover:shadow-none bg-green-400  text-center text-white py-2 px-8 focus:outline-none focus:shadow-outline">
                                                変更
                                            </button>
                                        </form>
                                        <!-- 削除ボタン -->
                                        <form action="{{ route('pilot.shooting_plan.destroy',$plan->id) }}" method="POST" class="w-1/2 text-center mt-2">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="rounded-md text-sm hover:shadow-none bg-red-400 text-center text-white  py-2 px-8 focus:outline-none focus:shadow-outline">
                                                削除
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </div>
                        {{ $plans->links() }}
                        </tbody>
                </div>
            </table>
        </div>
    </div>

</x-pilot-layout>