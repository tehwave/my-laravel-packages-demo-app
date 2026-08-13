<?php

namespace App\Filament\Resources\Orders\Schemas;

use App\Models\Order;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use tehwave\Timelines\Filament\Schemas\Components\Timeline;

class OrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user.name')
                    ->label('User'),
                TextEntry::make('number'),
                TextEntry::make('status'),
                TextEntry::make('total')
                    ->money(
                        currency: fn (Order $record): string => $record->currency,
                        divideBy: 100,
                    ),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                Section::make('Order history')
                    ->columnSpanFull()
                    ->schema([
                        Timeline::make()
                            ->entries(fn (Order $record) => $record
                                ->timelineEntries()
                                ->with(['subject', 'actor'])
                                ->latestOccurred()
                                ->get()),
                    ]),
            ]);
    }
}
