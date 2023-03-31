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
                            @foreach ($plans as $plan)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <div>
                                        <h3 class="text-left font-bold text-lg text-grey-dark">{{$plan->plan_name}}</h3>
                                    </div>
                                    <!-- <div>
                                        <p>{{$plan->plan_detail}}</p>
                                    </div> -->
                                    <div>
                                        <p>{{$plan->plan_fee}}</p>
                                    </div>
                                    <div>
                                        <p>{{$plan->application_date}}</p>
                                    </div>
                                    <div>
                                        <p>{{$plan->shooting_date}}</p>
                                    </div>
                                    <div>
                                        <p>{{$plan->delivery_date}}</p>
                                    </div>
                                    <!-- <a href="{{ route('pilot.shooting_plan.show',$plan->id) }}">
                                        <h3 class="text-left font-bold text-lg text-grey-dark">{{$plan->plan_name}}</h3>
                                    </a> -->
                                    <a href="{{ route('pilot.shooting_plan.show',$plan->id) }}" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                        詳細
                                    </a>
                                    <div class="flex">
                                        <!-- 更新ボタン -->
                                        <!-- 削除ボタン -->
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-pilot-layout>