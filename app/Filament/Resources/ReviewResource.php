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
use Filament\Forms\Components\Card;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                Forms\Components\Select::make('account_id')
                    ->relationship('account', 'account_name')
                    ->label('Nama Akun')
                    ->required(),
                Forms\Components\Select::make('foodstall_id')
                    ->relationship('foodstall', 'foodstall_name')
                    ->label('Nama Warung')
                    ->required(),
                Forms\Components\Textarea::make('comment')
                    ->label('Komentar')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('rating')
                    ->label('Rating')
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
                Tables\Columns\TextColumn::make('account.account_name')
                ->label('Nama Akun')
                ->searchable(),
                Tables\Columns\TextColumn::make('foodstall.foodstall_name')
                ->label('Nama Warung')
                ->searchable(),
                Tables\Columns\TextColumn::make('comment')
                ->label('Komentar')
                ->limit(50)
                ->searchable(),
                Tables\Columns\TextColumn::make('rating')
                ->label('Rating')
                ->searchable(),
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
