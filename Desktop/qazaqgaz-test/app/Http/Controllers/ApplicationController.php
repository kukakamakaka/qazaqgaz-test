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
    $request->validate([
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    \App\Models\Application::create([
        'full_name' => auth()->user()->name,
        'email'     => auth()->user()->email,
        'subject'   => $request->subject,
        'category'  => $request->category,
        'priority'  => $request->priority,
        'message'   => $request->message,
        'status'    => 'new',
        'phone'     => null, // Теперь база разрешит сохранить null
    ]);

    return redirect()->route('dashboard')->with('success', 'Заявка создана!');
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
