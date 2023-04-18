<x-pilot-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('管理画面') }}
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
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="text-center py-2 px-4">プラン名</th>
                        <th class="text-center py-2 px-4">お申し込み者</th>
                        <th class="text-center py-2 px-4">受注日</th>
                        <th class="text-center py-2 px-4">ステータス</th>
                        <th class="text-center py-2 px-4"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data->pilotShootingPlans as $plan)
                    @foreach($plan->orders as $order)
                    @if($order->status === 0 || $order->status === 1 || $order->status === 2)
                    <tr class="border border-gray-200">
                        <td class="py-2 px-4">{{ $plan->plan_name }}</td>
                        <td class="py-2 px-4">{{ $order->user->name }}</td>
                        <td class="py-2 px-4">{{ $order->application_date }}</td>
                        <td class="py-2 px-4">
                            @if($order->status === 0)
                            <span class="bg-yellow-100 rounded-full py-1 px-2 text-yellow-800">未着手</span>
                            @elseif($order->status === 1)
                            <span class="bg-blue-100 rounded-full py-1 px-2 text-blue-800">進行中</span>
                            @elseif($order->status === 2)
                            <span class="bg-green-100 rounded-full py-1 px-2 text-green-800">完了</span>
                            @endif
                        </td>
                        <!-- <td class="py-2 px-4">{{ $order->remarks }}</td> -->
                        <td class="py-2 px-4">
                            <!-- 削除ボタン -->
                            <form action="{{ route('pilot.orders.destroy',$order->id) }}" method="POST" class="w-2/3 text-center mt-2">
                                @method('delete')
                                @csrf
                                <button type="submit" class="rounded-md text-sm hover:shadow-none bg-red-400 text-center text-white  py-2 px-8 focus:outline-none focus:shadow-outline">
                                    キャンセル
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-pilot-layout>