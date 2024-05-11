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
