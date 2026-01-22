<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    // Показать форму
    public function create()
    {
        return view('applications.create');
    }

    // Сохранить данные из формы в базу
    public function store(Request $request)
    {
        // Это сохранит все поля из формы в таблицу applications
        Application::create($request->all());

        // После сохранения вернем пользователя на главную с сообщением
        return redirect('/dashboard')->with('success', 'Заявка успешно отправлена!');
    }
}
