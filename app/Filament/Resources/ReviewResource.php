<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Select::make('user_id')
                ->relationship('user', 'name')
                ->required(),
            Forms\Components\TextInput::make('name')
                ->required(),
            Forms\Components\TextInput::make('phone')
                ->required(),
            Forms\Components\DateTimePicker::make('booking_date')
                ->required(),
            Forms\Components\TextInput::make('rating')
                ->numeric()
                ->required(),
            Forms\Components\Textarea::make('review')
                ->required()
                ->maxLength(191),
            Forms\Components\Toggle::make('is_approved')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('user.username')->label('Escort'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('booking_date')->dateTime(),
                Tables\Columns\TextColumn::make('rating')->suffix(' stars'),
                Tables\Columns\TextColumn::make('review'),
                Tables\Columns\BadgeColumn::make('is_approved')
                    ->colors([
                        '1' => 'success',
                        '0' => 'danger',
                    ]),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
