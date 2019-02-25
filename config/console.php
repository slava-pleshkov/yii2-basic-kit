<?php
/* @var codemix\yii2confload\Config $this */

use codemix\yii2confload\Config;
$web = $this->web();

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic-console',
	'name' => self::env('YII_NAME', 'yii2-basic-kit'),
	'basePath' => dirname(__DIR__),
	'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => self::env('YII_DATEFORMAT','d-M-Y'),
            'datetimeFormat' => self::env('YII_DATETIMEFORMAT','d-M-Y H:i:s'),
            'timeFormat' => self::env('YII_TIMEFORMAT','H:i:s'),

            'locale' => self::env('YII_LOCALE','en-US'),
            'defaultTimeZone' => self::env('YII_DEFAULTTIMEZONE','America/Asuncion'), // time zone
        ],
		'redis' => $web['components']['redis'],
		'cache' => [
			'class' => 'yii\redis\Cache',
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
        'db' => $web['components']['db'],
    ],
    'params' => $params,
    /*
'controllerMap' => [
'fixture' => [ // Fixture generation command line.
'class' => 'yii\faker\FixtureController',
],
],
 */
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
