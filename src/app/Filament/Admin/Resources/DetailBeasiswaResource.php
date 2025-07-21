<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DetailBeasiswaResource\Pages;
use App\Filament\Admin\Resources\DetailBeasiswaResource\RelationManagers;
use App\Models\DetailBeasiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;

class DetailBeasiswaResource extends Resource
{
    protected static ?string $model = DetailBeasiswa::class;
    protected static ?string $pluralLabel = 'Detail Beasiswa';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 Forms\Components\Select::make('beasiswa_id')
                    ->label('Beasiswa')
                    ->relationship('beasiswa', 'nama_beasiswa')
                    ->required(),

                Forms\Components\Textarea::make('syarat')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('keuntungan')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('kontak')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('informasi_tambahan')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('beasiswa.nama_beasiswa')->label('Beasiswa'),
                Tables\Columns\TextColumn::make('kontak')
                    ->searchable(),
                Tables\Columns\TextColumn::make('syarat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('keuntungan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('informasi_tambahan')
                    ->searchable(),
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
            'index' => Pages\ListDetailBeasiswas::route('/'),
            'create' => Pages\CreateDetailBeasiswa::route('/create'),
            'edit' => Pages\EditDetailBeasiswa::route('/{record}/edit'),
        ];
    }
}
