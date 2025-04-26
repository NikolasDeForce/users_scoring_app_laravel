<p align="center">
<a href="https://vk.com/kolyaliam">VK</a>
<a href="https://github.com/NikolasDeForce">My Repositories</a>
<a href="https://barnaul.hh.ru/resume/16e7dbf2ff0ebd16820039ed1f313543694732">HH</a>

## О проекте

Web-приложение для расчета скоринга клиентов, написанное на фреймворке Laravel. Скоринг - это число равное сумме баллов по определенным правилам расчета.

[Тестовое задание](https://disk.yandex.ru/i/UR7s3hIlXexN0g) от компании [Sveak](https://sveak.com/).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Как запустить

Для начала `git clone https://github.com/NikolasDeForce/users_scoring_app_laravel`. Далее, убедитесь что у вас стоят все нужные утилиты. А именно: Composer&Laravel, npm, vite и MySQL.
Измените параменты подключения к БД в файле .env, создайте таблицу и сделайте миграции. Для запуска миграций `php artisan migrate`.
`php artisan serve` для запуска сервера и `npm run dev` для подключения bootstrap к приложению.

## Тестирование

В папке tests реализованы интеграционные и юнит тесты к приложению. Интеграционные тесты выполняются с запросами в тестовую БД. Ее нужно создать и изменить параменты в файле phpunit.xml. Запуск тестов `php artisan test`
