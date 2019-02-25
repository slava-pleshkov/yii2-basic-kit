<p align="center">
    <a href="https://www.yiiframework.com/" target="_blank">
        <img src="https://www.yiiframework.com/image/yii_logo_light.svg" height="100px">
    </a>
    <h1 align="center">yii2-basic-kit</h1>
    <br>
</p>
<p align="center">🔨 Start application on Yii2 Framework to start a new project</p>

## Installation Dev

1. Clone the repo and `cd` into it
1. Create users and table in PostgreSQL
1. Run this command `composer install`
1. Rename or copy `.env.example` file to `.env`
1. Set your database credentials in your `.env` file
1. Set your redis credentials in your `.env` file
1. Set your mail credentials in your `.env` file
1. Set your `COOKIE_VALIDATION_KEY` in your `.env` file
1. Set your `YII_DEBUG` in your `.env` file with the value `1`
1. Set your `YII_ENV` in your `.env` file with the value `dev`
1. Run this command `yarn install`
1. Run this command `yarn run dev`
1. Run this command `php yii serve` or use Laravel Valet or Laravel Homestead
1. Visit `localhost:8000` in your browser

## Installation Production

1. Clone the repo and `cd` into it
1. Create users and table in PostgreSQL
1. Configure Nginx with these settings `nginx.conf`
1. Run this command `composer install`
1. Rename or copy `.env.example` file to `.env`
1. Set your database credentials in your `.env` file
1. Set your redis credentials in your `.env` file
1. Set your mail credentials in your `.env` file
1. Set your `COOKIE_VALIDATION_KEY` in your `.env` file
1. Set your `YII_DEBUG` in your `.env` file with the value `1`
1. Set your `YII_ENV` in your `.env` file with the value `dev`
1. Run this command `yarn install`
1. Run this command `yarn run production`

## Deploying to Heroku

1. Clone the repo and `cd` into it
1. Run this command `heroku create`
1. Run this command `heroku buildpacks:set heroku/php`
1. Run this command `heroku buildpacks:set heroku/nodejs`
1. Run this command `heroku addons:create heroku-postgresql:hobby-dev`
1. Run this command `heroku addons:create heroku-redis:hobby-dev`
1. Run this command `heroku config:set YII_NAME=Yii2 basic kit`
1. Run this command `heroku config:set YII_DEBUG=1`
1. Run this command `heroku config:set YII_ENV=dev`
1. Run this command `heroku config:set YII_LOCALE=en-US`
1. Run this command `heroku config:set YII_DATEFORMAT=d-M-Y`
1. Run this command `heroku config:set YII_DATETIMEFORMAT=d-M-Y H:i:s`
1. Run this command `heroku config:set YII_TIMEFORMAT=H:i:s`
1. Run this command `heroku config:set YII_DEFAULTTIMEZONE=America/Asuncion`
1. Run this command `heroku config:set YII_TRACELEVEL=0`
1. Run this command `heroku config:set COOKIE_VALIDATION_KEY=secret`
1. Run this command `heroku config:set DB_DSN=pgsql:host=localhost;port=5432;dbname=db_name`
1. Run this command `heroku config:set DB_USER=db_username`
1. Run this command `heroku config:set DB_PASSWORD=db_password`
1. Run this command `heroku config:set REDIS_HOSTNAME=secret`
1. Run this command `heroku config:set REDIS_PORT=secret`
1. Run this command `heroku config:set REDIS_DATABASE=secret`
1. Run this command `heroku config:set SMTP_HOST=secret`
1. Run this command `heroku config:set SMTP_USER=secret`
1. Run this command `heroku config:set SMTP_PASSWORD=secret`
1. Run this command `heroku config:set SMTP_PORT=secret`
1. Run this command `heroku config:set SMTP_ENCRYPTION=secret`
1. Run this command `git push heroku master`
1. Run this command `heroku open`

or

[![Deploy to Heroku](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy)