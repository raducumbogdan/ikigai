# Installation

-- Clone the code

-- Set your empty database connection information in the .env file

-- Composer install/update

-- Execute migrations: 
```$xslt
php artisan migrate
```

-- Execute seeders:
```$xslt
php artisan db:seed
```

-- Set your host with domain "ikigai.loc" and default root to point to /public/index.php

#Usage

Import the "Ikigai.postman_collection.json" into your Postman

Have fun with the 3 example routes

## Don't have Postman?
Here's a sample request:

POST:
```http request
http://ikigai.loc/api_v1/webhook/log/<provider_id=1/2/3>
```

BODY:
```json
{
    "transaction_time": "1603711958",
    "id": "e0c523cd-3dfd-4206-83b4-9c0dc32dd77e",
    "event": "in-store-txn",
    "value": 13.98,
    "status": "complete",
    "customer_id": "e0c523cd-3dfd-4206-83b4-9c0dc32dd77e"
}
```


# Created with love using Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Contributing

Thank you for considering contributing to Lumen! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

