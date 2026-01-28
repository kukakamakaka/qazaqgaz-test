# ServiceDesk Project - QazaqGaz Test

Система управления заявками (Helpdesk).

## Функционал
- Регистрация и авторизация (Laravel Breeze).
- Роли: Пользователь и Администратор.
- Создание заявок с указанием темы, категории и приоритета.
- Админ-панель для смены статусов заявок.

## Инструкция по запуску
1. Склонируйте репозиторий: `git clone https://github.com/kukakamakaka/qazaqgaz-test.git`
2. Установите зависимости: `composer install` и `npm install`
3. Настройте `.env` файл и БД.
4. Запустите миграции и сидер: `php artisan migrate --seed`
5. Запустите проект: `php artisan serve`

**Тестовый админ:** admin@test.com / password
