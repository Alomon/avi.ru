1. Склонируйте репозиторий
2. Переименуйте файл .env.example в .env и укажите настройки БД
2. Выполните установку зависимостей
``
composer install
``
3. Выполните миграцию
   ``
   php artisan migrate --seed 
   ``