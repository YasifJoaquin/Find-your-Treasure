<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgradecimientoResource\Pages;
use App\Filament\Resources\AgradecimientoResource\RelationManagers;
use App\Models\Agradecimiento;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextArea;
use Filament\Forms\Components\Card;

class AgradecimientoResource extends Resource
{
    protected static ?string $model = Agradecimiento::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $navigationGroup = 'Gestion de Objetos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    TextInput::make('user_id'),
                    TextInput::make('objeto_id'),
                    TextArea::make('texto'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.nombres')
                ->label('Remitente')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('objeto.user.nombres')
                    ->label('Destinatario')
                    ->sortable()
                    ->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListAgradecimientos::route('/'),
            'create' => Pages\CreateAgradecimiento::route('/create'),
            'edit' => Pages\EditAgradecimiento::route('/{record}/edit'),
        ];
    }    
}
