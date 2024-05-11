<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FoodResource\Pages;
use App\Filament\Resources\FoodResource\RelationManagers;
use App\Models\Food;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FoodResource extends Resource
{
    protected static ?string $model = Food::class;

    protected static ?string $navigationIcon = 'heroicon-o-cake';

    protected static ?string $navigationGroup = 'Foodstall Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('food_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('foodstall_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('food_price')
                    ->required()
                    ->numeric(),
                Forms\Components\FileUpload::make('food_pict')
                    ->required()
                    ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('food_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('foodstall_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('food_price')
                    ->numeric()
                    ->sortable()
                    ->prefix('Rp '),
                Tables\Columns\ImageColumn::make('food_pict')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                 
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
                    
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
            'index' => Pages\ListFood::route('/'),
            'create' => Pages\CreateFood::route('/create'),
            'edit' => Pages\EditFood::route('/{record}/edit'),
        ];
    }
}
