# UrbnsStore Application

This project is a Laravel application. Follow the steps below to get a development environment running.

## Requirements

- **PHP** `^8.2`
- **Composer** for PHP package management
- **Node.js** `>=18` and **npm** for front-end assets
- A database (SQLite is configured by default)

## Installation

1. Clone the repository and move into the project directory.
2. Install PHP dependencies:

   ```bash
   composer install
   ```

3. Install Node dependencies:

   ```bash
   npm install
   ```

4. Copy the example environment file and adjust your settings:

   ```bash
   cp .env.example .env
   ```

   - For **SQLite** (default), ensure `database/database.sqlite` exists:

     ```bash
     touch database/database.sqlite
     ```

   - To use **MySQL** or another driver, update the `DB_*` variables in `.env` accordingly.

5. Generate the application key and run migrations:

   ```bash
   php artisan key:generate
   php artisan migrate
   ```

6. Build front‑end assets during development:

   ```bash
   npm run dev
   ```

## Running the Application

Start the local development server with:

```bash
php artisan serve
```

The application will be available at <http://localhost:8000> by default.

## Running Tests

Execute the test suite with:

```bash
php artisan test
```

This will run all PHPUnit tests located in the `tests` directory.
