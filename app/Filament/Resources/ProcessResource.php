<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProcessResource\Pages;
use App\Filament\Resources\ProcessResource\RelationManagers;
use App\Models\Template;
use App\Models\Process;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProcessResource extends Resource
{
    protected static ?string $model = Process::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //echo Form::select('size', array('L' => 'Large', 'S' => 'Small'));
                Forms\Components\Section::make('Process')
                ->schema([
                    Select::make('process')->label(__('Template'))->required()->searchable()
                    ->options(Template::orderBy('id', 'asc')->pluck('title', 'id')->toArray())
                    ->live(),
                ])->columns(4),
                        Placeholder::make('title')
                        ->content(function(Get $get){
                            return $get('process');
                        }),
                    Placeholder::make('date')
                    ->content(function(Get $get){
                        return $get('process');
                    }),                    
                    Placeholder::make('active')
                    ->content(function(Get $get){
                        return $get('process');
                    }), 
                    Placeholder::make('creator')
                    ->content(function(Get $get){
                        return $get('process');
                    }), 
                    Placeholder::make('responsible')
                    ->content(function(Get $get){
                        return $get('process');
                    }), 
                    Placeholder::make('represented')
                    ->content(function(Get $get){
                        return $get('process');
                    }), 
                    Placeholder::make('last updated')
                    ->content(function(Get $get){
                        return $get('process');
                    }), 
                ]);            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListProcesses::route('/'),
            'create' => Pages\CreateProcess::route('/create'),
            'edit' => Pages\EditProcess::route('/{record}/edit'),
        ];
    }
}
