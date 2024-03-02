# Movie Rating App

**Movie Rating App** is a Laravel application designed to manage a list of movies and their ratings.

## Requirements

Before setting up the project, ensure you have the following prerequisites:

- **PHP (>=8.2)** installed on your machine
- **Composer** installed globally
- **MySQL** or any other supported database management system

## Installation

Follow these steps to set up the project locally:

1. **Clone the Repository:**

    ```bash
    git clone https://github.com/GhassanMg/GhassanMg-movie-rating-app.git
    cd movie-rating-app
    ```

2. **Configure the Database:**

    Open the `.env.example` file and configure the database settings:

    ```makefile
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=movie-rating-app
    DB_USERNAME=root
    DB_PASSWORD=
    ```

    Save the file as `.env`.

3. **Install Dependencies:**

    ```bash
    composer install
    ```

4. **Generate a New Application Key:**

    ```bash
    php artisan key:generate
    ```

5. **Run Migrations and Seeders:**

    ```bash
    php artisan migrate --seed
    ```

6. **Serve the Application:**

    ```bash
    php artisan serve
    ```

    The application should now be running locally at [http://localhost:8000](http://localhost:8000).

## Usage

Explain how to use the application, including any available features and functionalities.

## Troubleshooting

Include common issues and errors users might encounter and how to resolve them.

## Contributing

Provide guidelines for contributing to the project, including how to report bugs, submit feature requests, and contribute code.
