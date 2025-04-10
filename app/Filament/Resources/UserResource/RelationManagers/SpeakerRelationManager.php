<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SpeakerRelationManager extends RelationManager
{
    protected static string $relationship = 'speaker';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_number')
                    ->numeric()
                    ->required()
                    ->maxLength(10),
                Forms\Components\Textarea::make('bio')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\TextInput::make('twitter_handle')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('https://twitter.com/your_handle'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('phone_number'),
                Tables\Columns\TextColumn::make('bio')->words(5),
                Tables\Columns\TextColumn::make('twitter_handle'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // show create if user hasnt a speaker
                Tables\Actions\CreateAction::make()
                    ->visible(fn ($livewire) => $livewire->getOwnerRecord()->speaker === null),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
