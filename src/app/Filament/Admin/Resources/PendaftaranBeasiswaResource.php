<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PendaftaranBeasiswaResource\Pages;
use App\Filament\Admin\Resources\PendaftaranBeasiswaResource\RelationManagers;
use App\Models\PendaftaranBeasiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;

class PendaftaranBeasiswaResource extends Resource
{
    protected static ?string $model = PendaftaranBeasiswa::class;
    protected static ?string $pluralLabel = 'Status Pendaftaran Beasiswa';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id_mahasiswa')
                    ->relationship('mahasiswa', 'nama')
                    ->label('Nama Mahasiswa')
                    ->searchable()
                    ->required(),
                Select::make('id_beasiswa')
                    ->label('Beasiswa')
                    ->relationship('beasiswa', 'nama_beasiswa')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_daftar')
                    ->required(),
                Select::make('status')
                     ->label('Status')
                     ->required()
                     ->options([
                                'Diterima' => 'Diterima',
                                'Ditolak' => 'Ditolak',
                                'Diproses' => 'Sedang Diproses',
                                ]),
                Forms\Components\TextInput::make('nilai_akademik')
                    ->numeric()
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('mahasiswa.nama')->label('Nama Mahasiswa')->searchable(),
                Tables\Columns\TextColumn::make('mahasiswa.nim')->label('NIM Mahasiswa')->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('beasiswa.nama_beasiswa')->label('Beasiswa'),
                Tables\Columns\TextColumn::make('tanggal_daftar')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('nilai_akademik')
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
            'index' => Pages\ListPendaftaranBeasiswas::route('/'),
            'create' => Pages\CreatePendaftaranBeasiswa::route('/create'),
            'edit' => Pages\EditPendaftaranBeasiswa::route('/{record}/edit'),
        ];
    }
}
