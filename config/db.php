<?php
/* @var codemix\yii2confload\Config $this */

return [
    'class' => 'yii\db\Connection',
    'dsn' => self::env('DB_DSN', 'pgsql:host=localhost;port=33060;dbname=db_name'),
    'username' => self::env('DB_USER', 'db_username'),
    'password' => self::env('DB_PASSWORD', 'db_password'),
    'charset' => 'utf8',
	'schemaMap' => [
		'pgsql'=> [
			'class'=>'yii\db\pgsql\Schema',
			'defaultSchema' => 'public' //specify your schema here
		]
	],

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
