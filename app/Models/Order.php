<?php

namespace App\Models;

use Database\Factories\OrderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use tehwave\Timelines\Concerns\HasTimeline;

class Order extends Model
{
    /** @use HasFactory<OrderFactory> */
    use HasFactory, HasTimeline;

    protected $fillable = [
        'user_id',
        'number',
        'status',
        'total',
        'currency',
    ];

    /** @return BelongsTo<User, $this> */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function casts(): array
    {
        return [
            'total' => 'integer',
        ];
    }
}
