<?php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Service;
use App\Models\Town;
use App\Models\Category;
use App\Models\Country;
use App\Models\City;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'phosphor-users-duotone';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('username')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(191),
                Forms\Components\FileUpload::make('avatar')
                    ->required()
                    ->image(),
                Forms\Components\DateTimePicker::make('dob'),
                Forms\Components\MarkdownEditor::make('bio'),
                Forms\Components\TextInput::make('phone_number'),
                Forms\Components\TextInput::make('whatsapp_number'),
                Forms\Components\TextInput::make('telegram_number'),
                Forms\Components\TextInput::make('nationality'),
                Forms\Components\Select::make('gender')
    ->options([
        'Male' => 'Male',
        'Female' => 'Female',
    ]),
    Forms\Components\Select::make('orientation')
    ->options([
        'straight' => 'Straight',
        'bisexual' => 'Bisexual',
        'lesbian' => 'Lesbian',
        'gay' => 'Gay',
    ])
    ->placeholder('Select Orientation'),

Forms\Components\Select::make('body_type')
    ->options([
        'curvy' => 'Curvy',
        'petite' => 'Petite',
        'thick' => 'Thick',
        'slim-thick' => 'Slim Thick',
        'athletic' => 'Athletic',
        'BBW' => 'BBW',
    ])
    ->placeholder('Select Body Type'),

                //Forms\Components\Select::make('languages')->multiple()->options(['English', 'Swahili', 'French', 'German', 'Italia', 'Spanish', 'Arabic', 'Chinese', 'Japanese', 'Portugese', 'Russian']),
                
                Forms\Components\MultiSelect::make('languages')
    ->options(config('languages'))
    ->afterStateHydrated(function ($component, $state) {
        // When loading from database, split the string into an array
        if (is_string($state)) {
            $component->state(explode(',', $state));
        }
    })
    ->dehydrateStateUsing(function ($state) {
        // When saving to database, join array into a string of values (not keys)
        if (is_array($state)) {
            $languages = config('languages');

            // Map selected keys to their full language names
            $values = array_map(function ($key) use ($languages) {
                return $languages[$key] ?? $key;
            }, $state);

            return implode(',', $values);
        }

        return $state;
    }),


                // Forms\Components\Fieldset::make('Categories')
				// 	->schema([

				// 		Forms\Components\Select::make('categories')
				// 		->label('Categories')
				// 		->multiple()
				// 		->options(Category::pluck('name', 'id'))
				// 		->reactive() // This makes it dynamic
				// 		->columnspan(2)
				// 		->default(fn () => auth()->user()->categories()->pluck('categories.id')->toArray())
				// 		->required(),

				// 	]),

                Forms\Components\Toggle::make('incall'),
                Forms\Components\Textarea::make('address')->label('Incall Address')->columnspan(2),
                Forms\Components\Toggle::make('outcall'),

                // Forms\Components\Select::make('services')
				// 		->label('Services')
				// 		->multiple()
				// 		->options(Service::pluck('name', 'id'))
				// 		->reactive() // This makes it dynamic
				// 		->required()
				// 		->columnspan(2)
				// 		->default(fn () => auth()->user()->services()->pluck('services.id')->toArray()),
                
                // Forms\Components\Fieldset::make('Locations')
                //         ->schema([

                //         Forms\Components\Select::make('country')
				// 		->label('Country')
				// 		->options(Country::pluck('name', 'id'))
				// 		->reactive() // This makes it dynamic
				// 		->default(fn () => auth()->user()->country_id)
				// 		->required(),

				// 	Forms\Components\Select::make('city')
				// 	->label('City')
				// 	->options(fn ($get) => 
				// 		$get('country') 
				// 			? City::where('country_id', $get('country'))->pluck('name', 'id')
				// 			: []) // If no country is selected, return an empty array
				// 	->reactive()
				// 	->disabled(fn ($get) => !$get('country')) // Disable until country is selected
				// 	->default(fn () => auth()->user()->city_id)
				// 	->required(),
		
				// 	Forms\Components\MultiSelect::make('locations')
				// 	->label('Locations')
				// 	->options(fn ($get) => 
				// 		$get('city') 
				// 			? Town::where('city_id', $get('city'))->pluck('name', 'id')
				// 			: []) // If no city is selected, return an empty array
				// 	->reactive()
				// 	->disabled(fn ($get) => !$get('city')) // Disable until city is selected
				// 	->default(fn () => auth()->user()->towns()->pluck('towns.id')->toArray())
                //     ->columnspan(2)
				// 	->required(),

                // ]),

                Forms\Components\DateTimePicker::make('email_verified_at'),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create'),
                Forms\Components\Select::make('roles')
                    ->multiple()
                    ->relationship('roles', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),
                Forms\Components\DateTimePicker::make('trial_ends_at'),
                Forms\Components\TextInput::make('verification_code')
                    ->maxLength(191),
                Forms\Components\Toggle::make('verified'),
                Forms\Components\Toggle::make('is_approved'),
                Forms\Components\Toggle::make('is_claimed')
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('avatar')
                    ->circular()
                    ->defaultImageUrl(url('storage/demo/default.png')),
                Tables\Columns\TextColumn::make('username')
                    ->searchable(),
                    Tables\Columns\TextColumn::make('whatsapp_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('is_approved')
                    ->searchable(),
                Tables\Columns\TextColumn::make('is_claimed')
                    ->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('Impersonate')
                    ->url(fn ($record) => route('impersonate', $record))
                    ->visible(fn ($record) => auth()->user()->id !== $record->id),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
