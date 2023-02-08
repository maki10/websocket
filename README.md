# Websocket project

## Requirement

The minimum requirement for the project is PHP ^8.0, MySQL 8 and Node 14 (Optional)

## Instalations

To set it all right, sets of commands need to run.

First, pull all dependencies with the following command:
```#bash
$ composer install
$ cp .env.example .env
$ php artisan key:generate
```

When the command is done, with your favourite database manager add a new database.
After that in `.env` file update the database information.

Next, fulfil the database with the following command:
```#bash
$ php artisan migrate --seed
```

Next, start the websocket server with the following command:
```#bash
$ php artisan websocket:serve
```

### Note:
The command for a websocket server needs to run in the background. This is the replacement for the Pusher.
More about this package on a link: [Laravel WebSockets](https://beyondco.de/docs/laravel-websockets/getting-started/introduction).

## Checking project
For this project, I used Valet for local development. This project can be also run with a default server with the following command `$ php artisan serve`. 

Navigate to your favourite browser and open this project.
Default login data:
```
email: admin@websocket.com
pass: admin123
```
