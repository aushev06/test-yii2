<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=host.docker.internal;dbname=yii2basic',
    'username' => 'root',
    'password' => 'password',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
