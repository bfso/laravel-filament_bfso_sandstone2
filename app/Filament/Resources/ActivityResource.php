<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityResource\Pages;
use App\Filament\Resources\ActivityResource\RelationManagers;
use App\Models\Activity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Hidden;
use App\Models\User;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
    ->schema([
        TextInput::make('title')->required()->label('Titel'),
        Select::make('responsible_id')
            ->required()
            ->label('Verantwortlich')
            ->options(User::all()->pluck('name', 'id'))
            ->searchable(),
        Select::make('deputy_id')
            ->label('Stellvertretung')
            ->options(User::all()->pluck('name', 'id'))
            ->searchable(),
        Select::make('department')
            ->label('Abteilung')
            ->options([
                'Sekretariat' => 'Sekretariat',
                'IT' => 'IT',
                'Qualitätssicherung' => 'Qualitätssicherung',
                'Finanzen' => 'Finanzen',
                // Fügen Sie hier weitere Abteilungen hinzu, falls erforderlich
            ]),
        TextInput::make('offset')->label('Offset'),
        Select::make('predecessor_id')
            ->label('Vorgänger')
            ->options(Activity::all()->pluck('title', 'id'))
            ->searchable(),
        Select::make('successor_id')
            ->label('Nachfolger')
            ->options(Activity::all()->pluck('title', 'id'))
            ->searchable(),
        TextInput::make('categories')->label('Kategorien'),
        Checkbox::make('completed')->label('Tätigkeit als erledigt markieren'),
    ]);
    }

    public static function table(Table $table): Table
    {   
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('responsibleUser.name')->label('Verantwortlich'),
                TextColumn::make('deputyUser.name')->label('Stellvertretung'),
                TextColumn::make('department')->label('Abteilung'),
                TextColumn::make('offset')->label('Offset'),
                TextColumn::make('predecessorActivity.title')->label('Vorgänger'),
                TextColumn::make('successorActivity.title')->label('Nachfolger'),
                TextColumn::make('categories')->label('Kategorien'),
                BooleanColumn::make('completed')->label('Erledigt'),
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
            'index' => Pages\ListActivities::route('/'),
            'create' => Pages\CreateActivity::route('/create'),
            'edit' => Pages\EditActivity::route('/{record}/edit'),
        ];
    }
}
