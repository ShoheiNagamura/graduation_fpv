<x-pilot-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl text-gray-800 leading-tight">
            {{ __('プランの詳細') }}
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
            <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-6">
                            <div class="flex flex-col mb-4">
                                <p class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2">プランID</p>
                                <p class="py-2 px-3 text-grey-darkest" id="tweet">
                                    {{$plan->id}}
                                </p>
                            </div>
                            <div class="flex flex-col mb-4">
                                <p class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2">プラン名</p>
                                <p class="py-2 px-3 text-grey-darkest" id="tweet">
                                    {{$plan->plan_name}}
                                </p>
                            </div>
                            <div class="flex flex-col mb-4">
                                <p class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2">プラン内容</p>
                                <p class="py-2 px-3 text-grey-darkest" id="tweet">
                                    {{$plan->plan_detail}}
                                </p>
                            </div>
                            <div class="flex flex-col mb-4">
                                <p class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2">料金</p>
                                <p class="py-2 px-3 text-grey-darkest" id="description">
                                    {{number_format($plan->plan_fee)}}円
                                </p>
                            </div>
                            <div class="flex flex-col mb-4">
                                <p class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2">お申込日</p>
                                <p class="py-2 px-3 text-grey-darkest" id="description">
                                    {{$plan->application_date}}
                                </p>
                            </div>
                            <div class="flex flex-col mb-4">
                                <p class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2">撮影実施日</p>
                                <p class="py-2 px-3 text-grey-darkest" id="description">
                                    {{$plan->shooting_date}}
                                </p>
                            </div>
                            <div class="flex flex-col mb-4">
                                <p class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2">納品日</p>
                                <p class="py-2 px-3 text-grey-darkest" id="description">
                                    {{$plan->delivery_date}}
                                </p>
                            </div>
                            <a href="{{ url()->previous() }}" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-black uppercase bg-gray-200 shadow-lg focus:outline-none hover:bg-gray-800 hover:shadow-none">
                                戻る
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</x-pilot-layout>