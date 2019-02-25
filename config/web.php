<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
	'name' => self::env('YII_NAME', 'yii2-basic-kit'),
	'id' => 'basic',
	'basePath' => dirname(__DIR__),
	'bootstrap' => ['log'],
	'aliases' => [
		'@bower' => '@vendor/bower-asset',
		'@npm' => '@vendor/npm-asset',
	],
	'components' => [
		'request' => [
			'cookieValidationKey' => self::env('COOKIE_VALIDATION_KEY', null, !YII_ENV_TEST),
		],
		'cache' => [
			'class' => 'yii\redis\Cache',
		],
		'user' => [
			'identityClass' => 'app\models\User',
			'enableAutoLogin' => true,
		],
		'errorHandler' => [
			'errorAction' => 'site/error',
		],
		'redis' => [
			'class' => 'yii\redis\Connection',
			'hostname' => self::env('REDIS_HOSTNAME', 'localhost'),
			'password' => self::env('REDIS_PASSWORD', 1234567890),
			'port' => self::env('REDIS_PORT', 6379),
			'database' => self::env('REDIS_DATABASE', 0),
		],
		'session' => [
			'class' => 'yii\redis\Session',
		],
		'mailer' => [
			'class' => 'yii\swiftmailer\Mailer',
			'transport' => [
				'class' => 'Swift_SmtpTransport',
				'host' => self::env('SMTP_HOST'),
				'username' => self::env('SMTP_USER'),
				'password' => self::env('SMTP_PASSWORD'),
				'port' => self::env('SMTP_PORT', 25),
				'encryption' => self::env('SMTP_ENCRYPTION', null),
			],
		],
		'log' => [
			'traceLevel' => self::env('YII_TRACELEVEL', 0),
			'targets' => [
				[
					'class' => 'codemix\streamlog\Target',
					'url' => 'php://stdout',
					'levels' => ['info', 'trace'],
					'logVars' => [],
				],
				[
					'class' => 'codemix\streamlog\Target',
					'url' => 'php://stderr',
					'levels' => ['error', 'warning'],
					'logVars' => [],
				],
			],
		],
		'db' => $db,
		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'rules' => [
				'' => 'site/index',
				'<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
			],
		],
	],
	'params' => $params,
];

if (YII_ENV_DEV) {
	// configuration adjustments for 'dev' environment
	$config['bootstrap'][] = 'debug';
	$config['modules']['debug'] = [
		'class' => 'yii\debug\Module',
		// uncomment the following to add your IP if you are not connecting from localhost.
		//'allowedIPs' => ['127.0.0.1', '::1'],
	];

	$config['bootstrap'][] = 'gii';
	$config['modules']['gii'] = [
		'class' => 'yii\gii\Module',
		// uncomment the following to add your IP if you are not connecting from localhost.
		//'allowedIPs' => ['127.0.0.1', '::1'],
	];
}

return $config;
