<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TemplateResource\Pages;
use App\Filament\Resources\TemplateResource\RelationManagers;
use App\Models\Template;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TemplateResource\Pages\CreateTemplate;
use App\Filament\Resources\TemplateResource\Pages\EditTemplate;
use App\Filament\Resources\TemplateResource\Pages\ListTemplates;
use Filament\Forms\Components\Select;
use Illuminate\Foundation\Auth\User;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Checkbox;


class TemplateResource extends Resource
{
    protected static ?string $model = Template::class;

    protected static ?string $navigationIcon = 'heroicon-o-wallet';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('title')->required()->name('Titel'),
            Select::make('creator')
                    ->required()
                    ->name('Ersteller')
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable(),
            Select::make('responsible')
                    ->required()
                    ->name('Verantwortlich')
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable(),
            Select::make('represented')
                    ->required()
                    ->name('Vertreten durch')
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable(),
            Checkbox::make('is_active')->name('Aktiv?'),
            Hidden::make('last_update_by'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('creator_user.name')
                        ->label('Ersteller'),
                TextColumn::make('responsible_user.name')
                        ->label('Verantwortlicher'),
                TextColumn::make('represented_user.name')
                        ->label('Vertreten durch'),
                TextColumn::make('last_update_by_user.name')
                        ->label('Zuletzt geändert von'),
                CheckboxColumn::make('is_active')
                    ->disabled()
                
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
            'index' => Pages\ListTemplates::route('/'),
            'create' => Pages\CreateTemplate::route('/create'),
            'edit' => Pages\EditTemplate::route('/{record}/edit'),
        ];
    }
}
