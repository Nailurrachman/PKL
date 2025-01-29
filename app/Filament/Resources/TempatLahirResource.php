<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TempatLahirResource\Pages;
use App\Filament\Resources\TempatLahirResource\RelationManagers;
use App\Models\TempatLahir;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TempatLahirResource extends Resource
{
    protected static ?string $model = TempatLahir::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kota')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_kota'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListTempatLahirs::route('/'),
            'create' => Pages\CreateTempatLahir::route('/create'),
            'edit' => Pages\EditTempatLahir::route('/{record}/edit'),
        ];
    }    
}
