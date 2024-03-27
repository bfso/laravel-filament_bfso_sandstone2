<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Department;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label("Name")->required()->maxLength(255),
                TextInput::make('email')->label("Email")->email()->autocomplete(false)->required()->maxLength(255),
                TextInput::make('password_confirmation')->label("Password")->password()->revealable()->autocomplete(false)->required(fn (string $operation, Get $get): bool => $operation === 'create' || filled($get('password')))->maxLength(255),
                TextInput::make('password')->label("Repeat password")->password()->required(fn (string $operation, Get $get): bool => $operation === 'create' || filled($get('password_confirmation')))->confirmed(),
                Select::make('department_id')->options(Department::all()->pluck('name', 'id'))->label("Department")->searchable()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->weight(FontWeight::Bold)->label("Name")->searchable()->sortable(),
                TextColumn::make('email')->label("Email")->icon('heroicon-m-envelope')->copyable()->copyMessage('Email address copied')->copyMessageDuration(1500)->searchable()->sortable(),
                TextColumn::make('department.name')->icon('heroicon-m-building-office'),
                TextColumn::make('created_at')->label("Created")->dateTime()->sortable(),
            ])
            ->filters([
                SelectFilter::make('department_id')->options(Department::all()->pluck('name', 'id'))
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
