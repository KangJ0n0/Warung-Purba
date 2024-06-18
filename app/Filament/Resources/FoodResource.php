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
use Filament\Forms\Components\Card;

class FoodResource extends Resource
{
    protected static ?string $model = Food::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                Forms\Components\Select::make('foodstall_id')
                    ->relationship('foodstall', 'foodstall_name')
                    ->label('Nama Warung')
                    ->required(),
                Forms\Components\TextInput::make('food_name')
                    ->label('Nama Makanan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('food_price')
                    ->label('Harga')
                    ->required()
                    ->numeric(),
                Forms\Components\FileUpload::make('food_pict')
                    ->label('Foto')
                    ->required()
                    ->image(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_food')
                    ->label('ID Makanan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('food_name')
                    ->label('Nama Makanan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('foodstall.foodstall_name')
                    ->label('Nama Warung')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('food_price')
                    ->label('Harga')
                    ->numeric()
                    ->sortable()
                    ->prefix('Rp '),
                Tables\Columns\ImageColumn::make('food_pict')
                    ->label('Foto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat pada')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui pada')
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
