<x-pilot-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Tweet Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <div class="flex flex-col mb-4">
                            <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">プランID</p>
                            <p class="py-2 px-3 text-grey-darkest" id="tweet">
                                {{$plan->id}}
                            </p>
                        </div>
                        <div class="flex flex-col mb-4">
                            <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">プラン名</p>
                            <p class="py-2 px-3 text-grey-darkest" id="tweet">
                                {{$plan->plan_name}}
                            </p>
                        </div>
                        <div class="flex flex-col mb-4">
                            <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">プラン内容</p>
                            <p class="py-2 px-3 text-grey-darkest" id="tweet">
                                {{$plan->plan_detail}}
                            </p>
                        </div>
                        <div class="flex flex-col mb-4">
                            <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">料金</p>
                            <p class="py-2 px-3 text-grey-darkest" id="description">
                                {{number_format($plan->plan_fee)}}
                            </p>
                        </div>
                        <div class="flex flex-col mb-4">
                            <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">お申込日</p>
                            <p class="py-2 px-3 text-grey-darkest" id="description">
                                {{$plan->application_date}}
                            </p>
                        </div>
                        <div class="flex flex-col mb-4">
                            <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">撮影実施日</p>
                            <p class="py-2 px-3 text-grey-darkest" id="description">
                                {{$plan->shooting_date}}
                            </p>
                        </div>
                        <div class="flex flex-col mb-4">
                            <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">納品日</p>
                            <p class="py-2 px-3 text-grey-darkest" id="description">
                                {{$plan->delivery_date}}
                            </p>
                        </div>
                        <a href="{{ url()->previous() }}" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-pilot-layout>