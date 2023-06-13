<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ObjetoResource\Pages;
use App\Filament\Resources\ObjetoResource\RelationManagers;
use App\Filament\Resources\ObjetoResource\RelationManagers\AgradecimientosRelationManager;
use App\Models\Objeto;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Filters\SelectFilter;

use Illuminate\Support\Facades\Auth;

class ObjetoResource extends Resource
{
    protected static ?string $model = Objeto::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';
    protected static ?string $navigationGroup = 'Gestion de Objetos';

    public static function form(Form $form): Form
    {
        $user_id = Auth::id();

        return $form
            ->schema([
                Card::make()
                ->schema([
                    TextInput::make('objeto')
                        ->label('Objeto')
                        ->string()
                        ->required()
                        ->minLength(3)
                        ->maxLength(20),
                    TextInput::make('marca')
                        ->label('Marca')
                        ->string()
                        ->required(),
                    TextInput::make('color')
                    ->label('Color')
                        ->string()
                        ->required()
                        ->minLength(4)
                        ->maxLength(20)
                        ->telRegex('/^[a-zA-Z0-9ñÑ\s]+$/u'),
                    TextInput::make('ubicacion')
                    ->label('Ubicacion')
                        ->string()
                        ->required()
                        ->telRegex('/^[a-zA-Z0-9ñÑ\s]+$/u'),
                    Textarea::make('descripcion')
                    ->label('Descripcion')
                        ->string()
                        ->required()
                        ->minLength(4)
                        ->maxLength(20)
                        ->rules('/^[a-zA-Z0-9ñÑ\s,.]+$/u'),
                    Select::make('estado')
                        ->label('Estado del objeto')
                        ->options([
                            1 => 'Perdido',
                            2 => 'Encontrado',
                            3 => 'Devuelto',
                            4 => 'Sin Reclamar',
                        ])->required(),
                    Select::make('aceptado')
                        ->label('¿Valido?')
                        ->options([
                            1 => 'Aceptado',
                            2 => 'Rechazado',
                        ])->required(),
                    Select::make('oculto')
                    ->label('¿Oculto por el usuario?')
                        ->options([
                            1 => 'Si',
                            2 => 'No',
                        ])->required(),
                    FileUpload::make('imagen')
                        ->required()
                        ->image(),
                    TextInput::make('user_id')
                        ->numeric()
                        ->default($user_id)
                        ->disabled(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('objeto')
                    ->label('Objeto')
                    ->sortable()
                    ->searchable(),
                // Tables\Columns\TextColumn::make('marca'),
                // Tables\Columns\TextColumn::make('color'),
                // Tables\Columns\TextColumn::make('ubicacion'),
                // Tables\Columns\TextColumn::make('descripcion'),
                // Tables\Columns\TextColumn::make('valor_sentimental'),
                Tables\Columns\TextColumn::make('estado')
                ->label('Estado del objeto')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('aceptado')
                    ->label('Verificado')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('oculto')
                    ->label('Oculto en general')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.nombres')
                    ->label('Publicado por')
            ])
            ->filters([
                SelectFilter::make('estado')
                    ->options([
                        1 => 'Objetos Perdidos',
                        2 => 'Objetos Encontrados',
                        3 => 'Objetos Devueltos',
                        4 => 'Objetos no Reclamados',
                    ])
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            RelationManagers\AgradecimientosRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListObjetos::route('/'),
            'create' => Pages\CreateObjeto::route('/create'),
            'edit' => Pages\EditObjeto::route('/{record}/edit'),
        ];
    }    
}
