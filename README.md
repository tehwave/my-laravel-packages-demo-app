# My Laravel Packages Demo App

A small, conventional Laravel application for checking Peter Jørgensen's packages in a real host app. The first scenario exercises `tehwave/laravel-timelines` through Blade, application-owned Livewire, Filament 5, and Laravel Nova 5.

This is a hands-on UX and DX check, not a compatibility harness. The application owns its order domain, authorization, timeline recording, retrieval, eager loading, ordering, and pagination. Each integration receives prepared timeline entries and only presents them.

## Setup

The Composer path repository expects this app and `laravel-timelines` to be sibling directories:

```text
webdev/
├── laravel-timelines/
└── my-laravel-packages-demo-app/
```

Nova is a separately licensed dependency. Configure your own Nova Composer credentials locally before installing dependencies. Composer writes them to the ignored `auth.json`; never commit that file.

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

The Blade and Livewire examples intentionally use separate cursor names so both prepared paginators can coexist on one page.

## Manual checklist

- The same messages, participants, display context, and changes appear on all four surfaces.
- Blade and Livewire show ordinary paginator links; using one does not move the other.
- Livewire refreshes without a console error or package-owned Livewire state.
- Filament composes the timeline inside its normal resource detail schema.
- Nova composes the card on the resource detail page at full width.
- Empty orders stay presentable without adding retrieval behavior to the package components.
- Mobile layouts do not overflow horizontally.

Automated tests stay deliberately small:

```bash
composer test
vendor/bin/pint --dirty --format agent
npm run build
```

The useful acceptance test is still opening the app and judging whether installation, retrieval, composition, and the resulting UI feel natural.
