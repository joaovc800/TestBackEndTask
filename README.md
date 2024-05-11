<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Test BackEnd Task

## Endpoints

- **GET|HEAD** `/`
- **POST** `/api/login`
  - `AuthController@login`
- **GET|HEAD** `/api/v1/book`
  - `BookController@index`
- **POST** `/api/v1/book`
  - `BookController@store`
    - **JSON Params:**
    ```json
    {
        "name": "Book name test",
        "isbn": 123456789,
        "value": 1.50,
        "store_id": 1
    }
    ```
- **GET|HEAD** `/api/v1/book/{book}`
  - `BookController@show`
- **PUT|PATCH** `/api/v1/book/{book}`
  - `BookController@update`
- **DELETE** `/api/v1/book/{book}`
  - `BookController@destroy`
- **POST** `/api/v1/logout`
  - `AuthController@logout`
- **POST** `/api/v1/me`
  - `AuthController@me`
- **POST** `/api/v1/refresh`
  - `AuthController@refresh`
- **GET|HEAD** `/api/v1/store`
  - `StoreController@index`
- **POST** `/api/v1/store`
  - `StoreController@store`
    - **JSON de Parâmetro:**
    ```json
    {
        "name": "Store Name",
        "active": true,
        "address": "street"
    }
    ```
- **GET|HEAD** `/api/v1/store/{store}`
  - `StoreController@show`
- **PUT|PATCH** `/api/v1/store/{store}`
  - `StoreController@update`
- **DELETE** `/api/v1/store/{store}`
  - `StoreController@destroy`

## Setup

1. Run the migrations to create the tables in the database:
   ```bash
   php artisan migrate

2. Run the seeds to add data to the database and create the default user:
   ```bash
   php artisan db:seed

3. Run application server
    ```bash
    php artisan serve
    
## Default User

After running the seeds, the following default user will be created:

* Email: test@example.com
* Password: Test@user123

Upon logging in with this user, a JWT token will be generated. Make sure to use this token in your requests to protected endpoints.



These additional instructions provide guidance on setting up the environment for the API, including running migrations and seeds to set up the database and create the default user. It also informs about the default user created and how to use the generated JWT token upon login in requests to protected endpoints.