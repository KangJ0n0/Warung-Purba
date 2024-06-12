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
use Filament\Forms\Components\Card;

class FoodstallResource extends Resource
{
    protected static ?string $model = Foodstall::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                Forms\Components\TextInput::make('foodstall_name')
                    ->label('Nama Warung')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('foodstall_location')
                    ->label('Lokasi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextArea::make('foodstall_desc')
                    ->label('Deskripsi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('foodstall_pict')
                    ->label('Foto')
                    ->required()
                    ->image(),
                Forms\Components\TextInput::make('foodstall_contact')
                    ->label('Kontak')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('foodstall_rating')
                    ->label('Rating')
                    ->required()
                    ->options([
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                    ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('Id')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('foodstall_name')
                    ->label('Nama Warung')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('foodstall_location')
                    ->label('Lokasi')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('foodstall_desc')
                    ->label('Deskripsi')
                    ->limit(25)
                    ->searchable(),
                Tables\Columns\ImageColumn::make('foodstall_pict')
                    ->label('Foto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('foodstall_contact')
                    ->label('Kontak')
                    ->searchable(),
                Tables\Columns\TextColumn::make('foodstall_rating')
                    ->label('Rating')
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
