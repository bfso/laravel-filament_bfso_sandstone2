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
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Foundation\Auth\User;

class ProcessResource extends Resource
{
    protected static ?string $model = Process::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            /*->schema([
                //echo Form::select('size', array('L' => 'Large', 'S' => 'Small'));
                Forms\Components\Section::make('Process')*/
                ->schema([
                    Select::make('process')->label(__('Template'))->required()->searchable()
                        ->options(Template::orderBy('id', 'asc')->pluck('title', 'id')->toArray())
                        ->live(),
                    Placeholder::make('date')
                    ->content(function(Get $get){
                        $processid = intval($get('process'));
                        if ($processid != 0){
                            return Template::find($processid)->date;
                        }
                        return '' ;
                    }),                    
                    Placeholder::make('active')
                    ->content(function(Get $get){
                        $processid = intval($get('process'));
                        if ($processid != 0){
                            return Template::find($processid)->is_active;
                        }
                        return '' ;
                    }), 
                    Placeholder::make('creator')
                    ->content(function(Get $get){
                        $processid = intval($get('process'));
                        if ($processid != 0){
                            return Template::find($processid)->creator_user->name;
                        }
                        return '' ;
                    }), 
                    Placeholder::make('responsible')
                    ->content(function(Get $get){
                        $processid = intval($get('process'));
                        if ($processid != 0){
                            return Template::find($processid)->responsible_user->name;
                        }
                        return '' ;
                    }), 
                    Placeholder::make('represented')
                    ->content(function(Get $get){
                        $processid = intval($get('process'));
                        if ($processid != 0){
                            return Template::find($processid)->represented_user->name;
                        }
                        return '' ;
                    }), 
                    Placeholder::make('last updated by')
                    ->content(function(Get $get){
                        $processid = intval($get('process'));
                        if ($processid != 0){
                            return Template::find($processid)->last_update_by_user->name;
                        }
                        return '' ;
                    }),                     
                ])->columns(4);

           /* ]); */           
    }

    // Forms\Components\Section::make('Process')
    // ->schema(function (Get $get, Pages\EditUser $livewire, Model ?$record): array {
    //     # If the page is Edit and the record exists, then get type_id and use it in the match()
    //     # and for creating a page it will work as expected.
    //     $type_id = ( $livewire instanceof Pages\EditUser && $record ) ? $record->type_id : $get('type_id');

    //     return match ($type_id) {
    //         default => [],
    //         '1' => [ProductDataContactLensForm::make('cldata')->columns(4)],
    //         '3' => [ProductDataSunGlassForm::make('sgdata')->columns(4)],
    //         '5' => [ProductDataSpectacleFrameForm::make('sfdata')->columns(4)],
    //     }
    // }),

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
            'start' => Pages\CreateProcess::route('/create'),
            'edit' => Pages\EditProcess::route('/{record}/edit'),
        ];
    }
}
