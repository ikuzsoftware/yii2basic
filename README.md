# yii2basic
yii2 basic ishlatish uchun tayyor holatda

1) `config/web.php` ichida `botToken` keraklisiga o'zgartiriladi:
```php
        'telegram' => [
            'class' => 'aki\telegram\Telegram',
            'botToken' => '12345:BuToKen$',
        ],
```
2) Shu kutubxona yuklanadi: [https://github.com/akbarjoudi/yii2-bot-telegram](https://github.com/akbarjoudi/yii2-bot-telegram)
~~~
composer require aki/yii2-bot-telegram
~~~
3) `LibraryBotController`'dagi `$url`ga sayt nomi yoziladi, `url/library-bot/set`ga brauzerdan shu sahifaga kirib qo'yilsa bot `webhook`ga bog'lanadi, `webhook`ni to'xtatish uchun `url/library-bot/un-set` qilinadi
4) Barchasi tugagach botdan `/start` buyrug'ini yuboring.
5) Agar controller nomi o'zgartirilsa, `$controller_name`ni yozib qo'yish kerak.
