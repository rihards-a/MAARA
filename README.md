# MAARA

## About
Built with Laravel

---

## Requirements
To run or build MAARA, ensure the following tools and dependencies are installed:

### General Requirements
- PHP >= 8.1 ([See Laravel's full server requirements](https://laravel.com/docs/10.x/deployment#server-requirements))
- Supported databases:
  - MySQL
  - MariaDB
  - PostgreSQL
  - SQLite

### For Building from Source
- Composer
- Git
- Node.js

---

## Installation Steps
Follow these steps to set up and run MAARA:
1. Clone the repository:
   git clone https://github.com/rihards-a/MAARA.git
2. Navigate to the project directory:
   cd MAARA_MVP
3. Install PHP dependencies using Composer:
   composer install
4. Copy the example environment file:
   cp .env.example .env
5. Configure the `.env` file:
   - Set up database credentials (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`) to match your local database.
6. Run database migrations:
   php artisan migrate
7. Generate the application key:
   php artisan key:generate
8. Install Node.js dependencies:
   npm install
9. Build frontend assets for development:
   npm run dev
10. Serve the application locally:
   php artisan serve


