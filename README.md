# Sportclub Website

A dynamic, database-driven website for a local sports club, built with Laravel as part of the Web Development exam project. Features role-based authentication, an admin user management panel, a news system with comments and tags, a categorized FAQ, and a contact form that emails the club admin.

![Laravel](https://img.shields.io/badge/Laravel-13-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.4-777BB4?style=flat-square&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.4-4479A1?style=flat-square&logo=mysql&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3-06B6D4?style=flat-square&logo=tailwindcss&logoColor=white)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg?style=flat-square)](https://opensource.org/licenses/MIT)

## What is this?

This project was built for the *Project 1 — Laravel* exam assignment. The goal was to build a data-driven website (not a set of static pages) around a self-chosen topic, implementing a login system with roles, public user profiles, an admin-managed news section, a categorized FAQ, and a contact form — on top of the standard Laravel conventions (Eloquent relationships, resource controllers, route middleware, CSRF/XSS protection).

The chosen topic is a **local sports club**: news posts act as match reports/club announcements, and the FAQ covers membership and training questions.

## Features

### Core

- **Authentication** — register, login/logout, "remember me", password reset (via Laravel Breeze), with a show/hide toggle on password fields
- **Roles** — every user is either a regular user or an admin
- **Admin user management** — admins can view all users, promote/demote them to admin, and manually create new accounts with a chosen role
- **Public profiles** — every user has a public profile page (visible to guests) with an editable username, birthday, bio, and profile photo
- **News** — admin-managed CRUD with image upload and tags (many-to-many relationship); public index and detail pages; admins can create new tags on the fly from the post form
- **FAQ** — questions grouped by category, manageable by admins, visible to everyone
- **Contact form** — sends an email to the admin with the submitted message (tested locally via Mailpit)

### Extra features

- **Comments** — logged-in users can comment on news posts; authors and admins can delete comments
- **Dark / light theme toggle** — persisted across visits via `localStorage`
- **Custom design system** — dark/light themed UI with a consistent color palette, animated page headers, scroll-reveal animations, and a fully responsive layout

## Screenshots

<img width="2515" height="1583" alt="file-9a41dd9a2197532cff6478722901908f" src="https://github.com/user-attachments/assets/11662698-5979-4567-88de-395fcae03486" />
<img width="2219" height="1617" alt="file-6e93fd701dc0771079cd8f72801536d1" src="https://github.com/user-attachments/assets/dee4bb20-b030-4990-b519-e5c37976f230" />
<img width="2823" height="1792" alt="file-c91d653ac96234d310b8a02c7e7df7a8" src="https://github.com/user-attachments/assets/b0a23384-572a-48ad-8adb-ac2af33f05e8" />
<img width="3000" height="1747" alt="file-241cacaf0745daaaabcb920e7621a8b0" src="https://github.com/user-attachments/assets/f2f3c166-6103-4648-9905-ac75d9c143a8" />


## Tech stack

| | |
|---|---|
| Framework | Laravel 13 |
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
git clone https://github.com/amingharbaoui/project_laravel.git
cd project_laravel

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

Seeded automatically via `AdminUserSeeder`. Additional admins can be created from `/admin/users` once logged in as an admin.

## Project structure highlights

- **Relationships**:
    - `User` → `News` (one-to-many)
    - `User` → `Comment` (one-to-many)
    - `News` → `Comment` (one-to-many)
    - `News` ↔ `Tag` (many-to-many via `news_tag` pivot table)
    - `FaqCategory` → `FaqItem` (one-to-many)
- **Middleware**: custom `AdminMiddleware` (aliased as `admin`) restricts create/edit/delete routes and the user management panel to admin users
- **Controllers**: resource-style controllers for `News`, `FaqCategory`, `FaqItem`, `Comment`, `Tag`, and `AdminUser`
- **Views**: two layouts (`app`, `guest`) plus reusable Blade components (`news-card`, `faq-category`, `page-header`, `modal`, `dropdown`)
- **Seeders**: `AdminUserSeeder`, `TagSeeder`, `FaqCategorySeeder`, `NewsSeeder` populate the database with realistic test data on `migrate:fresh --seed`

## References

Laravel. (n.d.). *Laravel documentation*. Retrieved August 2026, from https://laravel.com/docs

Laravel. (n.d.). *Laravel Breeze*. Retrieved August 2026, from https://laravel.com/docs/starter-kits#laravel-breeze

Tailwind Labs. (n.d.). *Tailwind CSS documentation*. Retrieved August 2026, from https://tailwindcss.com/docs

Axllent. (n.d.). *Mailpit* [Software]. GitHub. https://github.com/axllent/mailpit

## Acknowledgements

- [Claude](https://claude.ai) for development assistance and debugging support
- [Perplexity](https://perplexity.ai) for research support
- [Stack Overflow](https://stackoverflow.com) for troubleshooting help
- [Awwwards](https://www.awwwards.com) for design inspiration
- Course materials and exercises from the Web Development class this project was built for

## Author

[@amingharbaoui](https://github.com/amingharbaoui)

## License

Released under the MIT License.
