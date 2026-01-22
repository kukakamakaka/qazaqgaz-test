<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Список заявок (Личный кабинет / Админка)
     * Соответствует пунктам 3 и 4 Технического задания.
     */
    public function index()
    {
        $user = Auth::user();

        // Если роль пользователя 'admin', показываем все заявки
        // Если 'user', показываем только те, где email совпадает
        if ($user->role === 'admin') {
            $applications = Application::latest()->get();
        } else {
            $applications = Application::where('email', $user->email)->latest()->get();
        }

        return view('dashboard', compact('applications'));
    }

    /**
     * Показать форму создания заявки
     */
    public function create()
    {
        return view('applications.create');
    }

    /**
     * Сохранить заявку в базу данных
     * Реализует логику обработки заявок из пункта 3 ТЗ.
     */
    public function store(Request $request)
    {
        // Валидация данных (хороший тон для ТЗ)
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'category' => 'nullable|string',
            'priority' => 'nullable|string',
            'deadline' => 'nullable|date',
        ]);

        // Создаем запись, принудительно подставляя данные текущего юзера
        Application::create([
            'full_name' => Auth::user()->name,
            'email'     => Auth::user()->email,
            'subject'   => $request->subject,
            'category'  => $request->category,
            'priority'  => $request->priority,
            'deadline'  => $request->deadline,
            'message'   => $request->message,
            'status'    => 'new', // Начальный статус по умолчанию
        ]);

        return redirect()->route('dashboard')->with('success', 'Заявка успешно создана!');
    }

    /**
     * Смена статуса заявки (для Админ-панели)
     * Соответствует пункту 3 (Админ-панель) ТЗ.
     */
    public function updateStatus(Request $request, Application $application)
    {
        // Проверка на админа перед сменой статуса
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Доступ запрещен');
        }

        $application->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Статус заявки обновлен!');
    }
}
