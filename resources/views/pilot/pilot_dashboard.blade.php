<x-pilot-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('受注管理') }}
        </h2>
    </x-slot>



    <div class="bg-white">
        <table>
            <tr>
                <th>プラン名</th>
                <th>お申し込み者</th>
                <th>受注日</th>
                <th>ステータス</th>
                <th>備考</th>
            </tr>
            @foreach($data->pilotShootingPlans as $plan)
            @foreach($plan->orders as $order )
            <tr>
                <td>
                    <p>{{$plan->plan_name}}</p>
                </td>
                <td>
                    <p>{{$order->user->name}}</p>
                </td>
                <td>
                    <p>{{$order->application_date}}</p>
                </td>
                <td>
                    @if($order->status === 0)
                    <p>未着手</p>
                    @elseif($order->status === 1)
                    <p>進行中</p>
                    @elseif($order->status === 2)
                    <p>完了</p>
                </td>
            </tr>
            @endif
            @endforeach
            @endforeach
        </table>
    </div>
</x-pilot-layout>