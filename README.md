# Sportclub Website

A dynamic, database-driven website for a local sports club, built with Laravel as part of the Web Development exam project. Features role-based authentication, a news system, a categorized FAQ, and a contact form that emails the club admin.

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.4-777BB4?style=flat-square&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.4-4479A1?style=flat-square&logo=mysql&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3-06B6D4?style=flat-square&logo=tailwindcss&logoColor=white)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg?style=flat-square)](https://opensource.org/licenses/MIT)

## What is this?

This project was built for the *Project 1 — Laravel* exam assignment. The goal was to build a data-driven website (not a set of static pages) around a self-chosen topic, implementing a login system with roles, public user profiles, an admin-managed news section, a categorized FAQ, and a contact form — on top of the standard Laravel conventions (Eloquent relationships, resource controllers, route middleware, CSRF/XSS protection).

The chosen topic is a **local sports club**: news posts act as match reports/club announcements, and the FAQ covers membership and training questions.

## Features

- **Authentication** — register, login/logout, "remember me", password reset (via Laravel Breeze)
- **Roles** — every user is either a regular user or an admin; admins can promote/demote other users and create accounts manually
- **Public profiles** — every user has a public profile page (visible to guests) with an editable username, birthday, bio, and profile photo
- **News** — admin-managed CRUD with image upload and tags (many-to-many relationship); public index and detail pages
- **FAQ** — questions grouped by category, manageable by admins, visible to everyone
- **Contact form** — sends an email to the admin with the submitted message (tested locally via Mailpit)

## Tech stack

| | |
|---|---|
| Framework | Laravel 12 |
| Language | PHP 8.4 |
| Database | MySQL |
| Auth scaffolding | Laravel Breeze (Blade + Alpine.js) |
| Styling | Tailwind CSS |
| Local environment | Laragon |
| Mail testing | Mailpit |
| Version control | Git & GitHub |

## Getting started

You'll need PHP 8.2+, Composer, Node.js/npm, and MySQL (e.g. via [Laragon](https://laragon.org/) or [XAMPP](https://www.apachefriends.org/)).

```bash
git clone https://github.com/[jouw-username]/[repo-naam].git
cd [repo-naam]

composer install
npm install && npm run build

cp .env.example .env
php artisan key:generate
```

Set your database credentials in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

Create an empty `laravel` database in MySQL, then run:

```bash
php artisan migrate:fresh --seed
php artisan storage:link
php artisan serve
```

Visit `http://127.0.0.1:8000`.

## Testing the contact form (email)

This project sends contact form submissions via SMTP to [Mailpit](https://github.com/axllent/mailpit), bundled with Laragon, so no real mailbox is needed to test it.

```env
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
```

Start Mailpit from Laragon, submit the contact form, then check `http://localhost:8025` to see the received email.

## Default admin account

| Field | Value |
|---|---|
| Email | `admin@ehb.be` |
| Password | `Password!321` |

Seeded automatically via `AdminUserSeeder`.

## Project structure highlights

- **Relationships**: `User` → `News` (one-to-many), `News` ↔ `Tag` (many-to-many via `news_tag` pivot table), `FaqCategory` → `FaqItem` (one-to-many)
- **Middleware**: custom `AdminMiddleware` (aliased as `admin`) restricts create/edit/delete routes to admin users
- **Controllers**: resource controllers for `News`, `FaqCategory`, `FaqItem`
- **Views**: two layouts (`app`, `guest`) plus reusable Blade components (`news-card`, `faq-category`)
- **Seeders**: `AdminUserSeeder`, `TagSeeder`, `FaqCategorySeeder`, `NewsSeeder` populate the database with realistic test data on `migrate:fresh --seed`

## References

Laravel. (n.d.). *Laravel documentation*. Retrieved August 2026, from https://laravel.com/docs

Laravel. (n.d.). *Laravel Breeze*. Retrieved August 2026, from https://laravel.com/docs/starter-kits#laravel-breeze

Tailwind Labs. (n.d.). *Tailwind CSS documentation*. Retrieved August 2026, from https://tailwindcss.com/docs

Axllent. (n.d.). *Mailpit* [Software]. GitHub. https://github.com/axllent/mailpit

## Acknowledgements

- [Perplexity](https://perplexity.ai) for research support
- [Claude](https://claude.ai) for development assistance and debugging support
- Course materials and exercises from the Web Development class this project was built for

## Author

[@amingharbaoui](https://github.com/amingharbaoui)

## License

Released under the MIT License.
