<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Отправить новую заявку
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="/applications" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Ваше полное имя (ФИО)</label>
                        <input type="text" name="full_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Номер телефона</label>
                        <input type="text" name="phone" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="+7..." required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Текст сообщения</label>
                        <textarea name="message" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                    </div>

                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                        Отправить заявку
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
