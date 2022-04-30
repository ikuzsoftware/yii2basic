<?php

return [
    'class' => 'yii\db\Connection',
//    'dsn' => 'mysql:host=host.docker.internal;dbname=yii2basic', //kompyuterda docker ishlatilsa shu ishlatiladi
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
