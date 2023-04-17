<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('依頼画面') }}
        </h2>
    </x-slot>


    <div class="flex justify-center bg-white p-6">
        <div class="w-1/4 flex justify-center">
            <div class="flex flex-col justify-start">
                <a href="{{ route('profile.edit')}}" class="py-2 px-4 text-gray-800 hover:bg-gray-100">基本プロフィール</a>
                <a href="{{route('user_dashboard')}}" class="py-2 px-4 text-gray-800 hover:bg-gray-100">ご依頼案件管理</a>
                <a href="#" class="py-2 px-4 text-gray-800 hover:bg-gray-100">報酬管理</a>
                <a href="#" class="py-2 px-4 text-gray-800 hover:bg-gray-100">メッセージ</a>
            </div>
        </div>
        <div class="w-3/4">
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="text-center py-2 px-4">ご依頼案件</th>
                        <th class="text-center py-2 px-4">担当操縦士</th>
                        <th class="text-center py-2 px-4">ご依頼日</th>
                        <th class="text-center py-2 px-4">ステータス</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>