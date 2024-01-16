# Rz-Sync Website v1.0

This is the free website for private rappelz servers.
Web app based on <strong><span style="color: red">Laravel 10</span> <span style="color: green">Vue 3 Composition API</span> & <span style="color: violet">Inertia</span></strong>

## Requirements

1. Microsoft SQL Server

2. PHP 8.2 with pdo_odbc, pdo_sqlsrv_php_ts_8.2, sqlsrv_php_ts_8.2

3. Apache or nginx

## Important

Make sure that u created databases

## Installation

1. Clone the repository to your computer:

    ```bash
    git clone https://github.com/syncallow/rz-sync.git
    ```

2. Go to project directory:

    ```bash
    cd your_project
    ```

3. Install dependencies:

    ```bash
    composer install
    npm install
    ```
4. Make new .env file from .env.example

5. Add to your .env app and database configs

    ```bash
    DB_CONNECTION=sqlsrv
    DB_HOST=your_db_ip or 127.0.0.1
    DB_PORT=1433
    DB_DATABASE=db_name_for_website
    DB_USERNAME=db_username
    DB_PASSWORD=db_password
    
    DB_CONNECTION_ARCADIA=sqlsrv
    DB_HOST_ARCADIA=your_db_ip or 127.0.0.1
    DB_PORT_ARCADIA=1433
    DB_DATABASE_ARCADIA=db_name_of_arcadia
    DB_USERNAME_ARCADIA=db_username
    DB_PASSWORD_ARCADIA=db_password
    
    DB_CONNECTION_TELECASTER=sqlsrv
    DB_HOST_TELECASTER=your_db_ip or 127.0.0.1
    DB_PORT_TELECASTER=1433
    DB_DATABASE_TELECASTER=db_name_of_telecaster
    DB_USERNAME_TELECASTER=db_username
    DB_PASSWORD_TELECASTER=db_password
    
    DB_CONNECTION_AUTH=sqlsrv
    DB_HOST_AUTH=your_db_ip or 127.0.0.1
    DB_PORT_AUTH=1433
    DB_DATABASE_AUTH=db_name_of_auth
    DB_USERNAME_AUTH=db_username
    DB_PASSWORD_AUTH=db_password
   
    DB_PASSWORD_SALT=2011
    ```

6. Add to config/database.php the code below:
    ```bash
    'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            // 'encrypt' => env('DB_ENCRYPT', 'yes'),
            // 'trust_server_certificate' => env('DB_TRUST_SERVER_CERTIFICATE', 'false'),
        ],

        'auth_db' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST_AUTH', '127.0.0.1'),
            'port' => env('DB_PORT_AUTH', '1433'),
            'database' => env('DB_DATABASE_AUTH', 'Auth'),
            'username' => env('DB_USERNAME_AUTH', 'sa'),
            'password' => env('DB_PASSWORD_AUTH', 'Password_by_default'),
        ],

        'arcadia_db' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST_ARCADIA', '127.0.0.1'),
            'port' => env('DB_PORT_ARCADIA', '1433'),
            'database' => env('DB_DATABASE_ARCADIA', 'Auth'),
            'username' => env('DB_USERNAME_ARCADIA', 'sa'),
            'password' => env('DB_PASSWORD_ARCADIA', 'Password_by_default'),
        ],

        'telecaster_db' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST_TELECASTER', '127.0.0.1'),
            'port' => env('DB_PORT_TELECASTER', '1433'),
            'database' => env('DB_DATABASE_TELECASTER', 'Auth'),
            'username' => env('DB_USERNAME_TELECASTER', 'sa'),
            'password' => env('DB_PASSWORD_TELECASTER', 'Password_by_default'),
        ],
    ```

7. Generate project key:
    ```bash
    php artisan key:generate
    ```

8. Now you can make migrations for website
    ```bash
    php arisan migrate
    ```

9. Don't forget to make storage link or images will not display:
    ```bash
    php arisan storage:link
    ```
## Использование

Описание того, как использовать ваш проект. Включите примеры кода, если необходимо.

```bash
команда_проекта аргументы
