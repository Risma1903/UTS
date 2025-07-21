<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BeasiswaBaruResource\Pages;
use App\Filament\Admin\Resources\BeasiswaBaruResource\RelationManagers;
use App\Models\BeasiswaBaru;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;

class BeasiswaBaruResource extends Resource
{
    protected static ?string $model = BeasiswaBaru::class;
    protected static ?string $pluralLabel = 'Beasiswa';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_beasiswa')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('penyelenggara')
                    ->required()
                    ->maxLength(255),
                Select::make('jenis')
                     ->label('Jenis Beasiswa')
                     ->required()
                     ->options([
                                'Akademik' => 'Akademik',
                                'Non-Akademik' => 'Non-Akademik',
                                'Lain' => 'Lain'
                                ]),
                Forms\Components\TextInput::make('kuota')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('tahun')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_beasiswa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('penyelenggara')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis'),
                Tables\Columns\TextColumn::make('kuota')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tahun'),
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
            'index' => Pages\ListBeasiswaBarus::route('/'),
            'create' => Pages\CreateBeasiswaBaru::route('/create'),
            'edit' => Pages\EditBeasiswaBaru::route('/{record}/edit'),
        ];
    }
}
