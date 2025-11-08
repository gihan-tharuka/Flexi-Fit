# Gemini Project Context: Flexi-Fit

## Project Overview

Flexi-Fit is a comprehensive fitness center management system built on the Laravel 10 framework (PHP 8.2). It provides a rich set of features for managing members, workouts, schedules, and payments.

The application's architecture is based on standard Laravel MVC patterns, with several key technologies:

*   **Backend:** Laravel 10, using either MySQL or SQLite as the database.
*   **Admin Panels:** It features a sophisticated, multi-panel admin interface built with [Filament](https://filamentphp.com/) v3. There is a main 'admin' panel for staff and a separate 'user' panel for registered members.
*   **Authentication:** User authentication and registration are handled by [Laravel Jetstream](https://jetstream.laravel.com/introduction.html) and Fortify.
*   **Frontend:** The frontend is built using Blade templates, [Tailwind CSS](https://tailwindcss.com/), and [Livewire](https://livewire.laravel.com/) v3 for reactive components. Asset bundling is managed by [Vite](https://vitejs.dev/).
*   **Media Management:** File and media uploads are handled by the `spatie/laravel-medialibrary` package.

## Building and Running

### 1. Initial Setup

These commands should be run from the project root.

```bash
# 1. Copy the environment file
cp .env.example .env

# 2. Install PHP dependencies
composer install

# 3. Install frontend dependencies
npm install

# 4. Generate a new application key
php artisan key:generate

# 5. Configure your database credentials in the .env file
# (e.g., DB_CONNECTION, DB_DATABASE, etc.)

# 6. Run database migrations to create the schema
php artisan migrate

# 7. Create a symbolic link for public file storage
php artisan storage:link
```

### 2. Running the Development Servers

You need to run two processes in separate terminals for development.

```bash
# In terminal 1, serve the Laravel application
php artisan serve
```

```bash
# In terminal 2, start the Vite server for frontend assets (with hot-reloading)
npm run dev
```

The application will be available at `http://127.0.0.1:8000`.

### 3. Building for Production

To create an optimized production build of the frontend assets:

```bash
npm run build
```

## Testing

The project uses Pest and PHPUnit for testing. To run the entire test suite:

```bash
# Using the Pest runner
./vendor/bin/pest

# Or using PHPUnit
php artisan test
```

## Development Conventions

*   **Code Style:** The project uses [Laravel Pint](https://laravel.com/docs/10.x/pint) for enforcing a consistent code style.
*   **Database:** Schema changes are managed exclusively through migration files located in `database/migrations`.
*   **Admin UI:** All admin and user panel functionality should be built using Filament resources, pages, and widgets.
*   **Frontend:** Interactive frontend components should be built using Livewire.
*   **Environment:** The `.env` file is used for all environment-specific configuration and should not be committed to version control.
