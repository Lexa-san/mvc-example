# Пример реализации MVC-шаблона 

Реализации MVC-паттерна руками без применения фреймворков
на примере небольшого сайта. Сам сайт показыват шахматные позиции.

## Требования

* PHP >= 5.5
* MySQL 5.x

## Установка и запуск

1. Установить БД со структурой и стартовым наполнение можно с помощью sql-скрипта:
 `db/asolovev_kplus.sql`.
2. DocumentRoot проекта в `public/`.
2. Открыть `bootstrap/config.php` и изменить настройки коннекта к БД.
Схема по-умолчанию называется `asolovev_kplus`.
3. Индексный файл запуска - `public/index.php`
4. Тестовые ссылки:
    * Нет фигур - `public/index.php?c=index&a=index&id=1`
    * Начальное положение фигур - `public/index.php?c=index&a=index&id=2`
