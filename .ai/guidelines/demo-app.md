# Demo App

## Purpose and boundaries

- Use this application for hands-on UX and DX checks of `tehwave/laravel-timelines`, `tehwave/laravel-achievements`, and `tehwave/laravel-shortcodes` in a real Laravel host.
- Treat it as a focused consumer demo, not a compatibility harness or production application.
- Judge whether installation, retrieval, composition, and the resulting UI feel natural by opening and using the application; automated checks are intentionally small.

## Local repositories and credentials

- Keep the application and all three package repositories as sibling directories because Composer uses local path repositories:

```text
webdev/
├── laravel-achievements/
├── laravel-shortcodes/
├── laravel-timelines/
└── my-laravel-packages-demo-app/
```

- Laravel Nova is separately licensed. Configure local Nova Composer credentials before installing dependencies.
- Composer stores those credentials in the ignored `auth.json`. Never commit that file or expose its contents.
- Keep Nova on the licensed Laravel 12-compatible Nova 5.3 line used by this app.

## Setup

Run:

```bash
composer install
cp .env.example .env
php artisan key:generate
npm install
npm run build
php artisan migrate:fresh --seed
composer run dev
```

- The application uses SQLite by default.
- Laravel Boost is installed as a development dependency and initialized for Codex.

## Demo account

Use the same local account for Filament and Nova:

```text
Email: peter@example.com
Password: password
```

## Demo surfaces

- `/` lists the seeded orders and links to the package demos.
- `/orders/1` compares the Timelines Blade component with an application-owned Livewire component.
- `/admin/orders/1` presents the same history in the native Filament schema component.
- `/nova/resources/orders/1` presents the same history in the native Nova card.
- `/achievements` unlocks one achievement for the seeded demo user through the Achievements model trait.
- `/shortcodes` compiles an application-defined shortcode from editable, escaped source.

The Blade and Livewire timeline examples intentionally use separate cursor names so both prepared paginators can coexist on one page.

## Implementation ownership

- Keep Timelines domain logic, authorization, recording, retrieval, eager loading, ordering, and pagination in application code. Pass prepared entries into the package presentation surfaces.
- Keep the Livewire example application-owned; do not add package-owned Livewire state or retrieval.
- Use ordinary Blade requests for Achievements and Shortcodes so their package APIs remain the behavior under evaluation.
- Do not turn this app into an in-depth compatibility harness or add abstractions that obscure normal package usage.

## Manual acceptance checklist

- Confirm the same timeline messages, participants, display context, and changes appear in Blade, Livewire, Filament, and Nova.
- Confirm Blade and Livewire show ordinary paginator links and using one paginator does not move the other.
- Confirm Livewire refreshes without a console error or package-owned Livewire state.
- Confirm Filament composes the timeline inside its normal resource detail schema.
- Confirm Nova composes the card on the resource detail page at full width.
- Confirm empty orders remain presentable without adding retrieval behavior to package components.
- Confirm the achievement starts locked, unlocks once, and stays unlocked after refresh.
- Confirm the shortcode playground compiles edited source through the application-defined callout.
- Confirm raw HTML appears as escaped text in the shortcode preview and never executes.
- Confirm mobile layouts do not overflow horizontally.

## Verification

Run:

```bash
composer test
vendor/bin/pint --dirty --format agent
npm run build
```
