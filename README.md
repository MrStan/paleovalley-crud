## Introduction

This is the paleovalley-crud project, a Laravel application designed for CRUD operations related to products.

## Prerequisites

-   PHP 7.4 or higher
-   Composer
-   A database system (e.g., MySQL, PostgreSQL)
-   Laravel Sanctum for API authentication

## Setup & Installation

Clone the repository:

```bash
git clone https://github.com/MrStan/paleovalley-crud.git
cd paleovalley-crud
```

## Install dependencies:

```bash
composer install
```

## Environment Setup:

-   Copy the .env.example to .env:

```bash
cp .env.example .env
```

-   Set your database connection details in the .env file.

## Generate Application Key:

```vbnet
php artisan key:generate
```

## Run database migrations:

```vbnet
php artisan migrate
```

## Start the local development server:

```vbnet
php artisan serve
```

You can now access the server at http://localhost:8000

## Running Tests

To ensure the application is functioning as expected, run the provided tests:

```bash
php artisan test
```

## API Authentication

The API routes are protected using Laravel Sanctum. Ensure you have set up Sanctum correctly and use the authentication token in your API requests.

## Contributing

If you wish to contribute, please create a pull request and ensure that all tests pass before submitting.

## License

This project is open-sourced software licensed under the MIT license.
