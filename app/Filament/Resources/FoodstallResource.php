<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FoodstallResource\Pages;
use App\Filament\Resources\FoodstallResource\RelationManagers;
use App\Models\Foodstall;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FoodstallResource extends Resource
{
    protected static ?string $model = Foodstall::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    protected static ?string $navigationGroup = 'Foodstall Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('foodstall_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('foodstall_location')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('foodstall_desc')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('foodstall_pict')
                    ->required()
                    ->image(),
                Forms\Components\TextInput::make('foodstall_contact')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('foodstall_rating')
                ->options([
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('foodstall_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('foodstall_location')
                    ->searchable(),
                Tables\Columns\TextColumn::make('foodstall_desc')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('foodstall_pict')
                    ->searchable(),
                Tables\Columns\TextColumn::make('foodstall_contact')
                    ->searchable(),
                Tables\Columns\TextColumn::make('foodstall_rating')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListFoodstalls::route('/'),
            'create' => Pages\CreateFoodstall::route('/create'),
            'edit' => Pages\EditFoodstall::route('/{record}/edit'),
        ];
    }
}
