# My Laravel Packages Demo App

A small, conventional Laravel application for checking Peter Jørgensen's packages in a real host app. It exercises `tehwave/laravel-timelines`, `tehwave/laravel-achievements`, and `tehwave/laravel-shortcodes` through focused consumer scenarios.

This is a hands-on UX and DX check, not a compatibility harness. The Timelines scenario keeps its domain, authorization, recording, retrieval, eager loading, ordering, and pagination in the application. Achievements and Shortcodes use ordinary Blade requests so their package APIs remain the thing being judged.

## Setup

The Composer path repositories expect this app and all three packages to be sibling directories:

```text
webdev/
├── laravel-achievements/
├── laravel-shortcodes/
├── laravel-timelines/
└── my-laravel-packages-demo-app/
```

Nova is a separately licensed dependency. Configure your own Nova Composer credentials locally before installing dependencies. Composer writes them to the ignored `auth.json`; never commit that file. This app stays on the licensed Laravel 12-compatible Nova 5.3 line used for the acceptance check.

```bash
composer install
cp .env.example .env
php artisan key:generate
npm install
npm run build
php artisan migrate:fresh --seed
composer run dev
```

Laravel Boost is installed as a development dependency and initialized for Codex. The app uses SQLite by default.

## Demo account

Use the same local account for Filament and Nova:

```text
Email: peter@example.com
Password: password
```

## Surfaces

- `/` lists the seeded orders.
- `/orders/1` compares the Blade component with an application-owned Livewire component.
- `/admin/orders/1` presents the same history in the native Filament schema component.
- `/nova/resources/orders/1` presents it in the native Nova card.
- `/achievements` unlocks one achievement for the seeded demo user through the package's model trait.
- `/shortcodes` compiles an application-defined shortcode from editable, escaped source.

The Blade and Livewire examples intentionally use separate cursor names so both prepared paginators can coexist on one page.

## Manual checklist

- The same messages, participants, display context, and changes appear on all four surfaces.
- Blade and Livewire show ordinary paginator links; using one does not move the other.
- Livewire refreshes without a console error or package-owned Livewire state.
- Filament composes the timeline inside its normal resource detail schema.
- Nova composes the card on the resource detail page at full width.
- Empty orders stay presentable without adding retrieval behavior to the package components.
- The achievement starts locked, unlocks once, and stays unlocked after refresh.
- The shortcode playground compiles edited source through the application-defined callout.
- Raw HTML appears as escaped text in the shortcode preview and never executes.
- Mobile layouts do not overflow horizontally.

Automated tests stay deliberately small:

```bash
composer test
vendor/bin/pint --dirty --format agent
npm run build
```

The useful acceptance test is still opening the app and judging whether installation, retrieval, composition, and the resulting UI feel natural.
