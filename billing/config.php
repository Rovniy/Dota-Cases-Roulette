<?php

class Config
{
    // Ваш секретный ключ (из настроек проекта в личном кабинете unitpay.ru )
    const SECRET_KEY = '';
    // Стоимость товара в руб.
    const ITEM_PRICE = 10;

    // Таблица начисления товара, например `users`
    const TABLE_ACCOUNT = 'account';
    // Название поля из таблицы начисления товара по которому производится поиск аккаунта/счета, например `email`
    const TABLE_ACCOUNT_NAME = 'steamid';
    // Название поля из таблицы начисления товара которое будет увеличено на колличево оплаченого товара, например `sum`, `donate`
    const TABLE_ACCOUNT_DONATE= 'money';

    // Параметры соединения с бд
    // Хост
    const DB_HOST = 'localhost';
    // Имя пользователя
    const DB_USER = 'root';
    // Пароль
    const DB_PASS = '';
    // Назывние базы
    const DB_NAME = 'dota2_bd';
}