<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\EncryptedDataResource\Pages;
use App\Filament\Admin\Resources\EncryptedDataResource\RelationManagers;
use App\Models\EncryptedData;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EncryptedDataResource extends Resource
{
    protected static ?string $model = EncryptedData::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('encrypted_data')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('decryption_key')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('decrypted_data')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
            'index' => Pages\ListEncryptedData::route('/'),
            'create' => Pages\CreateEncryptedData::route('/create'),
            'edit' => Pages\EditEncryptedData::route('/{record}/edit'),
        ];
    }
}
