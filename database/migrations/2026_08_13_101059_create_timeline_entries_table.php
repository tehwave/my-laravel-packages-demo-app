<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(config('timelines.table', 'timeline_entries'), function (Blueprint $table): void {
            $table->ulid('id')->primary();
            $table->string('event', 191)->index();
            $table->string('subject_type', 191);
            $table->string('subject_id', 191);
            $table->string('actor_type', 191)->nullable();
            $table->string('actor_id', 191)->nullable();
            $table->string('message_type', 32);
            $table->text('message');
            $table->json('context')->nullable();
            $table->json('changes')->nullable();
            $table->json('formatters')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamp('occurred_at')->index();
            $table->timestamps();

            $table->index(['subject_type', 'subject_id', 'occurred_at', 'id'], 'timeline_entries_subject_occurred_index');
            $table->index(['actor_type', 'actor_id', 'occurred_at', 'id'], 'timeline_entries_actor_occurred_index');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(config('timelines.table', 'timeline_entries'));
    }
};
