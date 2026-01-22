<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Личный кабинет') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-6 flex justify-between items-center">
                <h3 class="text-lg font-medium text-gray-900">Мои заявки</h3>
               <a href="{{ route('applications.create') }}"
   style="background-color: #2563eb; color: white; padding: 12px 24px; border-radius: 8px; font-weight: bold; text-transform: uppercase; display: inline-flex; align-items: center; text-decoration: none; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
    <svg style="width: 20px; height: 20px; margin-right: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
    </svg>
    Создать новую заявку
</a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Название</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Категория</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Приоритет</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Статус</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Дата создания</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($applications as $app)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $app->subject }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $app->category }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                            {{ $app->priority == 'high' ? 'bg-red-100 text-red-800' : ($app->priority == 'medium' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800') }}">
                                            {{ $app->priority }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
    @if(auth()->user()->role === 'admin')
        <form action="{{ route('applications.updateStatus', $app) }}" method="POST" class="flex items-center gap-2">
            @csrf
            @method('PATCH')
            <select name="status" onchange="this.form.submit()" class="text-xs border-gray-300 rounded-md">
                <option value="new" {{ $app->status == 'new' ? 'selected' : '' }}>Новая</option>
                <option value="in_progress" {{ $app->status == 'in_progress' ? 'selected' : '' }}>В обработке</option>
                <option value="completed" {{ $app->status == 'completed' ? 'selected' : '' }}>Выполнена</option>
                <option value="rejected" {{ $app->status == 'rejected' ? 'selected' : '' }}>Отклонена</option>
            </select>
        </form>
    @else
        <span class="px-2 py-1 rounded text-sm font-bold {{ $app->status == 'new' ? 'bg-blue-100 text-blue-700' : 'bg-green-100 text-green-700' }}">
            {{ $app->status }}
        </span>
    @endif
</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $app->created_at->format('d.m.Y H:i') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                        У вас пока нет созданных заявок.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
