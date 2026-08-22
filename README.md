# Bookstore (Laravel + Livewire)

A simple **Bookstore** web application built with **Laravel** and **Livewire**.

## Features

- Browse books
- View book details
- Create/update/delete books (based on the implemented Livewire components)
- Livewire-powered, reactive UI

## Screenshot

Homepage (My Books):

![My Books UI](/public/Screenshot.png)

Create Book Modal with validations

![Create Book Form UI](/public/Create.png)

## Requirements

- PHP (supported by your Laravel version)
- Composer
- MySQL or PostgreSQL or SQLite (This example uses sqlite)
- Node.js (if your project builds frontend assets)

## Setup

1. **Clone / open the project**

2. **Install PHP dependencies**

```bash
composer install
```

3. **Copy environment file**

```bash
cp .env.example .env
```

4. **Configure environment**

Set your database credentials in `.env`.

5. **Generate application key**

```bash
php artisan key:generate
```

6. **Run database migrations**

```bash
php artisan migrate
```

7. **(Optional) Seed database**

```bash
php artisan db:seed
```

8. **Install and build frontend assets** (if applicable)

```bash
npm install
npm run dev
```

## Running the app

```bash
php artisan serve
```

Then open the application URL shown in your terminal.

## Livewire

Livewire components are located in `app/Http/Livewire`.

## Project structure (high level)

- `app/Http/Livewire/` - Livewire components
- `resources/views/` - Blade views
- `routes/web.php` - Web routes

## Troubleshooting

- If migrations fail, verify your `.env` database settings.
- If frontend assets are missing, run `npm install` and `npm run dev`.

## License

MIT