<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Отправить новую заявку</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('applications.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Название (Тема заявки)</label>
                        <input type="text" name="subject" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required placeholder="Например: Не работает принтер">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Категория</label>
                            <select name="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="Техподдержка">Техподдержка</option>
                                <option value="Доступ">Доступ</option>
                                <option value="Оборудование">Оборудование</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Приоритет</label>
                            <select name="priority" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="low">Низкий</option>
                                <option value="medium">Средний</option>
                                <option value="high">Высокий</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Описание проблемы</label>
                        <textarea name="message" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                    </div>

                    <button type="submit" style="background-color: #1f2937; color: white; padding: 10px 20px; border-radius: 6px; font-weight: bold;">
                        ОТПРАВИТЬ ЗАЯВКУ
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
