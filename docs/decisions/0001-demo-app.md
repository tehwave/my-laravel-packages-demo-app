# My Laravel Packages Demo App

## Purpose

This repository is an ordinary Laravel application for exercising Peter Jørgensen's Laravel packages in a real host application. Its first package is `tehwave/laravel-timelines`.

The application exists to answer two practical questions:

1. Does the package work when installed and used outside its own automated test suite?
2. Do its installation, APIs, documentation, and user interface feel sensible to an application developer and end user?

It is not a compatibility matrix, package test runner, release simulator, or framework for package profiles.

## Application

Use one conventional Laravel 12 application. Install Laravel Timelines through Composer from the neighboring local repository. Keep the application structure recognizable to any Laravel developer; do not introduce a demo-module system or package abstraction.

The app models a small order workflow with enough realistic activity to exercise actors, subjects, context, changes, localization, empty states, unavailable entries, and pagination. Application code owns retrieval, authorization, ordering, and paginator construction exactly as a real consumer would.

## Presentation examples

Provide working examples for:

- Blade as the baseline timeline page.
- Livewire using the same Blade component inside an application-owned Livewire component.
- Filament using the package's native schema component in a small admin panel.
- Laravel Nova using the package's native card on its appropriate dashboard and resource surfaces.

Each example should use the same underlying order data where practical, making differences in integration ergonomics and presentation easy to compare. Do not invent package APIs or duplicate package presentation code inside the app.

## Developer experience

Follow the package documentation as written before compensating for missing steps or awkward APIs. Record genuine friction in the demo repository rather than silently hiding it behind helpers. The app may contain ordinary application services, queries, policies, seeders, and view models when a normal Laravel application would benefit from them, but package-specific convenience abstractions require a demonstrated need.

The README contains setup instructions and a short manual review checklist covering installation, recording, retrieval, rendering, pagination, empty/error states, responsive presentation, and light/dark admin surfaces.

## Credentials

Laravel Nova credentials are local-only. `auth.json` must be ignored before Composer is configured. Credentials must never appear in committed files, documentation, command output, test fixtures, environment examples, URLs, or Git history.

## Verification

Keep automation proportionate to a demo application. Add only smoke tests that prove the app boots, deterministic seed data can be recorded and retrieved, and the main demo surfaces render. The primary acceptance method is hands-on use of the running application and evaluation of package UX and DX.

## Future packages

Future packages are added as ordinary application features when needed. Do not build a registry, manifest format, generator, matrix runner, or plugin system in anticipation of them.
