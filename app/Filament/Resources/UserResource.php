<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\TextInput;
//use Filament\Forms\Components\DateTimePicker;
//use Filament\Forms\Components\TextArea;

use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Card;

use Spatie\Permission\Models\Role;
use Filament\Forms\Components\Select;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Gestion de Usuarios';

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('nombres')
                            ->required()
                            ->string()
                            ->maxLength(255),
                        TextInput::make('apellidos')
                            ->required()
                            ->string()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->email()
                            ->string()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('password')
                            ->password()
                            ->required()
                            ->same('Confirmar Contraseña')
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state)),
                        TextInput::make('Confirmar Contraseña')
                            ->password()
                            ->required(),
                        Select::make('Rol')
                            ->multiple()
                            ->relationship('roles','name')->preload(),
                        FileUpload::make('profile_photo_path'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombres')
                    ->sortable()
                    ->searchable()
                    ->label('Nombres'),
                Tables\Columns\TextColumn::make('apellidos')
                    ->label('Apellidos'),
                Tables\Columns\TextColumn::make('email')
                    ->label('Correo'),
            ])
            ->filters([
                //
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
            RelationManagers\ObjetosRelationManager::class,
            RelationManagers\AgradecimientosRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}